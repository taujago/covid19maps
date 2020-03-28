<?php 
require_once APPPATH . 'core/Admin_controller.php';

class Peta extends Admin_controller {

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


	function tabel(){
		$data['table']['data'] = [];
		$data['table']['colspan'] = 0;
		$data['table']['header'] =[];
		$data['table2']['data'] =[];
		$data['class'] =  '';
		// show_array($data);
		// exit();	

		$data['arr_kec'] = $this->db->order_by('kecamatan', 'asc')->get('tiger_kecamatan')->result_array();
		$content = $this->load->view("peta/kecamatan",$data,true); 
		$this->set_title("PETA");
		$this->set_content($content);
		$this->render();
	}

	function form_peta($id = null){
		$data['arr_kec'] = $this->cm->arr_dropdown('tiger_kecamatan','id','kecamatan','kecamatan');
		$data['table']['data'] = [];
		$data['table']['colspan'] = 0;
		$data['table']['header'] =[];

		$data['table2']['data'] =[];
		$data['class'] =  '';
		// show_array($data);
		// exit();	

		$kec = $this->db->where('id', $id)->get('tiger_kecamatan')->row_array();
		if ($kec > 0) {
			$db = unserialize($kec['kordinat']);
			//show_array($db); exit();

			if (!empty($db)) {
				foreach ($db->geometry->coordinates as $key => $value) {
	                foreach ($value as $key1 => $value1) {
	                    foreach ($value1 as $value1) {
	                        $koordinat[] = $value1[1].','.$value1[0];
	                    }
	                    $_koordinat = $koordinat[0];
	                    array_pop($koordinat);
	                    $koordinat = implode("\n", $koordinat);
	                }
	            }
			}
			else{
				$koordinat = '';
			}

            $data['koordinat'] = $koordinat;
            $data['id'] = $id;
	        $data['koor'] = isset($_koordinat) ? $_koordinat : '';
		}

		//show_array($data); exit();

		$content = $this->load->view("peta/koordinat_form",$data,true); 
		$this->set_title("PETA");
		$this->set_content($content);
		$this->render();
	}

	function simpan(){
		$post = $this->input->post();


		$id = $post['id'];
		$cek = $this->db->where('id', $id)->get('tiger_kecamatan')->row_array();

		$koordinat = explode("\n",$post['koordinat']);
		$koordinat[] = reset($koordinat);
		$koordinat = array_filter($koordinat);
		
		foreach ($koordinat as $value) {
			$value = explode(',', $value);
			$koor[] = array(rtrim($value[1]),rtrim($value[0]));
		}

		$arr_koor = array(array($koor));
		$arr_pro = [];

		$post['kordinat'] = array(
			'type' => 'Feature',
			'properties' => $arr_pro,
			'geometry' => array(
				'type' => 'MultiPolygon',
				'coordinates' => $arr_koor
			)
		);

		$post['kordinat'] = json_encode($post['kordinat'], JSON_NUMERIC_CHECK);
		$post['kordinat'] = json_decode($post['kordinat']);
		$post['kordinat'] = serialize($post['kordinat']);
		unset($post['koordinat']);

		//show_array($post); exit();

		if ($cek > 0) {
        	$this->db->where('id', $id)->update('tiger_kecamatan', $post);
        	$hasil = array("error"=>false,'message'=>"Data Berhasil Diupdate");
        }
        else{
        	$this->db->insert('tiger_kecamatan', $post);
        	$hasil = array("error"=>false,'message'=>"Data Berhasil Disimpan");
        }
        
        echo json_encode($hasil);
	}

	function lihat(){
		$data['geojson'] = site_url('peta/geojson');
		$this->load->view('peta/peta_view', $data);
	}

	function get_koordinat(){
		$get = $this->input->get('k');
		$data['koor'] = '-8.755284,116.859526' ;

		if (isset($get['k'])) {
			if ($get['k'] != '') {
				$data['koor'] = $get['k'];
			}
		}
		$this->load->view('peta/peta_map', $data);
	}

	function geojson(){
		$data = $this->session->userdata('data_peta');
		echo $data;
	}

	function set_geojson(){
		$post = $this->input->post();

		$type = 'MultiPolygon';
		$koor = explode("\n", $post['koordinat']);
		if ($type == 'MultiPolygon') {
			$koor[] = reset($koor);
		}
		$koor = array_filter($koor);

		$properties = ['color' => '#FFFFF']; 

		foreach ($koor as $value) {
			$value = explode(',', $value);
			$data[] = array($value[1],$value[0]);
		}
		if ($type == 'MultiPolygon') {
			$koordinat = array(array($data));
		}
		else{
			$koordinat = $data;
		}

		$data = array(
			'type' => 'FeatureCollection',
			'features' => array(array(
				'type' => 'Feature',
				'properties' => $properties,
				'geometry' => array(
					'type' => $type,
					'coordinates' => $koordinat
				)
			)),
		);

		echo json_encode(array());

		$data = json_encode($data, JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK);
		$this->session->set_userdata("data_peta",$data);
	}


	function get_koor(){
        $get = $this->input->get();

        $arr = array();

        if (isset($get['id'])) {
        	$get = $get['id'];
        	$get = explode(',', $get);
        	//show_array($get); exit();
        	$arr_j = array_filter($get,function($var){return(strpos($var,'j_') !== FALSE);});
	        $arr_i = array_filter($get,function($var){return(strpos($var,'i_') !== FALSE);});

	        $jenis_id = str_replace('j_', '', $arr_j);
	        $lokasi_id = str_replace('i_', '', $arr_i);

	        if (count($jenis_id) > 0) {
	        	foreach ($jenis_id as $jenis_id) :
	        		$db = $this->db->where('lokasi_jenis', $jenis_id)->get('lokasi')->result_array();
		        	$m = $this->db->where('id', $jenis_id)->get('master')->row_array();

		        	$isi = array();
					foreach ($db as $row):
		        		$features = unserialize($row['lokasi_data']);
		        		$features->properties->master_id = $row['lokasi_master'];
		        		$features->properties->lokasi_id = $row['lokasi_id'];
		        		$features->properties->color = $m['master_warna'];
			        	$features->properties->jenis = $m['master_nama'];
			        	//unset($features->properties);
		        		$isi[] = $features;
		        	endforeach;

		        	$arr = array(
		        		'type' => 'FeatureCollection',
		        		'features' => $isi
		        	);

	        	endforeach;
	        }

	        if (count($lokasi_id) > 0) {
	        	foreach ($lokasi_id as $lokasi_id) :
	        		$lokasi = $this->db->where('lokasi_id', $lokasi_id)->get('lokasi')->result_array();
	        		foreach ($lokasi as $row) :
	        			$m = $this->db->where('id', $row['lokasi_jenis'])->get('master')->row_array();
			        	$features = unserialize($row['lokasi_data']);
			        	$features->properties->color = $m['master_warna'];
			        	$features->properties->jenis = $m['master_nama'];
			        	$features->properties->master_id = $row['lokasi_master'];
		        		$features->properties->lokasi_id = $row['lokasi_id'];
		        		//unset($features->properties);
			        	$isi[] = $features;

			        	$arr = array(
			        		'type' => 'FeatureCollection',
			        		'features' => $isi
			        	);
	        		endforeach;
	        	endforeach;
	        }
        }

        return $arr;
	}


}

/* End of file Peta.php */
/* Location: ./application/controllers/Peta.php */