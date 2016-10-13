<?php
class Api_model extends CI_model{

	function __construct(){
		parent::__construct();
	}
	
	function get_kelurahan($query){
		$this->db->limit(10);
		if(strlen($query) > 0){
			$this->db->like('kelurahan',$query);
		}
		$q=$this->db->get('view_kelurahan');
		return $q->result();
	}

}
?>