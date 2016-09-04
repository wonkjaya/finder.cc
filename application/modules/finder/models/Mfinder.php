<?php
class Mfinder extends CI_Model{
	
	function register(){
		if($_POST){
			$data_detail['nama']=$this->input->post('firstName').' '.$this->input->post('lastName');
			$data['email']=$this->input->post('email');
			$data['password']=md5($this->input->post('password'));
			if($this->check_email($data['email'])){
				$this->do_register($data,$data_detail);
			}
		}
	}
	
	function check_email($email){
		$this->db->select('ID');
		$this->db->where('email',$email);
		$this->db->limit(1);
		$q=$this->db->get('users');
		if($q->num_rows() == 0) return true;
	}
	
	function do_register($data,$data_detail){
		$this->db->insert('users',$data);
		$data_detail['id_user']=$this->db->insert_id();
		$this->db->insert('data_pedagang',$data_detail);
		$this->session->set_flashdata('success',true);
		redirect('register_success');
		return false; // berhasil di daftarkan
	}
	
	function do_login(){
		if($_POST){
			$email=$this->input->post('email');
			$this->db->select('ID');
			$this->db->where(['email'=>$email,'password'=>md5($this->input->post('password'))]);
			$q=$this->db->get('users');
			$num=$q->num_rows();
			if($num == 1){
				$this->session->set_userdata('--auth',['email'=>$email]);
				redirect('admin'); //login berhasil dan dfinder/iarahkan ke controller "admin"
			}else{
				$this->session->set_flashdata('error',true);
				redirect('finder/login'); // login gagal
			}
		}
	}
	
	function doSearch(){
		if(isset($_GET['q'])){
			$query=$this->db->escape($_GET['q']);
			$keywords=str_replace(' ',',',$query);
			$sql="SELECT *,(indexJudul + indexAlamat + indexDeskripsi)/3 as indexResult FROM (
							SELECT pj.ID,pj.judul,obj.alamat,pj.deskripsi ,
							 MATCH(pj.judul) AGAINST($keywords) as indexJudul,
							 MATCH(obj.alamat) AGAINST($keywords) as indexAlamat,
							 MATCH(pj.deskripsi) AGAINST($keywords) as indexDeskripsi
							 FROM produk_jasa pj 
								LEFT JOIN objekLokasi obj ON obj.ID=pj.id_lokasi
								WHERE 1  
										LIMIT 10) search
						ORDER BY indexResult DESC
						";
			$q=$this->db->query($sql);
			foreach($q->result() as $r){
				$data[]=['id'=>$r->ID,'judul'=>$r->judul,'alamat'=>$r->alamat,'deskripsi'=>$r->deskripsi];
			}
			
			echo json_encode($data);
		}
	}
	

}
//end of file