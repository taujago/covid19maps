<?php
class Master_controller extends CI_Controller {

// var $pilihan; 
	function __construct() {
		parent::__construct();  

		// if($this->session->userdata('login') == false ) {
		// 	redirect('login/');
		// } 
		
	 
		// sleep(1);

		// $userlogin = $this->session->userdata("userlogin");
		// if($userlogin==false) {
		// 	redirect("login");
		// }
		
	}

	function set_content($str) {
		$this->content['content'] = $str; 
	}
	
	function set_title($str) {
		$this->content['title'] = $str;
	}
	
	function set_subtitle($str) {
		$this->content['subtitle'] = $str;
	}
	
	function render(){
		$arr = array();		 
		$this->load->view("template",$this->content );
		
	}


	  

}

?>
