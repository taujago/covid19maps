<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	
		$this->load->model('M_welcome');
		$this->load->model("Tataruang_model","dm");
		$this->load->model("Core_model","cm");
	}

	public function index()
	{
		$data=array(
			"title"=>"Home",
			"content"=>"home/index.php",
			"aktif"=>"home",
		);
		$this->load->view('depan/template',$data);
	}

	public function u_profil()
	{
		no_access();
		$user = $this->input->get('user');
		$where = "username = '$user'";

		$data=array(
			"title"=>"Profil Member",
			"content"=>"home/profil.php",
			"table"=>$this->db->where($where)->get('member'),
			"aktif"=>"nama",
		);
		$this->load->view('depan/template',$data);
	}

// ======== CONTROLLER TATA RUANG ==============
	public function d_permohonan()
	{
		no_access();
		$arr_kecamatan= $this->cm->arr_dropdown("tiger_kecamatan","id","kecamatan","kecamatan");
		$s = $this->session->userdata('user');
		$data=array(
			"title"=>"Tambah Permohonan Baru",
			"content"=>"home/form_permohonan.php",
			"aktif"=>"nama",
			"arr_kecamatan"=>$this->cm->add_arr_head($arr_kecamatan,'','- PILIH KECAMATAN -'),
			"arr_manfaat"=>$this->M_welcome->get_arr_manfaat(),
			"action"=>"save",
			"mode"=>"N",
			"id_member"=>$s['id_member'],
		);
		$this->load->view('depan/template',$data);
	}

	public function get_data_desa($id){
		$post = $this->input->post();
		$id_desa = isset($post['lokasi_id_desa'])?$post['lokasi_id_desa']:"";
		$this->db->where("id_kecamatan",$id);
		$this->db->order_by("desa");
		$res = $this->db->get("tiger_desa");
		$html="";
		$sel = "";
		foreach($res->result() as $row): 
			$sel = ($row->id == $id_desa)?"selected":"";
			$html.="<option value=$row->id $sel>$row->desa</option>";
		endforeach;
		echo $html;
	}
	

// ======== CONTROLLER MEMBER ==============
	public function data_member(){
		no_access();
		$data=$this->M_welcome->list_member();
		echo json_encode($data);
	}

	public function simpan_member(){
		no_access();
		$user = $this->input->post('username');
		$email = $this->input->post('email');
		$cek=$this->db->query("SELECT * FROM member WHERE username='$user'")->num_rows();
		$cekemail=$this->db->query("SELECT * FROM member WHERE email='$email'")->num_rows();

		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		if($this->form_validation->run()==FALSE){
			$ket = array("error"=>true,'message'=>"Mohon isi data dengan benar");
		}

		elseif($cek>0 || $cekemail > 0){
			$ket = array("error"=>true,'message'=>"Username/Email Sudah Terdaftar");
		}
		else{
			$data = array(
				"username"=>$user,
				"email"=>$this->input->post('email'),
				"password"=>md5($user),
				"nama"=>$this->input->post('nama'),
				"level"=>$this->input->post('level'),
			);
			$this->M_welcome->simpan_pengguna($data);
			$ket = array("error"=>false,'message'=>"Data Berhasil Disimpan");
		}
		echo json_encode($ket);
	}

	public function edit_member()
	{
		no_access();
		$user = $this->input->post('username');
		$pl = $this->input->post('passlama');
		$ps = $this->input->post('password');
		$kps = $this->input->post('kpassbaru');
		$where = "username = '$user'";

		$cek = $this->db->where($where)->get('member')->row_array();

		$this->form_validation->set_rules('nama', 'nama', 'required');
		if($this->form_validation->run()==FALSE){
			$ket = array("error"=>true,'message'=>"Nama Tidak Boleh Kosong");
		}

		if(empty($pl) && empty($ps) && empty($kps)){
			$data = array(
				"nama"=>$this->input->post('nama'),
				"no_hp"=>$this->input->post('no_hp'),
			);
			$this->db->where('username',$user);
			$this->M_welcome->medit_member($data);
			$ket = array("error"=>false,'message'=>"Data Berhasil Disimpan");
		}

		elseif(md5($pl) == $cek['password'])
		{
			if(strlen($ps) >= 5)
			{
				if($ps == $kps)
				{
					$data = array(
						"password"=>md5($ps),
						"nama"=>$this->input->post('nama'),
						"no_hp"=>$this->input->post('no_hp'),
					);
					$this->db->where('username',$user);
					$this->M_welcome->medit_member($data);
					$ket = array("error"=>false,'message'=>"Data Berhasil Disimpan");
				}
				else{$ket = array("error"=>true,'message'=>"Konfirmasi password tidak cocok");}
			}
			else{$ket = array("error"=>true,'message'=>"Minimal password baru adalah 5 karakter");}
		}
		else{$ket = array("error"=>true,'message'=>"Password lama tidak cocok");}

		


		echo json_encode($ket);
	}


// ======== CONTROLLER LOGIN ==============
	public function u_login()
	{
		in_access();
		$hash = md5(microtime()) ;
		$this->session->set_userdata("hash",$hash);

		$data=array(
			"title"=>"Login / Daftar Member",
			"content"=>"home/u_login.php",
			"aktif"=>"u_login",
			"hash"=>$hash,
		);
		$this->load->view('depan/template',$data);
	}

	public function ceklogin(){
		$post = $this->input->post();
		extract($post);
		$hash = $this->session->userdata('hash');
		$this->db->where("username",$username);
		$this->db->where("md5(concat(password,'$hash')) =  '$secret'  ",null,false);

		$res = $this->db->get("member");

		if($res->num_rows() > 0 ) {
			$row = $res->row_array();
			unset($row['passsword']);
			$this->session->set_userdata("user",$row);
			$ret = array("error"=>false,'message'=>"Login berhasil");
		}
		else {
			$ret = array("error"=>true,'message'=>"Login gagal");
		}
		echo json_encode($ret);
	}

	public function logout(){
		$this->session->unset_userdata("user");
		redirect();
	}

// ======== CONTROLLER PERMOHONAN ==============
	public function simpan_pesan(){
		no_access();
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('isi', 'isi', 'required');

		if($this->form_validation->run()==FALSE){
			$ket = array("error"=>true,'message'=>"Mohon isi data dengan benar");
		}else{
			$data = array(
				"nama"=>$this->input->post('nama'),
				"email"=>$this->input->post('email'),
				"isi_pesan"=>$this->input->post('isi'),
			);
			$this->M_welcome->simpan_pesan($data);
			$ket = array("error"=>false,'message'=>"Data Berhasil Disimpan");
		}
		echo json_encode($ket);
	}

	public function data_pemohon(){
		no_access();
		$data=$this->M_welcome->list_pemohon();
		echo json_encode($data);
	}

// ============= CONTROLLER TATA RUANG ============

	public function tataruang()
	{
		$data=array(
			"title"=>"Profil Member",
			"content"=>"home/d_tataruang.php",
			"aktif"=>"tataruang",
		);
		$this->load->view('depan/template',$data);
	}
}
