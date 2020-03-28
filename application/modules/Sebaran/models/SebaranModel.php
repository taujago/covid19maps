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
	 
 
function get_data_sebaran(){
	$res = $this->db->get("sebaran");

	$arr = array();
	foreach($res->result() as $row):
	$arr[$row->id_kecamatan] = array(
								"odp"=>$row->odp,
								"pdp"=>$row->pdp,
								"positif"=>$row->positif,
								"mati"=>$row->mati
								); 
	endforeach;
	return $arr;
}


}
?>