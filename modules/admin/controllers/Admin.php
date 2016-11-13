<?php

class Admin extends CI_Controller{


	function __construct(){
		parent :: __construct();
		//$this->load->model('madmin','m');
		$this->load->library('session');
		$this->theme=(defined('THEME')?THEME:'default');
	}
	
	function logout(){
		$this->session->sess_destroy();
		//print_r($_SESSION);
		redirect();
	}
	
	function index(){
		//echo $this->theme;
		$this->dashboard();
	}
	
	function dashboard(){
		$data=[];
		$this->load->view($this->theme . '/dashboard',$data);
	}
	
	function dagangan(){
		$data=[];
		$this->load->view($this->theme . '/produkJasa',$data);
	}
	
	function detail_produkJasa($id){
		$this->load->view($this->theme . '/detail_ProdukJasa',$data);
	}
	
	function new_post(){
		$data=[];
		$this->load->view($this->theme . '/form_produkJasa',$data);
	}
	
	function edit_produkJasa($idPost){
		$data=[];
		$this->load->view($this->theme . '/form_produkJasa',$data);
	}

// lokasi

	function list_lokasi(){
		$data=[];
		$this->load->view($this->theme . '/objekLokasi',$data);
	}
	
	function detail_lokasi($id){
		$data=[];
		$this->load->view($this->theme . '/detail_lokasi',$data);
	}

	function new_lokasi(){
		$data=[];
		$this->load->view($this->theme . '/form_lokasi');
	}
	
	function edit_lokasi($id=0){
		$data=[];
		$this->load->view($this->theme . '/form_lokasi',$data);
	}
	
// kategori
	
	function kategori(){
		$data=[];
		$this->load->view($this->theme . '/kategori',$data);
	}
// user

	function users(){
		$data=[];
		$this->load->view($this->theme . '/users',$data);
	}
	
	function new_user(){
		$data=[];
		$this->load->view($this->theme . '/form_user');
	}
	
	function detail_user($id=0){
		$data=[];
		$this->load->view($this->theme . '/detail_user',$data);
	}
	
	function edit_user($id=0){
		$data=[];
		$this->load->view($this->theme . '/form_user',$data);
	}

}

//end of file
