<?php 
class Frontpage extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Core_model', 'cm');
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

    			$features->properties['color'] = $color;
    			$features->properties['Kecamatan'] = $row['kecamatan'];
    			$features->properties['Orang Dalam Pengawasan (ODP)'] = $row['odp'].' Orang';
    			$features->properties['Pasien Dalam Pantauan (PDP)'] = $row['pdp'].' Orang';
    			$features->properties['Positif'] = $row['positif'].' Orang';
    			$features->properties['Meninggal'] = $row['mati'].' Orang';

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

		$data['geojson'] = site_url('peta/geojson');

		$this->load->view('peta/peta_view', $data);



	}
}
?>