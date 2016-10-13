<?php
class Api extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('api_model','m');
	}

		
	function kelurahan($type=""){
		if($type=="findbyname"){
				if(isset($_GET['q'])){
					$res=$this->m->get_kelurahan($_GET['q']);
					foreach($res as $r){
						$name = ucwords($r->kelurahan .'-'. $r->kabupaten);
						$object[]=["name"=>$name,"kelurahan"=>$r->kelurahan,"kecamatan"=>$r->kecamatan,"kabupaten"=>$r->kabupaten,"provinsi"=>$r->provinsi,"id"=>$r->id]; 
					}
					echo json_encode(["data"=>$object]);
				}		
		}
	}

}

// end of file
