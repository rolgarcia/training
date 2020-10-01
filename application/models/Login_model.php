<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	function validate_login($username,$password){
		$query = $this->db->query("SELECT * FROM employee WHERE `username` = '$username' AND `password` = '$password' ");

		if($query->num_rows()!=0) {

		$fullname = $query->row()->firstname."".$query->row()->lastname;
		$this->session->set_userdata("fullname", $fullname);
		$this->session->set_userdata($query->row_array());
		}
		return $query->num_rows();
		
	}
}