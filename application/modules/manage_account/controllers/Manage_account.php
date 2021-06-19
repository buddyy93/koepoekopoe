<?php

/**
 * Created by PhpStorm.
 * User: Budy
 * Date: 1/19/2018
 * Time: 12:09 PM
 */
class Manage_account extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->form_validation->CI =& $this;
        $this->load->model('DataAccount');
        $this->load->model('User');
        if (empty($this->session->userdata('logged_in')))
            redirect(base_url() . 'backoffice');
    }

    public function index()
    {
        $search = $this->input->post('search');
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        if (isset($search))
        {
            $this->search();
        } else
        {
            $this->initialize_pagination(base_url("manage_account/"), 'users', 'DataAccount', null);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['datas'] = $this->DataAccount
                ->getData(
                    $this->numOfContentsPerPage,
                    $page, 'users');
            $data['myaccount'] = $this->myglobal->getLoggedInUser();
            $data['page'] = $page;
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_account/account', $data);
            $this->template->publish();
        }
    }

    public function tambahAccount()
    {
        if ($this->isPost())
        {
            $this->account_submit();
            $this->DataAccount->addData('users', array(
                'nama'     => $this->input->post('nama'),
                'email'    => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $this->encryption->encrypt($this->input->post('password')),
            ));
            redirect(base_url() . 'manage_account', 'refresh');
        } else
        {
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_account/tambah_account');
            $this->template->publish();
        }
    }

    public function deleteaccount($username)
    {
        $this->DataAccount->deleteData('users', array('username' => $username));
        redirect(base_url() . 'manage_account', 'refresh');
    }

    public function editAccount($username)
    {
        if ($this->isPost())
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->account_submit();
            $this->DataAccount->updateData(array(
                'nama'     => $this->input->post('nama'),
                'email'    => $this->input->post('email'),
                'username' => $username,
                'password' => $this->encryption->encrypt($password),
            ), array('username' => $username), 'users');
            $this->session->set_userdata('logged_in', $this->User->login($username, $password));

            redirect(base_url() . 'manage_account', 'refresh');
        } else
        {
            $data['data'] = $this->DataAccount->getSpecificData('users', array('username' => $username));
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_account/edit_account', $data);
            $this->template->publish();
        }
    }

    public function search()
    {
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $searchCache = $this->session->flashdata('search');
        $search = $this->input->post('search');
        $search = isset($search) ? $search : $searchCache;
        $this->initialize_pagination(base_url("manage_account/search"),
            'users',
            'DataAccount',
            $this->DataAccount->countSearchData(
                'users',
                null,
                null,
                'username LIKE \'%' . $search . '%\'')
        );
        $data['datas'] = $this->DataAccount
            ->searchData(
                $this->numOfContentsPerPage,
                $page,
                'users',
                null,
                null,
                'username LIKE \'%' . $search . '%\''
            );
        $data['search'] = $search;
        $data['page'] = $page;
        $this->template->set_template('backoffice/template');
        $this->template->content->view('manage_account/account', $data);
        $this->template->publish();
    }

    protected function account_submit()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|callback_check_passwords');
        if ($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('error', validation_errors('<p class="alert alert-danger">', '</p>'));
            redirect(current_url() . "#errors");
        }
    }

    public function check_passwords()
    {
        if ($this->input->post('password') == $this->input->post('confirm_password'))
            return true;
        else
        {
            $this->form_validation->set_message('check_passwords', 'Passwords don\'t match, please try again');

            return false;
        }
    }

    public function check_username()
    {
        $result = $this->DataAccount->getSpecificData('users', array('username' => $this->input->post('username')));

        if ($result->username == $this->myglobal->getLoggedInUser()->username)
        {
            return true;
        } else
        {
            if ($result)
            {
                $this->form_validation->set_message('check_username', 'Sorry, username already exists');
                return false;
            } else
                return true;
        }
    }
}