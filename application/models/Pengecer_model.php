<?php 
class Pengecer_model extends CI_Model {



	function get_data($param){

		// show_array($param);

		extract($param);

		$cols = array(0=>"id_pengecer","kode_pengecer","nama_pengecer");


		$this->db->select("a.*")

		 ->from('m_pengecer a');

		if(!empty($param['nama'])) {


			$this->db->where(" (nama_pengecer like '%$nama%' or kode_pengecer like '%$nama%' ) ",null,false);


		}

	 
		
		
		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');

		 ($param['sort_by'] != null) ? $this->db->order_by($cols[$param['sort_by']], $param['sort_direction']) :'';
     

		$res = $this->db->get();

		// echo $this->db->last_query(); exit;


		return $res;


	}
 

}
?>