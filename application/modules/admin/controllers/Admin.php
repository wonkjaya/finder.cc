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
	
	function dagangan(){
		$data['dagangan']=$this->m->get_dagangan();
		$this->load->view('produkJasa',$data);
	}
	
	function new_post(){
		$this->m->save_post();
		$this->load->helper('form');
		$data['kategori']=$this->m->load_kategori();
		$this->load->view('form_produkJasa',$data);
	}
	
	
}

//end of file