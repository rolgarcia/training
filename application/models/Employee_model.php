<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {

	public function getEmployee()
	{
		$query = $this->db->query("SELECT * FROM employee");

		// var_dump($query->result());
		// echo ($query->row()->firstname);
		// echo ($query->num_rows());

		return $query->result();
	}

	public function createEmployee($data)
	{
		$query = $this->db->insert("employee", $data);

		return $this->getEmployee();
	}

		public function deleteEmployee($getEmployeeID)
	{
		$query = $this->db->where("employeeID", $getEmployeeID);
		$query = $this->db->delete("employee");

		return $this->getEmployee();
	}

		public function updateEmployee($employeeID, $firstname, $lastname)
	{
		$query = $this->db->where("employeeID", $getEmployeeID);
		$query = $this->db->delete("employee");

		return $this->getEmployee();
	}

	public function getDetails(){
		$queryDetails = $this->db->query("SELECT * FROM trainingdb.vw_details");

		return $queryDetails->result_array();
	}
}
