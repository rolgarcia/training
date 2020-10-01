<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exercises_model extends CI_Model {

	public function getDetails()
	{
		$query = $this->db->query("SELECT * FROM vw_details");

		// var_dump($query->result());
		// echo ($query->row()->firstname);
		// echo ($query->num_rows());

		return $query->result();
	}
}