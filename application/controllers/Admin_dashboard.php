<?php 
class Admin_dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();


	}



	function index(){
		// $content = ""; //$this->load->view($controller."_view",$data_array,true);

		// $this->set_subtitle("DATA SAMSAT");
		// $this->set_title("DATA SAMSAT");
		// $this->set_content($content);
		// $this->render();

		$data['subtitle'] = "Administrator Dashboard";
		$data['content'] = $this->load->view("index_admin",array(),true);

		$this->load->view("template/backend",$data);
	}
}
?>