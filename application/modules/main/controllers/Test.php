<?php

/**
 * Created by PhpStorm.
 * User: Budy
 * Date: 12/6/2017
 * Time: 3:36 PM
 */
class Test extends MX_Controller {

    public function index()
    {
        $this->template->title = 'Welcome to KoepoeKoepoe';

        $this->template->stylesheet->add(base_url()."public/css/index.css");

        $this->template->header->view('main/header');
        $this->template->content->view('main/index', array('title' => 'Hello, world!'));
        $this->template->footer->view('main/footer');

        $this->template->publish();
    }

}