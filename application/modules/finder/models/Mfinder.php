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
			$data=[];
			$query=$this->db->escape($_GET['q']);
			$keywords=str_replace(' ',',',$query);
			$sql="SELECT * FROM(
							SELECT *,(indexJudul + indexAlamat + indexDeskripsi )/3 + indexLokasi as indexResult FROM (
								SELECT pj.ID,obj.ID as idLokasi,pj.judul,obj.nama as lokasi,obj.alamat,pj.deskripsi ,
								 MATCH(pj.judul) AGAINST($keywords) as indexJudul,
								 MATCH(obj.nama) AGAINST($keywords) as indexLokasi,
								 MATCH(obj.alamat) AGAINST($keywords) as indexAlamat,
								 MATCH(pj.deskripsi) AGAINST($keywords) as indexDeskripsi
								 FROM objekLokasi obj 
									LEFT JOIN produk_jasa pj ON obj.ID=pj.id_lokasi
									) search
								ORDER BY indexResult DESC
									) hasil
						WHERE indexResult > 0  
						LIMIT 10
						";
			$q=$this->db->query($sql);
			foreach($q->result() as $r){
				$data[]=[
					'type'=>(!empty($r->ID)?'produk':'lokasi'),
					'id'=>(!empty($r->ID)?$r->ID:$r->idLokasi),
					'judul'=>(!empty($r->judul)?'Produk: '.$r->judul:'Lokasi: '.$r->lokasi),
					'alamat'=>$r->alamat,
					'deskripsi'=>$r->deskripsi
					];
			}
			
			echo json_encode($data);
		}
	}
	
	function result($type='',$id=''){
		if($id != ''){
			$this->db->limit(1);
			if($type=='produk'){
				$this->db->where('pj.ID',$id);
			}else{
				$this->db->where('ol.ID',$id);
			}
			$this->db->select([
				'pj.ID as id',
				'ol.ID as idLokasi',
				'IF(`pj`.`judul` = "",`ol`.`nama`,`pj`.`judul`) as judul ',
				'pj.deskripsi','pj.foto','dp.nama','ol.nama as namaLokasi',
				'ol.alamat','ol.deskripsi as deskripsiLokasi','ol.foto as fotoObjek'
				]);
			$this->db->join('data_pedagang dp','pj.id_pedagang = dp.ID','left');
			$this->db->join('kategori k','pj.id_kategori = k.ID','left');
			$this->db->join('objekLokasi ol','pj.id_lokasi = ol.ID','left');
			
			$q=$this->db->get('produk_jasa pj');
			
			if($q->num_rows() == 1) return $q->result();
		}
		return false;
	}

	function showKontak(){
		if(isset($_GET['id'])){
			$id=$_GET['id'];
			$this->db->where('id_lokasi',$id);
			$this->db->select(['key_kontak','value']);
			$q=$this->db->get('kontak_list');
			if($q->num_rows() > 0){
				foreach($q->result() as $r){
					$data[]=['key'=>$r->key_kontak,'value'=>$r->value];
				}
				echo json_encode($data);
			}else{
				echo json_encode([['key'=>'nomor','value'=>'Tidak Tersedia']]);
			}
		}
	}
	

}
//end of file