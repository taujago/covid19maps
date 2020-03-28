<?php 
class Tataruang_model extends CI_Model {
	// function __construct(){
	// 	parent::__construct();

	// }



	function get_data($param){


		$this->db->select("a.*, date_format(tanggal,'%d-%m-%Y') as tanggal, m.manfaat, desa.desa, kec.kecamatan")

		->from("tataruang a")

		->join('m_manfaat m','m.id = a.lokasi_id_manfaat','left')
		->join('tiger_kecamatan kec','kec.id = a.lokasi_id_kecamatan','left')
		->join('tiger_desa desa','desa.id = a.lokasi_id_desa ','left')
		;

		
		
		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');

		$res = $this->db->get();

		// echo $this->db->last_query();


		return $res;


	}

	function get_kordinat_by_id($id){
		$this->db->where("id_tataruang",$id);
		$res = $this->db->get("kordinat");
		$str = "";
		foreach($res->result() as $row) : 
			$str .= $row->x.",".$row->y."&#10";
		endforeach;
		return $str;
	}
}

?>