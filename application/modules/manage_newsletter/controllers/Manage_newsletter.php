<?php

/**
 * Created by PhpStorm.
 * User: Budy
 * Date: 12/13/2017
 * Time: 3:07 PM
 */
class Manage_newsletter extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataSubscriber');
        $this->load->library('ckeditor');
        $this->load->library('ckfinder');
        $this->ckeditor->basePath = '/new/public/ckeditor/';
        $this->ckeditor->config['language'] = 'en';
        $this->ckeditor->config['width'] = '730px';
        $this->ckeditor->config['height'] = '300px';
        $this->ckfinder->SetupCKEditor($this->ckeditor, '/new/public/ckfinder/');
        if (empty($this->session->userdata('logged_in')))
            redirect(base_url() . 'backoffice');
    }

    public function index()
    {
        $this->load->view('manage_newsletter/test');
    }

    public function sendNewsletter()
    {
        $this->load->library('email');

        $config['protocol']    = 'smtp';

        $config['smtp_host']    = 'ssl://mail.koepoekoepoe.com';

        $config['smtp_port']    = '26';

        $config['smtp_timeout'] = '7';

        $config['smtp_user']    = 'info@koepoekoepoe.com';

        $config['smtp_pass']    = 'buddy210893';

        $config['charset']    = 'utf-8';

        $config['newline']    = "\r\n";

        $config['mailtype'] = 'text'; // or html

        $config['validation'] = TRUE; // bool whether to validate email or not

        $this->email->initialize($config);


        $this->email->from('info@koepoekoepoe.com', 'Koepoe Koepoe');
        $this->email->to('buddyy93@gmail.com');


        $this->email->subject('Email Test');

        $this->email->message('Testing the email class.');

        $this->email->send();

        echo $this->email->print_debugger();
    }
}