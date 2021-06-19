<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('berita/DataBerita');
    }

    public function index()
    {
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            if($message = $this->session->flashdata('result'))
            {
                $data['result'] = $message;
            }
            $data['berita'] = $this->DataBerita->record_count('mockupdata');
            $this->load->view('login/home-page', $data);
        }
        else
        {
            //If no session, redirect to login page
            redirect(base_url().'login', 'refresh');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect(base_url().'login', 'refresh');
    }

}