<?php 
require_once APPPATH . 'core/Admin_controller.php';

class Admin extends Admin_controller {
	var $class ;

	function __construct(){
		parent::__construct();
			$this->class = strtolower(get_class($this)); 
	}

	function index(){


		// jumlah petani 
		
		$res = $this->db->get("petani");
		$data['petani'] = $res->num_rows();

		$res = $this->db->get("m_poktan");
		$data['poktan'] = $res->num_rows();

		$res = $this->db->get("m_gapoktan");
		$data['gapoktan'] = $res->num_rows();

		$res = $this->db->get("m_pengecer");
		$data['pengecer'] = $res->num_rows();

		// konsumsi pupuk 


		$userdata = $this->session->userdata('userdata');
		
		
		
		$this->db->select('sum(pupuk_urea) as urea ,
				sum(pupuk_sp) as  sp36,
				sum(pupuk_za) as  za,
				sum(pupuk_npk) as  npk,
				sum(pupuk_organik) as  organik',null,false)
		->from("lahan_petani");
		$this->db->where('tahun', $userdata['tahun']);

		$dp = $this->db->get()->row();
		$data['urea'] =  $dp->urea;
		$data['sp36'] =  $dp->sp36;
		$data['za'] =  $dp->za;
		$data['npk'] =  $dp->npk;
		$data['organik'] =  $dp->organik;

		

		$jenis_fisik = $this->db->select('id, jenis_data_fisik')->from('m_jenis_fisik')->get()->result_array();
		$jenis_alsintan = $this->db->select('id, jenis_alsintan')->from('m_jenis_alsintan')->get()->result_array();
		$data_sumber_dana = $this->db->select('id, sumber_dana')->from('m_sumber_dana')->get()->result_array();
		// show_array($jenis_fisik);



		foreach ($jenis_alsintan as $key => $row) {

			foreach ($data_sumber_dana as $key1 => $value) {
				$this->db->where('id_jenis', $row['id']);
				$this->db->where('sumber_dana', $value['id']);
				$this->db->where('tahun', $userdata['tahun']);
				$jenis_alsintan[$key][$value['sumber_dana']] = $this->db->get('data_alsintan')->num_rows();
			}

			// $this->db->select('m_jenis_fisik.jenis_data_fisik, count(sarana_fisik.id)', null, false)->from('m_jenis_fisik');
			// $this->db->join('sarana_fisik', 'sarana_fisik.id_jenis=m_jenis_fisik.id', 'LEFT');
			// $this->db->where('sarana_fisik.sumber_dana', $row['id']);
			// $this->db->where('sarana_fisik.tahun', $userdata['tahun']);
			// $data['table'][$row['sumber_dana']] = $this->db->get()->row_array(); 
			// echo $this->db->last_query();
			// echo '<br/>';
		}

		

		foreach ($jenis_fisik as $key => $row) {

			foreach ($data_sumber_dana as $key1 => $value) {
				$this->db->where('id_jenis', $row['id']);
				$this->db->where('sumber_dana', $value['id']);
				$this->db->where('tahun', $userdata['tahun']);
				$jenis_fisik[$key][$value['sumber_dana']] = $this->db->get('sarana_fisik')->num_rows();
			}

			// $this->db->select('m_jenis_fisik.jenis_data_fisik, count(sarana_fisik.id)', null, false)->from('m_jenis_fisik');
			// $this->db->join('sarana_fisik', 'sarana_fisik.id_jenis=m_jenis_fisik.id', 'LEFT');
			// $this->db->where('sarana_fisik.sumber_dana', $row['id']);
			// $this->db->where('sarana_fisik.tahun', $userdata['tahun']);
			// $data['table'][$row['sumber_dana']] = $this->db->get()->row_array(); 
			// echo $this->db->last_query();
			// echo '<br/>';
		}
		$data['table']['data'] = $jenis_fisik;
		$data['table']['colspan'] = $this->db->select('id, sumber_dana')->from('m_sumber_dana')->get()->num_rows();
		$data['table']['header'] = $data_sumber_dana;

		$data['table2']['data'] = $jenis_alsintan;
		// show_array($data);
		// exit();	

 		$data['class'] =  $this->class;
		$content = $this->load->view("admin/index_admin_view",$data,true); 
		$this->set_title("DASHBOARD");
		$this->set_content($content);
		$this->render();
		 

	}
}


?>