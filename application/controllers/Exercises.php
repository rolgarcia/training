<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exercises extends CI_Controller {

	public function index()
	{
		
		$data["title"] = "Database Exercises";
		// $this->load->view("employee/index", $data);

		$this->load->model("Exercises_model");
		$data["exercises"] = $this->Employee_model->getDetails();
		$this->load->view("exercises/index", $data);
		
	}
}