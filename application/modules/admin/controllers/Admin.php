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
		$data['allData']=$this->m->selectAllData();
		$this->load->view('dashboard',$data);
	}
	
//produk
	
	function dagangan(){
		$data['dagangan']=$this->m->get_dagangan();
		$this->load->view('produkJasa',$data);
	}
	
	function detail_produkJasa($id){
		$data['detail_produkJasa']=$this->m->get_detailProdukJasa($id);
		$this->load->view('detail_ProdukJasa',$data);
	}
	
	function new_post(){
		$this->m->save_post(''); // insert new
		$this->load->helper('form');
		$data['lokasi']=$this->m->get_lokasi(); 
		$data['kategori']=$this->m->load_kategori();
		$this->load->view('form_produkJasa',$data);
	}
	
	function edit_produkJasa($idPost){
		$this->m->save_post($idPost); // update
		$this->load->helper('form');
		$data['post']=$this->m->getOnePost($idPost);
		$data['lokasi']=$this->m->get_lokasi(); 
		$data['kategori']=$this->m->load_kategori();
		$this->load->view('form_produkJasa',$data);
	}
	
	function hapus_proudkJasa($id){
		$this->m->hapus_produkJasa($id);
	}

// lokasi

	function list_lokasi(){
		$data['lokasi']=$this->m->get_lokasi();
		$this->load->view('objekLokasi',$data);
	}
	
	function detail_lokasi($id){
		$data['detail_lokasi']=$this->m->get_detailLokasi($id);
		$this->load->view('detail_lokasi',$data);
	}

	function new_lokasi(){
		$this->m->save_lokasi();
		$this->load->helper('form');
		$this->load->view('form_lokasi');
	}
	
	function hapus_lokasi($id){
		$this->m->hapus_lokasi($id);
	}
	
	function new_kategori(){
		$this->m->insert_kategori();
		$data['kategori']=$this->m->get_kategori();
		$this->load->view('kategori',$data);
	}
	
	
}

//end of file