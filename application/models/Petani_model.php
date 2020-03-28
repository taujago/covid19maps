<?php 
class Petani_model extends CI_Model {



	function get_data($param){

		// show_array($param);

		extract($param);

		$cols = array(0=>"petani_nik","petani_nama","petani_alamat","nama_poktan","nama_pengecer","desa.id","luas");


		$this->db->select("a.*, poktan.nama_poktan, pengecer.nama_pengecer, desa.desa ")

		->from("petani a")
		->join('m_pengecer pengecer','pengecer.id_pengecer = a.id_pengecer','left')
		->join('m_poktan poktan','poktan.id_poktan = a.id_poktan','left')
		->join('m_gapoktan gapoktan','gapoktan.id_gapoktan = poktan.id_gapoktan','left')

		->join('tiger_desa desa','desa.id = gapoktan.id_desa','left')
		->join('tiger_kecamatan kec','kec.id = desa.id_kecamatan','left')
		
		;

		if(!empty($param['nama'])) {


			$this->db->where(" (petani_nama like '%$nama%' or petani_nik like '%$nama' ) ",null,false);


		}

		if(!empty($id_kecamatan)) {
			$this->db->where("kec.id",$id_kecamatan);
		}


		if(!empty($id_desa)&&$id_desa!=='null'&&$id_desa!=='x') {
			$this->db->where("desa.id",$id_desa);
		}
		
		
		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');

		 ($param['sort_by'] != null) ? $this->db->order_by($cols[$param['sort_by']], $param['sort_direction']) :'';
     

		$res = $this->db->get();

		// echo $this->db->last_query(); exit;


		return $res;


	}

function list_data_petani(){
	$this->db->select("a.*, poktan.nama_poktan, pengecer.nama_pengecer
		, pengecer.kode_pengecer
		, desa.desa 
		, gapoktan.nama_gapoktan
		, penyuluh.nama_penyuluh
		")

		->from("petani a")
		->join('m_pengecer pengecer','pengecer.id_pengecer = a.id_pengecer','left')
		->join('m_poktan poktan','poktan.id_poktan = a.id_poktan','left')
		->join('m_gapoktan gapoktan','gapoktan.id_gapoktan = poktan.id_gapoktan','left')
		->join('m_penyuluh penyuluh','penyuluh.id_penyuluh=a.id_penyuluh')

		->join('tiger_desa desa','desa.id = gapoktan.id_desa','left')
		->join('tiger_kecamatan kec','kec.id = desa.id_kecamatan','left')
		
	;

	$res = $this->db->get();

	return $res;



}


}
?>