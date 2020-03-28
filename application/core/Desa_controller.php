<?php 
class Desa_controller extends CI_Controller {

	var $title; 
	var $content;
	function __construct(){
		parent::__construct();
		// cek for session 
		 
	}


	function set_title($str){
		$this->title = $str;
	}

	function set_content($str) {
		$this->content = $str;
	}

	function render(){
		$data['userdata'] = $this->session->userdata("userdata_desa");

		// $data['userdata']['level2'] = ($data['userdata']['level']==0)?"Administrator":"Operator";
		
		$data['subtitle'] = $this->title;
		$data['content'] = $this->content;
		$this->load->view("template_desa",$data);

	}

}
?>