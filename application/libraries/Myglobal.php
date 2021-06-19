<?php

/**
 * Created by PhpStorm.
 * User: Budy
 * Date: 1/19/2018
 * Time: 2:24 PM
 */
class Myglobal {
    public function getLoggedInUser()
    {
        $CI =& get_instance();
        if( $CI->session->userdata('logged_in'))
            return $CI->session->userdata('logged_in');
        else
            return null;
    }

}