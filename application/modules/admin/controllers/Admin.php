<?php

class Admin extends CI_Controller{

	var $theme;

	function __construct(){
		parent :: __construct();
		$this->load->model('madmin','m');
		$this->load->library('session');
		$this->theme=(defined('THEME')?THEME:'default');
	}
	
	function logout(){
		$this->session->sess_destroy();
		redirect();
	}
	
	function index(){
		//echo $this->theme;
		$this->dashboard();
	}
	
	function dashboard(){
		$data['allData']=$this->m->selectAllData();
		if($this->theme == 'lumino'){
			$total_user_new=$this->m->get_total_user_baru();
			$total_visitor_new=0;
			$total_page_views_today=100;
			$data['total']=array(
			    'user'=>$total_user_new,
			    'visitor'=>$total_visitor_new,
			    'pageview'=>$total_page_views_today
			);
		}
		$this->load->view($this->theme . '/dashboard',$data);
	}
	
//produk
    function allPosts(){
        $this->m->allPosts();
    }
	
	function dagangan(){
		$data['dagangan']=$this->m->get_dagangan();
		$this->load->view($this->theme . '/produkJasa',$data);
	}
	
	function detail_produkJasa($id){
		$data['detail_produkJasa']=$this->m->get_detailProdukJasa($id);
		$this->load->view($this->theme . '/detail_ProdukJasa',$data);
	}
	
	function new_post(){
		$this->m->save_post(''); // insert new
		$this->load->helper('form');
		$data['lokasi']=$this->m->get_lokasi(); 
		$data['kategori']=$this->m->load_kategori();
		$this->load->view($this->theme . '/form_produkJasa',$data);
	}
	
	function edit_produkJasa($idPost){
		$this->m->save_post($idPost); // update
		$this->load->helper('form');
		$data['post']=$this->m->getOnePost($idPost);
		$data['lokasi']=$this->m->get_lokasi(); 
		$data['kategori']=$this->m->load_kategori();
		$this->load->view($this->theme . '/form_produkJasa',$data);
	}
	
	function delete_produkJasa($id){
		$this->m->delete_produkJasa($id);
	}

// lokasi

	function list_lokasi(){
		$data['lokasi']=$this->m->get_lokasi();
		$this->load->view($this->theme . '/objekLokasi',$data);
	}
	
	function detail_lokasi($id){
		$data['detail_lokasi']=$this->m->get_detailLokasi($id);
		$this->load->view($this->theme . '/detail_lokasi',$data);
	}

	function new_lokasi(){
		$this->m->save_lokasi();
		$this->load->helper('form');
		$this->load->view($this->theme . '/form_lokasi');
	}
	
	function hapus_lokasi($id){
		$this->m->hapus_lokasi($id);
	}
	
	function edit_lokasi($id=0){
		$this->m->save_lokasi($id);
		$data['lokasi']=$this->m->get_one_lokasi($id);
		$data['kontak']=$this->m->getkontak($id);
		$this->load->helper('form');
		$this->load->view($this->theme . '/form_lokasi',$data);
	}
	
// kategori
	
	function kategori(){
		$this->m->insert_kategori();
		$data['kategori']=$this->m->get_kategori();
		$this->load->view($this->theme . '/kategori',$data);
	}
	
	function delete_kategori($id=0){
		$this->m->delete_kategori($id);
	}

// kontak
	
	function new_kontak(){
		$this->m->new_kontak();
	}
	
	function delete_kontak($id=0){
		$this->m->delete_kontak($id);
	}

// user

	function users(){
		$data['users']=$this->m->get_users();
		$this->load->view($this->theme . '/users',$data);
	}
	
	function new_user(){
		$this->m->insert_user();
		$this->load->helper(['form','myForm']);
		$this->load->view($this->theme . '/form_user');
	}	

}

//end of file
