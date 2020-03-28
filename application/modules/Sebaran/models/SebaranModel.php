<?php 
class SebaranModel extends CI_Model {






	function get_data_kecamatan(){
		$this->db->order_by("kecamatan");
		$res = $this->db->get("tiger_kecamatan");
		$arr = array();
		foreach($res->result() as $row): 
			$arr[$row->id] = $row->kecamatan;
		endforeach;
		return $arr;
	}
	 
 

}
?>