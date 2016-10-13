<?php
class Madmin extends CI_Model{
	
	function load_kategori(){
		$q=$this->db->get('kategori');
		if($q->num_rows() > 0){
			foreach($q->result() as $row){
				$kategori[$row->ID]=$row->nama;
			}
		}
		$kategori['0']='Lainnya';
		return $kategori;
	}

	function selectAllData(){
		$data['produkTerakhir']=$this->getProdukTerakhir(6); // limit 6
		$data['lokasiTerakhir']=$this->getLokasiTerakhir(6); // limit 6
		return $data;
	}

	function getProdukTerakhir($limit){
		$id=$this->get_pedagang_id();
		//if($id = 0) exit('data pedagang tidak valid');
		$this->db->order_by('pj.ID','DESC');
		$this->db->limit($limit);
		$this->db->where('pj.id_pedagang',$id);
		$this->db->select(['pj.*']);
		$q=$this->db->get('produk_jasa pj');
		return $q;
	}

	function getLokasiTerakhir($limit){
		$id=$this->get_pedagang_id();
		$this->db->order_by('ol.ID','DESC');
		$this->db->limit($limit);
		$this->db->where('id_pedagang',$id);
		$this->db->select(['ol.*']);
		$q=$this->db->get('objekLokasi ol');
		return $q;
	}
	
	function get_pedagang_id($email=''){
		if(empty($email))$email=$this->session->userdata('--auth')['email'];
		$this->db->where('users.email',$email);
		$this->db->select('data_pedagang.ID');
		$this->db->join('data_pedagang','data_pedagang.id_user=users.ID','left');
		$q=$this->db->get('users');
		if(isset($q->row()->ID)){
		 return $q->row()->ID;
		}else{
			redirect('finder/login');
		}
	}
	
	function save_post($id){
		if($_POST){
		//print_r($_SESSION);//exit;
			$data['judul']=$this->input->post('nama');
			$data['id_lokasi']=$this->input->post('idTempat');
			$data['type']=$this->input->post('jenis');
			$data['id_pedagang']=$this->get_pedagang_id();
			$data['id_kategori']=$this->input->post('kategori');
			$data['deskripsi']=$this->input->post('deskripsi');
			$foto=$this->upload_gambar();
			if(!empty($foto)) $data['foto']=$foto;
			// cek kekosongan field
			if(empty($data['nama']))$error[]='Nama Harus Diisi';
			if(empty($data['alamat']))$error[]='Alamat Harus Diisi';
			if(empty($data['deskripsi']))$error[]='Deskripsi Harus Diisi';
			
			if($id > 0){
				$this->db->where(['ID'=>$id,'id_pedagang'=>$this->get_pedagang_id()]);
				$this->db->update('produk_jasa',$data);
				$this->session->flashdata('success','data berhasil diubah');
			}else{
				// proses insert
				$this->db->insert('produk_jasa',$data);
				$this->session->flashdata('success','data berhasil ditambahkan');
			}
			redirect('admin/dagangan');
		}
	}

	function upload_gambar($data=''){
        //unset($config);
        //print_r($_FILES);
        $inputName=isset($data['inputName'])?$data['inputName']:'foto';
        //echo $_FILES[$inputName]['tmp_name'];
        if(!isset($_FILES[$inputName]['tmp_name']))return '';
        $config=array();
        //echo '# upload_gambar'.br();
        $uploadPath=(isset($data['path']))?$data['path']:'produk-images/';
				$config['upload_path']          = FCPATH.'uploads/'.$uploadPath;
        $config['allowed_types']        = (isset($data['allowedType']))?$data['allowedType']:'jpg';
        $config['max_size']             = (isset($data['maxSize']))?$data['maxSize']:2000; ///100kB
        //$config['max_width']            = 2000; //1024px
        //$config['max_height']           = 768; //768px
        $config['overwrite']			= true;

//print_r($config);
        $imagename=array('foto');
        //$time=date('ymdgis');
        $files=array();
        $time=time();
        $i=1;
       // print_r($images);
        foreach($imagename as $image){
        	$config['file_name']=$image.'-'.$time;
        	$config['reset']=true;
        	$this->load->library('upload');
        	$this->upload->initialize($config);

        	if($_FILES[$inputName]['tmp_name'] != ''):
		        if ( ! $this->upload->do_upload($inputName)) // gambar berbentuk array
		        {
		            //$error = array('error' => $this->upload->display_errors());
		            die($inputName .' : '.$this->upload->display_errors());
		        }else{
		        	$data=$this->upload->data();
		        	array_push($files, $data['file_name']);
		        }
		    else:
		        array_push($files, '');

		    endif;
		    $i++;
        }
        $config=null;
        return isset($files[0])?$files[0]:'';
	}
	
	function get_dagangan(){
		$this->db->where('pj.id_pedagang',$this->get_pedagang_id());
		$this->db->select(['pj.ID','pj.judul','k.nama as kategori','dp.nama as pedagang']);
		$this->db->join('data_pedagang dp','dp.ID=pj.id_pedagang','left');
		$this->db->join('kategori k','k.ID=pj.id_kategori','left');
		$q=$this->db->get('produk_jasa pj');
		if($q->num_rows() > 0){
			return $q->result();
		}
	}

	function get_lokasi(){
		$this->db->where('id_pedagang',$this->get_pedagang_id());
		$q=$this->db->get('objekLokasi');
		if($q->num_rows() > 0)return $q->result();
		return false;
	}

	function save_lokasi($id=0){
		if($_POST){
			//print_r($_POST);
			$data['id_pedagang']=$this->get_pedagang_id();
			$data['nama']=$this->input->post('lokasiNama');
			$data['alamat']=$this->input->post('lokasiAlamat');
			$data['kota']=$this->input->post('lokasiKota');
			$data['deskripsi']=$this->input->post('lokasiDeskripsi');
			
			$dataUpload=['inputName'=>'fotoLokasi','path'=>'lokasi-images/','allowedType'=>'jpg|png'];
			$foto=$this->upload_gambar($dataUpload);
			if(!empty($foto)) $data['foto']=$foto;
			if($id == 0){
				if($this->db->insert('objekLokasi',$data)){
					$this->session->set_flashdata('success','Data Berhasil Dimasukkan');
					redirect('admin/new_lokasi');
				}				
			}else{
				$id_pedagang=$this->get_pedagang_id();
				$this->db->where(['ID'=>$id,'id_pedagang'=>$id_pedagang]);
				$this->db->update('objekLokasi',$data);
			}
		}
	}
	
	function get_detailProdukJasa($id){
		if($id > 0){
			$this->db->where(['p.id_pedagang'=>$this->get_pedagang_id(),'p.ID'=>$id]);
			$this->db->select('p.*,k.nama as kategori,l.nama as lokasi,l.alamat as alamat');
			$this->db->join('kategori k','k.ID=p.id_kategori','left');
			$this->db->join('objekLokasi l','l.ID=p.id_lokasi','left');
			$q=$this->db->get('produk_jasa p');
			if(isset($q->row()->ID)){
				return $q->result();
			}
		}
	}
	
	function get_detailLokasi($id){
		if($id > 0){
			$this->db->where(['l.id_pedagang'=>$this->get_pedagang_id(),'l.ID'=>$id]);
			$this->db->select(['l.*','k.key_kontak','k.value']);
			$this->db->join('kontak_list k','k.id_lokasi=l.ID','left');
			$q=$this->db->get('objekLokasi l');
			if(isset($q->row()->ID)){
				return $q->result();
			}
		}
	}
	
	function getOnePost($idPost){
		$this->db->where(['ID'=>$idPost,'id_pedagang'=>$this->get_pedagang_id()]);
		$q=$this->db->get('produk_jasa');
		if($q->num_rows() > 0)return $q->result();
		return false;
	}
	
	function hapus_lokasi($id){
		$this->db->where(['ID'=>$id,'id_pedagang'=>$this->get_pedagang_id()]);
		$this->db->delete('objekLokasi');
		redirect('admin/list_lokasi');
	}
	
	function delete_produkJasa($id){
		$this->db->where(['ID'=>$id,'id_pedagang'=>$this->get_pedagang_id()]);
		$this->db->delete('produk_jasa');
		redirect('admin/dagangan');
	}
	
	function insert_kategori(){
		if($_GET){
			if(isset($_GET['kategori'])){
			$data=["nama"=>$this->input->get('kategori')];
					if(!$this->db->insert('kategori',$data)){
						echo "data terdapat kesalahan";
					}else{
						redirect('admin/kategori');
					}
			}
		}
	}
	
	function get_kategori(){
		$this->db->order_by('ID','DESC');
		$q=$this->db->get('kategori');
		return $q->result();
	}

	function get_one_lokasi($id){
		$id_pedagang=$this->get_pedagang_id();
		if($id > 0){
			$this->db->where('ID',$id);
			$this->db->where('id_pedagang',$id_pedagang);
			$q=$this->db->get('objekLokasi');
			return $q->result();
		}
	}
	
	function delete_kategori($id){
		if($id > 0){
			$this->db->where('ID',$id);
			$this->db->delete('kategori');
			redirect('admin/kategori');
		}
	}
	
	function getkontak($id=0){
		$this->db->where('id_lokasi',$id);
		$q=$this->db->get('kontak_list');
		return $q->result();
	}
	
	function new_kontak(){
		if(isset($_GET['kontak'])){
			$this->db->insert('kontak_list',['key_kontak'=>'no telp','value'=>$this->input->get('kontak'),'id_lokasi'=>$this->input->get('id')]);
			redirect('admin/edit_lokasi/'.$this->input->get('id').'/prefered_content');
		}
	}
	
	function delete_kontak($id){
		$this->db->where('ID',$id);
		$this->db->delete('kontak_list');
		redirect('admin/edit_lokasi/'.$this->input->get('id').'/prefered_content');
	}
	
// LUMINO
	function get_total_user_baru(){
		$this->db->select('count(ID) as total');
		$this->db->where('DATE(dibuat) ' ,date('Y-m-d'));
		$q=$this->db->get('users');
		return $q->row()->total;
	}
	
	function allPosts(){
	    $total=$this->get_total_rows();
		$this->db->where('pj.id_pedagang',$this->get_pedagang_id());
		$this->db->select(['pj.ID','pj.judul','k.nama as kategori','dp.nama as pedagang']);
		$this->db->join('data_pedagang dp','dp.ID=pj.id_pedagang','left');
		$this->db->join('kategori k','k.ID=pj.id_kategori','left');
		$q=$this->db->get('produk_jasa pj');
		if($q->num_rows() > 0){
		    $no=1;
		    $data['total']=$total;
			foreach($q->result() as $row){
			    $data['rows'][]=[
			        'No'=>$no,
			        'ID'=>$row->ID,
			        'judul'=>$row->judul,
			        'kategori'=>$row->kategori,
			        'pedagang'=>$row->pedagang];
			    $no++;
			}
			echo json_encode($data);
		}else{
			return false;
		}
	}
	
	function get_total_rows(){
	    $this->db->where('id_pedagang',$this->get_pedagang_id());
	    $this->db->select('COUNT(ID) as total');
	    $q=$this->db->get('produk_jasa');
	    return $q->row()->total;
	}
	
	function insert_user(){
		if($_POST){
		//print_r($_POST);exit;
			$email=$this->input->post('email');
			$password=$this->input->post('password');
			$confPassword=$this->input->post('confPass');
			$pedagang['identitas']=$this->input->post('ktp');
			$pedagang['nama']=$this->input->post('nama');
			$pedagang['alamat']=$this->input->post('alamat');
			$pedagang['id_kelurahan']=$this->input->post('kelurahanId');
			if($password === $confPassword){
				$data=['email'=>$email,'password'=>md5($password)];
				if($this->db->insert('users',$data)){
					$pedagang['id_user']=$this->db->insert_id();
					$this->db->insert('data_pedagang',$pedagang);
				}
			}
		}
	}
	
	function get_users(){
		$this->db->select(['u.email as email','u.level as level','u.status',
		'dp.*']);
		//$this->db->where();
		$this->db->join('data_pedagang dp','dp.id_user = u.ID','left');
		$q=$this->db->get('users u');
		if($q->num_rows() > 0 ) return $q->result();
	}	

}
//end of file
