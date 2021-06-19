<?php

/**
 * Created by PhpStorm.
 * User: Budy
 * Date: 12/18/2017
 * Time: 9:53 AM
 */
class User extends CI_Model {

    function login($username, $password)
    {
        $this -> db -> select('username, password');
        $this -> db -> from('users');
        $this -> db -> where('username', $username);
        $this -> db -> where('password', $password);
        $this -> db -> limit(1);

        $query = $this->db->get();

        if($query -> num_rows() == 1)
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }
}