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
	
	function get_pedagang_id($email=''){
		if(empty($email))$email=$this->session->userdata('--auth')['email'];
		$this->db->where('users.email',$email);
		$this->db->select('data_pedagang.ID');
		$this->db->join('data_pedagang','data_pedagang.id_user=users.ID','left');
		$q=$this->db->get('users');
		return isset($q->row()->ID)?$q->row()->ID:0;
	}
	
	function save_post(){
		if($_POST){
		//print_r($_SESSION);//exit;
			$data['judul']=$this->input->post('nama');
			$data['alamat']=$this->input->post('alamat');
			$data['id_pedagang']=$this->get_pedagang_id();
			$data['id_kategori']=$this->input->post('kategori');
			$data['deskripsi']=$this->input->post('deskripsi');
			$data['foto']=$this->upload_gambar();
			// cek kekosongan field
			if(empty($data['nama']))$error[]='Nama Harus Diisi';
			if(empty($data['alamat']))$error[]='Alamat Harus Diisi';
			if(empty($data['deskripsi']))$error[]='Deskripsi Harus Diisi';
			// proses insert
			$this->db->insert('produk_jasa',$data);
		}
	}

	function upload_gambar($images=''){
        //unset($config);
        $config=array();
        //echo '# upload_gambar'.br();
				$config['upload_path']          = FCPATH.'/uploads/lokasi-images/';
        $config['allowed_types']        = 'jpg';
        $config['max_size']             = 100; ///100kB
        $config['max_width']            = 1024; //1024px
        $config['max_height']           = 768; //768px
        $config['overwrite']			= true;

        $imagename=array('foto');
        //$time=date('ymdgis');
        $files=array();
        $time=time();
        $i=1;
       // print_r($images);
        foreach($imagename as $image){
        	$config['file_name']=isset($images[$image])?$images[$image]:$image.'-'.$time;
        	$config['reset']=true;
        	$this->load->library('upload');
        	$this->upload->initialize($config);

        	if($_FILES[$image]['tmp_name'] != ''):
		        if ( ! $this->upload->do_upload($image)) // gambar berbentuk array
		        {
		            //$error = array('error' => $this->upload->display_errors());
		            die($image .' : '.$this->upload->display_errors());
		        }else{
		        	$data=$this->upload->data();
		        	array_push($files, $data['file_name']);
		        }
		    else:
		        array_push($files, '');

		    endif;
		    $i++;
        }
        //print_r($files);exit;
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
		}else{
			return false;
		}
	}
	

}
//end of file