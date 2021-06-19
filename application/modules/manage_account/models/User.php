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
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->limit(1);
        $row = $this->db->get()->row();

        if ($row)
        {
            if($this->encryption->decrypt($row->password)==$password)
                return $row;
            else
                return false;
        } else
        {
            return false;
        }
    }
}