<?php 
class Frontpage extends CI_Controller{
	function __construct(){
		parent::__construct();
        $this->load->model("Core_model","cm");
	}

	function index()
	{
		$this->db->select('*');
		$this->db->from('sebaran');
		$this->db->join('tiger_kecamatan', 'tiger_kecamatan.id = sebaran.id_kecamatan', 'left');
		$db = $this->db->get()->result_array();

		$isi = [];

		foreach ($db as $row):
    		$features = unserialize($row['kordinat']);
    		if (!empty($features)) {
    			
    			if ($row['positif']) {
    				$color = '#FF0000';
    			}
    			elseif ($row['positif'] == 0 && $row['pdp'] > 0) {
    				$color = '#FFFF00';
    			}
    			else{
    				$color = '#00FF00';
    			}

    			$features->properties->color = $color;
    			$features->properties->kec = $row['kecamatan'];
    			$features->properties->odp = $row['odp'].' Orang';
    			$features->properties->pdp = $row['pdp'].' Orang';
    			$features->properties->positif = $row['positif'].' Orang';
    			$features->properties->mati = $row['mati'].' Orang';

	    		$isi[] = $features;
    		}
    		
    	endforeach;

    	$arr = array(
    		'type' => 'FeatureCollection',
    		'features' => $isi
    	);

    	//show_array($arr); exit();

		$arr = json_encode($arr, JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK);
		$this->session->set_userdata("data_peta",$arr);


        $waktu=$this->db->get("waktu_update")->row();
        $data['waktu'] = flipdate($waktu->tanggal);


        $data['record'] = $this->cm->get_data_table();



		$data['geojson'] = site_url('frontpage/geojson');

		$this->load->view('peta/peta_view', $data);

	}

    function geojson(){
        $data = $this->session->userdata('data_peta');
        echo $data;
    }
}
?>