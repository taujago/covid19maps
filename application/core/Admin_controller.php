<?php 
class Admin_controller extends CI_Controller {

	var $title; 
	var $content;
	function __construct(){
		parent::__construct();
		// cek for session 
		// echo $this->session->userdata("login");
		// if($this->session->userdata("login") <> true ) {
		// 	// echo 'fuck';
			
		// 	redirect("login");
		// 	exit;
		// }


		// $userdata = $this->session->userdata("userdata");

		// 	if ($userdata['level']!=1) {
		// 		redirect("login");
		// 		exit;
				
		// 	}



	}


	function set_title($str){
		$this->title = $str;
	}

	function set_content($str) {
		$this->content = $str;
	}

	function render(){
		$data['userdata'] = $this->session->userdata("userdata");

		// $data['userdata']['level2'] = ($data['userdata']['level']==0)?"Administrator":"Operator";
		
		$data['subtitle'] = $this->title;
		$data['content'] = $this->content;
		$this->load->view("template2",$data);

	}

}
?>