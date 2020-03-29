<?php 
class Admin_controller extends CI_Controller {

	var $title; 
	var $content;
	function __construct(){
		parent::__construct();
		$sesi = $this->session->userdata('user_covid');

		if(empty($sesi)) {
			redirect('login');
			exit();
		}

	}


	function set_title($str){
		$this->title = $str;
	}

	function set_content($str) {
		$this->content = $str;
	}

	function render(){
		$data['userdata'] = $this->session->userdata("user_covid");

		//show_array($data); exit();

		$data['userdata']['level2'] = ($data['userdata']['level']==0)?"Administrator":"Operator";
		$data['subtitle'] = $this->title;
		$data['content'] = $this->content;
		$this->load->view("template2",$data);

	}

}
?>