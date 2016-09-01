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
		$data['lokasi']=$this->m->get_lokasi(); 
		$data['kategori']=$this->m->load_kategori();
		$this->load->view('form_produkJasa',$data);
	}
	
	function list_lokasi(){
		$data['lokasi']=$this->m->get_lokasi();
		$this->load->view('objekLokasi',$data);
	}

	function new_lokasi(){
		$this->m->save_lokasi();
		$this->load->helper('form');
		$this->load->view('form_lokasi');
	}
	
	
}

//end of file