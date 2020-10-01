<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	public function index()
	{

		

		
		$data["title"] = "EMPLOYEE PAGE";
		// $this->load->view("employee/index", $data);

		

		$this->load->model("Employee_model");
		$data["employee"] = $this->Employee_model->getEmployee();
		$data['showDetails'] =$this->Employee_model->getDetails();
		$this->load->view("employee/index", $data);

		
	}

	public function create_employee()
	{
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');

		$data = array("firstname" => $firstname,
					  "lastname" => $lastname);

		$this->load->model('Employee_model');
		$result = $this->Employee_model->createEmployee($data);

		echo json_encode($result);
	}

	public function delete_employee()
	{
		

		$getEmployeeID = $this->input->post("getEmployeeId");

		$this->load->model('Employee_model');
		$result = $this->Employee_model->deleteEmployee($getEmployeeID);

		echo json_encode($result);
	}

	public function upload_employee()
	{
		

		$filename = $this->input->post("filename");
		move_uploaded_file($_FILES["file"]["tmp_name"], "upload/".$filename);
	}

	public function logout(){

		session_destroy();
		redirect(base_url());	
	}

	// function getDetails()
	// {
		
	// }
}
