<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function get_user_by_email_password($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('users');
		echo '<pre>';
		echo "hii";
		print_r($query->row_array());
		echo '</pre>';
		die;
        return $query->row_array();
    }

}
