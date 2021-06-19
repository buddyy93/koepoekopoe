<?php

/**
 * Created by PhpStorm.
 * User: Budy
 * Date: 12/18/2017
 * Time: 9:52 AM
 */
class Captcha extends CI_Model {

    public function addCaptcha($cap,$ip)
    {
        $data = array(
            'captcha_time'  => $cap['time'],
            'ip_address'    => $ip,
            'word'          => $cap['word']
        );
        $query = $this->db->insert_string('captcha', $data);
        $this->db->query($query);
    }

    public function deleteCaptcha($expiration)
    {
        $this->db->where('captcha_time < ', $expiration)
            ->delete('captcha');
    }

    public function checkCaptcha($expiration)
    {
        $sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
        $binds = array($this->input->post('captcha'), $this->input->ip_address(), $expiration);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();
        return $row->count;
    }

}