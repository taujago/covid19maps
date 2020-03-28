<?php 
class Login extends CI_Controller {
	function __construct() {
		parent::__construct();

	}


	function index(){

		$hash = md5(microtime()) ;

		//echo $hash; exit;
		$this->session->set_userdata("hash",$hash);
		$data['hash'] = $hash;
		$this->load->view("admin/newlogin",$data);

		// $this->load->view("admin/login_view",$data);
	}



		function ceklogin(){

		$post = $this->input->post();
		extract($post);

		$hash = $this->session->userdata('hash');
		$this->db->where("username",$username);
		$this->db->where("md5(concat(password,'$hash')) =  '$secret'  ",null,false);
		$res = $this->db->get("pengguna");


		if($res->num_rows() > 0 ) {

			$userdata = $res->row_array();

			if ($userdata['level']==1) {
				$userdata['tahun'] = $post['tahun'];
				unset($userdata['passsword']);
				$this->session->set_userdata("userdata",$userdata);
				$this->session->set_userdata("login",true);
				$ret = array("error"=>false,'message'=>"Login berhasil", "url" => site_url('Admin'));
			}else if($userdata['level']==2){
				$userdata['tahun'] = $post['tahun'];
				unset($userdata['passsword']);
				$this->session->set_userdata("userdata",$userdata);
				$this->session->set_userdata("login",true);
				$ret = array("error"=>false,'message'=>"Login berhasil", "url" => site_url('AdminKec'));
			}else if($userdata['level']==3){
				$userdata['tahun'] = $post['tahun'];
				unset($userdata['passsword']);
				$this->session->set_userdata("userdata",$userdata);
				$this->session->set_userdata("login",true);
				$ret = array("error"=>false,'message'=>"Login berhasil", "url" => site_url('AdminDesa'));
			}else{
				$ret = array("error"=>true,'message'=>"Login Gagal");
			}

			
		}
		else {
				$ret = array("error"=>true,'message'=>"Username atau Password Salah");
			
			}
		

		echo json_encode($ret);
	}

	public function logout()
	{
		$this->session->unset_userdata("userdata");
		$this->session->set_userdata("login");
		redirect("login");
	}

	public function logout_kecamatan()
	{
		$this->session->unset_userdata("userdata");
		$this->session->set_userdata("login");
		redirect("login");
	}

	// function logout(){
	// 	$this->session->unset_userdata("login");
	// 	redirect("login");
	// }
}

?>