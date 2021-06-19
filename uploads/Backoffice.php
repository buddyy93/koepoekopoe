<?php

/**
 * Created by PhpStorm.
 * User: Budy
 * Date: 12/13/2017
 * Time: 10:04 AM
 */
class Backoffice extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('backoffice/user');
        $this->load->model('backoffice/Captcha');
        $this->form_validation->CI =& $this;
    }

    public function index()
    {
        if ($this->session->logged_in)
        {
            $this->template->content->view('dashboard');
            $this->template->set_template('backoffice/template');
            $this->template->publish();
        } else
        {
            $vals = array(
                'word'        => '',
                'img_path'    => './captcha/',
                'img_url'     => base_url() . 'captcha/',
                'font_path'   => './fonts/comicbd.ttf',
                'img_width'   => '250',
                'img_height'  => '70',
                'expiration'  => 7200,
                'word_length' => 8,
                'font_size'   => '25',
                'img_id'      => 'Imageid',
                'pool'        => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

                // White background and border, black text and red grid
                'colors'      => array(
                    'background' => array(255, 255, 255),
                    'border'     => array(255, 255, 255),
                    'text'       => array(0, 0, 0),
                    'grid'       => array(255, 40, 40)
                )
            );
            $cap = create_captcha($vals);
            $this->Captcha->addCaptcha($cap, $this->input->ip_address());
            $data['image'] = $cap['image'];
            $this->load->view('backoffice/login-page', $data);
        }
    }


    public function verifyLogin()
    {
        //This method will have the credentials validation
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('captcha', 'Captcha', 'trim|required|callback_captcha_check');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_verify_user');
        if ($this->form_validation->run() == false)
        {
            //Field validation failed.  User redirected to login page
            $this->index();
        } else
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->session->set_userdata('logged_in', $this->user->login($username, $password));
            redirect(base_url() . 'backoffice');
        }
    }

    public function verify_user()
    {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        //query the database
        $result = $this->user->login($username, $password);
        if ($result)
        {
            return true;
        } else
        {
            $this->form_validation->set_message('verify_user', 'Invalid username or password');
            return false;
        }
    }

    public function captcha_Check()
    {
        $expiration = time() - 7200; // Two hour limit
        $this->Captcha->deleteCaptcha($expiration);

// Then see if a captcha exists:
        if ($this->Captcha->checkCaptcha($expiration) == 0)
        {
            $this->form_validation->set_message('captcha_check', 'You must submit the word that appears in the image.');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            return false;
        } else
            return true;
    }

    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect(base_url() . 'backoffice');
    }
}