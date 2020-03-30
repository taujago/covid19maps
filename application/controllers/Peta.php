<?php 
require_once APPPATH . 'core/Admin_controller.php';

class Peta extends Admin_controller {

	function __construct(){
		parent::__construct();
	}

	function index(){
		redirect();
	}

	function import(){
		redirect();

    	$file = base_url('uploads/batas_ksb.geojson');
    	$data = file_get_contents($file);
        $data = json_decode($data);

        if (count($data->features) > 0) {
        	$n=0; foreach ($data->features as $key => $value) : $n++;
        		$kec = strtoupper(str_replace('Kec. ', '', $value->properties->Kecamatan));

        		$value->properties = (object)[];
        		$post['kordinat'] = serialize($value);

        		$this->db->where('kecamatan', $kec)->update('tiger_kecamatan', $post);

	        endforeach;
        }
        else{
        	return false;
        }
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
	                	$koordinat[] = $value1[1].','.$value1[0];
	                }
	                $_koordinat = $koordinat[0];
	                array_pop($koordinat);
	                $koordinat = implode("\n", $koordinat);
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

		$arr_koor = array($koor);
		$arr_pro = (object)[];

		$post['kordinat'] = array(
			'type' => 'Feature',
			'properties' => $arr_pro,
			'geometry' => array(
				'type' => 'Polygon',
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

		$type = 'Polygon';
		$koor = explode("\n", $post['koordinat']);
		if ($type == 'Polygon') {
			$koor[] = reset($koor);
		}
		$koor = array_filter($koor);

		$properties = ['color' => '#FFFFF']; 

		foreach ($koor as $value) {
			$value = explode(',', $value);
			$data[] = array($value[1],$value[0]);
		}
		if ($type == 'Polygon') {
			$koordinat = array($data);
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

}

/* End of file Peta.php */
/* Location: ./application/controllers/Peta.php */