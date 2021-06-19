<?php

/**
 * Created by PhpStorm.
 * User: Budy
 * Date: 12/14/2017
 * Time: 4:50 PM
 */
class Manage_brand extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataBrand');
        $this->numOfContentsPerPage = 50;
        if(empty($this->session->userdata('logged_in')))
            redirect(base_url(). 'backoffice');
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
            $this->initialize_pagination(base_url("manage_brand/"), 'brand', 'DataBrand', null);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['datas'] = $this->DataBrand
                ->getData(
                    $this->numOfContentsPerPage,
                    $page, 'brand');
            $data['page'] = $page;
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_brand/brand', $data);
            $this->template->publish();
        }
    }

    public function search()
    {
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $searchCache = $this->session->flashdata('search');
        $search = $this->input->post('search');
        $search = isset($search)?$search:$searchCache;
        $this->initialize_pagination(base_url("manage_brand/search"),
            'brand',
            'DataBrand',
            $this->DataBrand->countSearchData(
                'brand',
                null,
                null,
                'NAMA_BRAND LIKE \'%'.$search.'%\'')
        );
        $data['datas'] = $this->DataBrand
            ->searchData(
                $this->numOfContentsPerPage,
                $page,
                'brand',
                null,
                null,
                'NAMA_BRAND LIKE \'%' . $search . '%\''
            );
        $data['search'] = $search;
        $data['page'] = $page;
        $this->template->set_template('backoffice/template');
        $this->template->content->view('manage_brand/brand', $data);
        $this->template->publish();
    }
    
    public function tambahBrand()
    {
        if ($this->isPost())
        {
            $this->brand_submit();
            $this->DataBrand->addData('brand', array(
                'NAMA_brand' => $this->input->post('nama'),
            ));
            redirect(base_url() . 'manage_brand', 'refresh');
        } else
        {
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_brand/tambah_brand');
            $this->template->publish();
        }
    }

    public function deletebrand($id)
    {
        $this->DataBrand->deleteData('brand', array('ID_BRAND' => $id));
        redirect(base_url() . 'manage_brand', 'refresh');
    }

    public function editBrand($id)
    {
        if ($this->isPost())
        {
            $this->brand_submit();
            $this->DataBrand->updateData(array(
                'NAMA_BRAND' => $this->input->post('nama'),
            ), array('ID_BRAND' => $id), 'brand');
            redirect(base_url() . 'manage_brand', 'refresh');
        } else
        {
            $data['data'] = $this->DataBrand->getSpecificData('brand', array('ID_BRAND' => $id));
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_brand/edit_brand', $data);
            $this->template->publish();
        }
    }

    protected function brand_submit()
    {
        $this->form_validation->set_rules('nama', 'Nama  brand', 'required');
        if ($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('error', validation_errors('<p class="alert alert-danger">', '</p>'));
            redirect(current_url() . "#errors");
        }
    }
}