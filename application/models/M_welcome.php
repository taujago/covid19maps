<?php class M_welcome extends CI_Model{

	function simpan_pesan($data){
		$hasil=$this->db->insert('pesan',$data);
		return $hasil;
	}

	function simpan_pengguna($data){
		$hasil=$this->db->insert('member',$data);
		return $hasil;
	}

	function list_pemohon(){
		$sesi = $this->session->userdata("user");
		$id = $sesi['id_member'];
		//$where = "id_member = '$id'";

		$this->db->select('*,date_format(tanggal,"%d-%m-%Y") as tanggal, tataruang.id as idt');    
		$this->db->from('tataruang');
		$this->db->join('m_manfaat', 'tataruang.lokasi_id_manfaat = m_manfaat.id','left');
		$this->db->join('tiger_kecamatan', 'tataruang.lokasi_id_kecamatan = tiger_kecamatan.id','left');
		$this->db->join('tiger_desa', 'tataruang.lokasi_id_desa = tiger_desa.id','left');
		$this->db->where('tataruang.id_member', $id);
		$hasil = $this->db->get();

		//$hasil=$this->db->where($where)->get('tataruang');
		return $hasil->result();
	}

	function list_member(){
		$sesi = $this->session->userdata("user");
		$sname = $sesi['username'];
		$where = "username = '$sname'";

		$hasil=$this->db->where($where)->get('member');
		return $hasil->result();
	}

	function medit_member($data){
		$hasil=$this->db->update('member', $data);
		return $hasil;
	}

	function get_arr_manfaat(){
		$this->db->order_by("manfaat");
		$res = $this->db->get("m_manfaat");
		foreach($res->result() as $row ) : 
			$arr[$row->id] = $row->manfaat." (".$row->kode_manfaat.") ";
		endforeach;
		return $arr;
	}
}