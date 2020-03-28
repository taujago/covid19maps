<?php 
class Penyuluh_controller extends CI_Controller {

	var $title; 
	var $content;
	function __construct(){
		parent::__construct();
		// cek for session 
		if(empty($this->session->userdata("login"))) {
			redirect("login");
			exit;
		}
	}


	function set_title($str){
		$this->title = $str;
	}

	function set_content($str) {
		$this->content = $str;
	}

	function render(){
		$data['userdata'] = $this->session->userdata("userdata_penyuluh");

		
		$data['subtitle'] = $this->title;
		$data['content'] = $this->content;
		$this->load->view("PenyuluhTemplate",$data);

	}

}
?>