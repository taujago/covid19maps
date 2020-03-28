<?php 
require_once APPPATH . 'core/Desa_controller.php';

class Sebaran extends Desa_controller {
	var $class ;

	function __construct(){
		parent::__construct();
			$this->class = get_class($this); 
      $this->load->helper("array");
			$this->load->model("Core_model","cm");
			$this->load->model($this->class."Model","dm");
	}


function index(){

   
  $data = array();

   
  $data['arr_kecamatan'] = $this->dm->get_data_kecamatan();

  $data['class'] =  $this->class;

  // $data['arr_komoditas'] = $this->db->get('m_komoditas')->result_array();

  $content = $this->load->view("$this->class"."View",$data,true); 
  $this->set_title("Input data luas panen");
  $this->set_content($content);
  $this->render();
}

	 

function simpan(){
  $post = $this->input->post(); 
  // show_array($post);
  foreach($post['id_kecamatan'] as $id_kecamatan) : 

    $arr_input = array("id_kecamatan"=>$id_kecamatan,
                       "odp"        => $post['odp'][$id_kecamatan],
                       "pdp"        => $post['pdp'][$id_kecamatan],
                       "positif"        => $post['positif'][$id_kecamatan]

                     );

    $this->db->where("id_kecamatan",$id_kecamatan); 
    $this->db->delete("sebaran");

    $this->db->insert("sebaran",$arr_input);



  endforeach;

}


function query(){
 

}
 
}

?>