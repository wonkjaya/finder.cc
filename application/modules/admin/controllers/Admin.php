<?php

class Admin extends CI_Controller{

	function __construct(){
		parent :: __construct();
		$this->load->model('madmin','m');
		$this->load->library('session');
	}
	
	function index(){
		$this->dashboard();
	}
	
	function dashboard(){
		$this->load->view('dashboard');
	}
	
	
}

//end of file