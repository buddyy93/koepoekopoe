<?php

/**
 * Created by PhpStorm.
 * User: Budy
 * Date: 12/18/2017
 * Time: 3:04 PM
 */
class AdminAuthMiddleware {
    // Get injected controller and ci references
    protected $controller;
    protected $ci;

    // Some custom and example data related to this class
    public $roles = array();

    // All middlewares will pass controller and ci class objects as references to constructor
    // It's upto you, that what you do with them
    // Obviously it's not required :)

    public function __construct($controller, $ci)
    {
        $this->controller = $controller;
        $this->ci = $ci;
    }

    // This function is required, and is entry point to this class
    public function run(){
        // you can reference to current controller called class
        $this->controller->some_your_method();

        // you can run db queries
        $categories = $this->ci->db->get('categories');

        // you can get reference to models, libraries
        $users = $this->controller->user->list();
        $this->controller->load->library('session');

        // you can get session references
        $email = $this->ci->session->userdata('email');

        // you can modify the class and add your methods to this class
        $this->roles = array('somehting', 'view', 'edit');

        // you can get reference to called function and class name on request
        $this->controller->router->method; // returns method name, eg. index
        $this->controller->router->class; // returns from which class (controller class) this function has been called

        // and also you can terminate the request, if you dont want it to pass on
        show_error('You are not allowed to perform this operation');
    }
}