<?php 
require_once APPPATH . 'core/Admin_controller.php';

class PenyuluhDashboard extends Penyuluh_controller {
	var $class ;

	function __construct(){
		parent::__construct();
		$this->class = strtolower(get_class($this));
		
	}

	function index(){

		$userdata = $this->session->userdata('userdata_penyuluh'); 
		// show_array($userdata);

		$id_gapoktan = $userdata['id_gapoktan'];
		$this->db->select('p.id_petani')->from('petani p');
		$this->db->join('m_poktan mp', 'mp.id_poktan=p.id_poktan');
		$this->db->join('m_gapoktan mg', 'mp.id_gapoktan=mg.id_gapoktan');
		$this->db->where('mg.id_gapoktan', $id_gapoktan);
		$res = $this->db->get();
		$data['petani'] = $res->num_rows();

		// echo $this->db->last_query();
		// exit();
		$this->db->where('id_gapoktan', $id_gapoktan);
		$res = $this->db->get("m_poktan");
		$data['poktan'] = $res->num_rows();




			$this->db->select('sum(p.pupuk_urea) as urea ,
				sum(p.pupuk_sp) as  sp36,
				sum(p.pupuk_za) as  za,
				sum(p.pupuk_npk) as  npk,
				sum(p.pupuk_organik) as  organik',null,false)
		->from("lahan_petani p");
		$this->db->join('petani pt', 'p.id_petani=pt.id_petani');
		$this->db->join('m_poktan mp', 'mp.id_poktan=pt.id_poktan');
		$this->db->join('m_gapoktan mg', 'mp.id_gapoktan=mg.id_gapoktan');
		$this->db->where('p.tahun', $userdata['tahun']);
		$this->db->where('mg.id_gapoktan', $id_gapoktan);
		$dp = $this->db->get()->row();
		$data['urea'] =  $dp->urea;
		$data['sp36'] =  $dp->sp36;
		$data['za'] =  $dp->za;
		$data['npk'] =  $dp->npk;
		$data['organik'] =  $dp->organik;


		$jenis_fisik = $this->db->select('id, jenis_data_fisik')->from('m_jenis_fisik')->get()->result_array();
		$jenis_alsintan = $this->db->select('id, jenis_alsintan')->from('m_jenis_alsintan')->get()->result_array();
		$data_sumber_dana = $this->db->select('id, sumber_dana')->from('m_sumber_dana')->get()->result_array();




		foreach ($jenis_alsintan as $key => $row) {

			foreach ($data_sumber_dana as $key1 => $value) {
				$this->db->select('da.id')->from('data_alsintan da');
				$this->db->join('m_poktan mp', 'mp.id_poktan=da.id_poktan');
				$this->db->where('da.id_jenis', $row['id']);
				$this->db->where('da.sumber_dana', $value['id']);
				$this->db->where('da.tahun', $userdata['tahun']);
				$this->db->where('mp.id_gapoktan', $userdata['id_gapoktan']);
				$jenis_alsintan[$key][$value['sumber_dana']] = $this->db->get()->num_rows();
			}

			
		}

		

		foreach ($jenis_fisik as $key => $row) {

			foreach ($data_sumber_dana as $key1 => $value) {
				$this->db->select('da.id')->from('sarana_fisik da');
				$this->db->join('m_poktan mp', 'mp.id_poktan=da.id_poktan');
				$this->db->where('da.id_jenis', $row['id']);
				$this->db->where('da.sumber_dana', $value['id']);
				$this->db->where('da.tahun', $userdata['tahun']);
				$this->db->where('mp.id_gapoktan', $userdata['id_gapoktan']);
				$jenis_fisik[$key][$value['sumber_dana']] = $this->db->get()->num_rows();
			}

			
		}
		$data['table']['data'] = $jenis_fisik;
		$data['table']['colspan'] = $this->db->select('id, sumber_dana')->from('m_sumber_dana')->get()->num_rows();
		$data['table']['header'] = $data_sumber_dana;

		$data['table2']['data'] = $jenis_alsintan;
		
 		$data['class'] =  $this->class;
		$content = $this->load->view("PenyuluhDashboardView",$data,true); 
		$this->set_title("DASHBOARD");
		$this->set_content($content);
		$this->render();
		 

	}
}


?>