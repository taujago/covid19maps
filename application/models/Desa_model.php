<?php 
class Desa_model extends CI_Model {



	function get_data($param){

		// show_array($param);

		extract($param);

		$cols = array(0=>"id","kode_desa","desa","kecamatan");


		$this->db->select("a.*, b.kecamatan")

		 ->from('tiger_desa a')
		 ->join('tiger_kecamatan b','b.id = a.id_kecamatan');

		if(!empty($param['nama'])) {


			$this->db->where(" (desa like '%$nama%') ",null,false);


		}

		if(!empty($id_kecamatan)){
			$this->db->where("id_kecamatan",$id_kecamatan);
		}

	 
		
		
		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');

		 ($param['sort_by'] != null) ? $this->db->order_by($cols[$param['sort_by']], $param['sort_direction']) :'';
     

		$res = $this->db->get();

		// echo $this->db->last_query(); exit;


		return $res;


	}
 

}
?>