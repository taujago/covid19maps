<?php 
class Tataruang extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index(){
		$data['recpemohon'] = $this->db->get("pemohon");
		$this->load->view("Peta_view_index",$data,false);

		

	}
}

?>