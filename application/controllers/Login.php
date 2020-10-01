<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Login_model");
		$this->login = new Login_model;
	}

	public function index()
	{
		$this->load->view("Login/index");
	}

	function validate_login(){
		$username = $this->input->post("username");
		$password = $this->input->post("password");

		 $data = $this->login->validate_login($username, $password); 

		 echo json_encode($data);
	}
}

