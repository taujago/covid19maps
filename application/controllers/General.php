<?php 
class General extends CI_Controller {
	function __construct(){
		parent::__construct();
	}



	function get_data_desa($id){

		$post = $this->input->post();

		$id_desa = isset($post['lokasi_id_desa'])?$post['lokasi_id_desa']:"";

		$this->db->where("id_kecamatan",$id);
		$this->db->order_by("desa");
		$res = $this->db->get("tiger_desa");
		$html="<option value='x'>= SEMUA DESA/KELURAHAN =</option>";
		$sel = "";
		foreach($res->result() as $row): 
			$sel = ($row->id == $id_desa)?"selected":"";
			$html.="<option value=$row->id $sel>$row->desa</option>";
		endforeach;
		echo $html;

	}

	function get_desa(){

		$post = $this->input->post();


		$this->db->where("id_kecamatan",$post['id_kecamatan']);
		$this->db->order_by("desa");
		$res = $this->db->get("tiger_desa");
		$html="<option value='x'>= PILIH DESA/KELURAHAN =</option>";
		$sel = "";
		foreach($res->result() as $row): 
			// $sel = ($row->id == $id_desa)?"selected":"";
			$html.="<option value=$row->id $sel>$row->desa</option>";
		endforeach;
		echo $html;

	}


	function cek_gapoktan(){

		$post = $this->input->post();


		$id_desa = $post['id_desa'];

		$this->db->where("id_desa",$id_desa);

		$res = $this->db->get("m_gapoktan");

		if ($res->num_rows()>0) {
			$data_gapoktan = $res->row_array();

			$ret = array('error' => true, 'message' => 'DATA GAPOKTAN UNTUK DESA INI SUDAH ADA', 'nama_gapoktan' => $data_gapoktan['nama_gapoktan']);
		}else{
			$ret = array('error' => false);
		}

		echo json_encode($ret);
	}

	function get_gapoktan(){
		$post = $this->input->post();


		$id_gapoktan = isset($post['id_gapoktan'])?$post['id_gapoktan']:"";

		$id_desa = $post['id_desa'];

		$this->db->where("id_desa",$id_desa);

		$res = $this->db->get("m_gapoktan");

		$html="<option value='x'>= PILIH GAPOKTAN  =</option>";
		$sel="";
		foreach($res->result() as $row):
			$sel = ($row->id_gapoktan == $id_gapoktan)?"selected":"";
			$html .="<option value=$row->id_gapoktan $sel>$row->nama_gapoktan</option>";
		endforeach;
		echo $html;
	}

	function get_poktan(){

		$post = $this->input->post();

		$id_gapoktan = $post['id_gapoktan'];

		$id_poktan = isset($post['id_poktan'])?$post['id_poktan']:"";

		$this->db->where("id_gapoktan",$id_gapoktan);

		$res = $this->db->get("m_poktan");
		$html="";
		$sel="";
		foreach($res->result() as $row):
			$sel = ($row->id_poktan == $id_poktan)?"selected":"";
			$html .="<option value=$row->id_poktan $sel>$row->nama_poktan</option>";
		endforeach;
		echo $html;

	}

	function get_data_penduduk(){
		$post = $this->input->post();

		$nik = $post['nik'];

		$this->db->where("NIK",$nik);
		$data = $this->db->get("penduduk")->row();

		$ret = array(
				"petani_nik" => $data->NIK,
				"petani_nama" => $data->NAMA_LGKP,
				"petani_ttl"			=> $data->TMPT_LHR,
				"petani_tgl_lahir"			=> flipdate(substr($data->TGL_LHR,0,10)),
				"petani_nama_ibu"			=> "",
				"alamat"			=> "$data->ALAMAT RT $data->RT RW $data->RW Desa/Kel. $data->DESA_KEL Kecamatan $data->KECAMATAN "
				 
		);

		echo json_encode($ret);

	}


	function get_petani(){
		$post = $this->input->post();

		$this->db->where("id_poktan",$post['id_poktan']);

		$res = $this->db->get("petani");
		$html="";
		$sel="";
		foreach($res->result() as $row):
			$sel = ($row->id_poktan == $id_poktan)?"selected":"";
			$html .="<option value=$row->id_petani $sel>$row->petani_nik - $row->petani_nama</option>";
		endforeach;
		echo $html;
	}
}
?>