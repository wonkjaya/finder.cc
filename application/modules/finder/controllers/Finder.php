<?php

class Finder extends CI_Controller{

	function __construct(){
		parent :: __construct();
		$this->load->model('mfinder','m');
		$this->load->library('session');
	}
	
	function index(){
		$this->finder();
	}
	
	function finder(){
		$this->load->view('homepage');
		$this->load->view('includes/modal_login');
	}
	
	//START REGISTER
	
	function register(){
		$this->m->register();
		$this->load->view('administration/register');
		$this->load->view('includes/modal_login');
	}
	
	function register_success(){ echo $this->session->flashdata('success');
		if(!empty($this->session->flashdata('success'))){
			$this->load->view('administration/register_success');
		}else{
			redirect();
		}
	}
	
	// END REGISTER
	// START LOGIN
	
	function login(){
		$this->m->do_login();
		$this->load->view('administration/login');
		$this->load->view('includes/modal_login');
	}
	
	function do_login(){
		$login=$this->m->do_login();
	}
	
	// END LOGIN

	// SEARCH METHOD
	function doSearch(){
		$this->m->doSearch();
	}
	
	function result($id=''){
		$data['result']=$this->m->result($id);
		$this->load->view('info',$data);
	}

	function showKontak(){
		$this->m->showKontak();
	}

}

//end of file