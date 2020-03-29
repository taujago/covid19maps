<?php 
class Login extends CI_Controller {
	function __construct(){
        parent::__construct();
        
    }

	function index(){
		if ($this->session->userdata('user_covid')) {
        	redirect('sebaran');
        	exit();
        }
        
		$this->load->view('login', []);	
	}

	function cek_login(){
		
		$post = $this->input->post();
		if (empty($post)) {
			$ket = array("error"=>true,'message'=>"Login Gagal");
		}

		$db = $this->db->where('username', $post['username'])->get('user')->row_array();

		if(password_verify($post['password'], $db['password'])){
			unset($db['password']);
			$this->session->set_userdata("user_covid",$db);
			$ket = array("error"=>false,'message'=>"Login berhasil");
		}else{
			$ket = array("error"=>true,'message'=>"Login Gagal");
		}
		echo json_encode($ket);
	}

	function logout()
    {
        $this->session->unset_userdata("user_covid");
        redirect();
    }

}

?>