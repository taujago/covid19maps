<?php 
require_once APPPATH . 'core/Admin_controller.php';
class Admin_permohonan extends Admin_controller {
	function __construct() {
		parent::__construct();
		// $this->load->helper("array");
		$this->load->model("Tataruang_model","dm");
		$this->load->model("Core_model","cm");
	}

	function index(){

		// $data['subtitle'] = "Data Permohonan";
		// $data['content'] = $this->load->view("admin/admin_permohonan",array(),true);

		// $this->load->view("template/backend",$data);


		$content =  $this->load->view("admin/admin_permohonan",array(),true);
		$this->set_title("Data Permohonan");
		$this->set_content($content);
		$this->render();






	}

	function baru(){
		 
		$arr_kecamatan= $this->cm->arr_dropdown("tiger_kecamatan","id","kecamatan","kecamatan");

		 $data['arr_kecamatan'] = $this->cm->add_arr_head($arr_kecamatan,'','- PILIH KECAMATAN -');

		 $data['action'] = 'save';
		 $data['mode'] = 'N';
		 $data['arr_manfaat'] = $this->get_arr_manfaat();

		$content =  $this->load->view("admin/admin_tataruang_form",$data,true);
		$this->set_title("Tambah Data Permohonan");
		$this->set_content($content);
		$this->render();
	}


	function simpan() {
		$post = $this->input->post();

		// show_array($post);

		$koordinat = explode("\n",$post['koordinat']); 
		// show_array($koordinat);

		$this->db->insert("pemohon",array("nama"=>$post['nama']));

		$id = $this->db->insert_id();

		foreach($koordinat as $kord) : 

			if($kord =="") continue;

			$pos = explode(",",$kord);

			$arr_ko = array("x"=>$pos[0],"y"=>$pos[1],"id_pemohon"=>$id);

			$this->db->insert("kordinat",$arr_ko);

		endforeach;

		$ret = array("error"=>false,"pesan"=>"Data berhasil disimpan");
		echo json_encode($ret);

	}

	function get_data(){

		$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:"daft_id"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  

        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null 
		);     
           
        $row = $this->dm->get_data($req_param)->result_array();
		
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->get_data($req_param)->result_array();
        $n = $start;

        $arr_status = array(0=>"Sedang proses","Disetujui","Ditolak");

        foreach($result as $row) : 
        	$n++;


        	if($row['proses']==0){
        		$class="badge-info";
        	}
        	else if($row['proses']==1){
        		$class="badge-success";
        	}
        	else {
        		$class="badge-danger";
        	}

        	$arr_data[] = array(
        			$row['tanggal'], 
        			$row['pemohon_nama'],
        			$row['pemohon_alamat'],
        			$row['manfaat'],
        			$row['lokasi_alamat']."<br />Desa :  ".$row['desa']."<br />Kecamatan :  ".$row['kecamatan'],

        			"<span class=\"badge $class\">".$arr_status[$row['proses']]."</span><br/>".
        			"<a href=\"".site_url("admin_permohonan/edit/".$row['id'])."\"><span class='text-warning'><i class='fa fa-print'></i> Edit</span></a>".
        			" <a href=\"".site_url("admin_permohonan/cetak/".$row['id'])."\"><span class='text-primary'><i class='fa fa-print'></i> Cetak</span></a>"

        	);
        endforeach;

         $responce = array('draw' => $draw, // ($start==0)?1:$start,
        				  'recordsTotal' => $count, 
        				  'recordsFiltered' => $count,
        				  'data'=>$arr_data
        	);
         
        echo json_encode($responce); 
	}


	function get_data_desa($id){

		$post = $this->input->post();

		$id_desa = isset($post['lokasi_id_desa'])?$post['lokasi_id_desa']:"";

		$this->db->where("id_kecamatan",$id);
		$this->db->order_by("desa");
		$res = $this->db->get("tiger_desa");
		$html="";
		$sel = "";
		foreach($res->result() as $row): 
			$sel = ($row->id == $id_desa)?"selected":"";
			$html.="<option value=$row->id $sel>$row->desa</option>";
		endforeach;
		echo $html;

	}

	function get_arr_manfaat(){
		$this->db->order_by("manfaat");
		$res = $this->db->get("m_manfaat");
		foreach($res->result() as $row ) : 
			$arr[$row->id] = $row->manfaat." (".$row->kode_manfaat.") ";
		endforeach;
		return $arr;
	}


	function save(){

		// sleep(2);

		$post = $this->input->post();

		// show_array($post);
		// show_array($_FILES);

		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|pdf|docx|txt';
        $config['max_size']             = 1024;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);
        if($this->upload->do_upload('lampiran')){

        	$data =   $this->upload->data();
        	// show_array($data);
        	$post['lampiran'] = $data['file_name'];
        }



         $this->load->library('form_validation');

         $this->form_validation->set_rules('dokumen_jenis', 'Jenis dokumen', 'required');
         $this->form_validation->set_rules('pemohon_nama', 'Nama pemohon', 'required');

         $this->form_validation->set_message('required', '{field} harus diisi');
         $this->form_validation->set_error_delimiters('', '');


         if ($this->form_validation->run() == TRUE)

         { 


        $koordinat = $post['koordinat'];

        unset($post['koordinat']);

      


        if($post['dokumen_jenis']=="shm"){
        	unset($post['sporadik_register_no']);
        	unset($post['sporadik_register_tgl']);
        	unset($post['sporadik_luas']);
        	unset($post['sporadik_lainnya']); 			
			
        }
        else {
			unset($post['shm_nomor']);
        	unset($post['shm_nama_pemilik']);
        	unset($post['shm_luas']);
        	unset($post['shm_lainnya']); 
        }

       	

       	if(empty($post['ijin_surat_tgl'])){
       		unset($post['ijin_surat_tgl']);
       	}
       	else {
       		$post['ijin_surat_tgl'] = flipdate($post['ijin_surat_tgl']);
       	}

   		if(empty($post['sporadik_register_tgl'])){
       		unset($post['sporadik_register_tgl']);
       	}
       	else {
       		$post['sporadik_register_tgl'] = flipdate($post['sporadik_register_tgl']);
       	}








       	$post['proses'] = 1;
       	$post['tanggal'] = date("Y-m-d h:i:s");
       	$res = $this->db->insert("tataruang",$post);
       	$id = $this->db->insert_id();










       	if($res){
       		$koordinat = str_replace(" ","",$koordinat);
	       	$koordinat = explode("\n",$koordinat); 

			 

			foreach($koordinat as $kord) : 

				if($kord =="") continue;

				$pos = explode(",",$kord);

				$arr_ko = array("x"=>$pos[0],"y"=>$pos[1],"id_tataruang"=>$id);

				$this->db->insert("kordinat",$arr_ko);

			endforeach;

       	}


       	
       	// echo "id". $id;

       	if($res){
       		$ret = array("error"=>false,"message"=>"Data berhasil disimpan");

       	}
       	else {
       		$ret = array("error"=>true,"message"=>"Data gagal disimpan");
       	}

       } // end of validation true 
       else {
       	 	$ret = array("error"=>true,"message"=>validation_errors());
       }

       	echo json_encode($ret);



	}


function edit($id){

		$this->db->where("id",$id);
		$data = $this->db->get("tataruang")->row_array();

		$data['ijin_surat_tgl'] = flipdate($data['ijin_surat_tgl']);
		$data['sporadik_register_tgl'] = flipdate($data['sporadik_register_tgl']);



		$data['koordinat'] = $this->dm->get_kordinat_by_id($id);

		// show_array($data);exit;

		$data['action'] = "update/$id";



		$arr_kecamatan= $this->cm->arr_dropdown("tiger_kecamatan","id","kecamatan","kecamatan");

		 $data['arr_kecamatan'] = $this->cm->add_arr_head($arr_kecamatan,'','- PILIH KECAMATAN -');

		$data['arr_manfaat'] = $this->get_arr_manfaat();
		$data['mode'] = "U";

		$content =  $this->load->view("admin/admin_tataruang_form",$data,true);
		$this->set_title("Edit Data Permohonan");
		$this->set_content($content);
		$this->render();
}


function update($id){

		// sleep(2);

		$post = $this->input->post();

		// show_array($post);
		// show_array($_FILES);

		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|pdf|docx|txt';
        $config['max_size']             = 1024;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);
        if($this->upload->do_upload('lampiran')){

        	$data =   $this->upload->data();
        	// show_array($data);
        	$post['lampiran'] = $data['file_name'];
        }



         $this->load->library('form_validation');

         $this->form_validation->set_rules('dokumen_jenis', 'Jenis dokumen', 'required');
         $this->form_validation->set_rules('pemohon_nama', 'Nama pemohon', 'required');

         $this->form_validation->set_message('required', '{field} harus diisi');
         $this->form_validation->set_error_delimiters('', '');


         if ($this->form_validation->run() == TRUE)

         { 


        $koordinat = $post['koordinat'];

        unset($post['koordinat']);

      


        if($post['dokumen_jenis']=="shm"){
        	unset($post['sporadik_register_no']);
        	unset($post['sporadik_register_tgl']);
        	unset($post['sporadik_luas']);
        	unset($post['sporadik_lainnya']); 			
			
        }
        else {
			unset($post['shm_nomor']);
        	unset($post['shm_nama_pemilik']);
        	unset($post['shm_luas']);
        	unset($post['shm_lainnya']); 
        }

       	

       	if(empty($post['ijin_surat_tgl'])){
       		unset($post['ijin_surat_tgl']);
       	}
       	else {
       		$post['ijin_surat_tgl'] = flipdate($post['ijin_surat_tgl']);
       	}

   		if(empty($post['sporadik_register_tgl'])){
       		unset($post['sporadik_register_tgl']);
       	}
       	else {
       		$post['sporadik_register_tgl'] = flipdate($post['sporadik_register_tgl']);
       	}








       	// $post['proses'] = 1;
       	// $post['tanggal'] = date("Y-m-d h:i:s");
       	$this->db->where("id",$id);
       	$res = $this->db->update("tataruang",$post);
       	// $id = $this->db->insert_id();










       	if($res){

       		// hapus dulu 
       		$this->db->where("id_tataruang",$id);
       		$this->db->delete("kordinat");

       		$koordinat = str_replace(" ","",$koordinat);
	       	$koordinat = explode("\n",$koordinat); 

			 

			foreach($koordinat as $kord) : 

				if($kord =="") continue;

				$pos = explode(",",$kord);

				$arr_ko = array("x"=>$pos[0],"y"=>$pos[1],"id_tataruang"=>$id);

				$this->db->insert("kordinat",$arr_ko);

			endforeach;

       	}


       	
       	// echo "id". $id;

       	if($res){
       		$ret = array("error"=>false,"message"=>"Data berhasil diupdate");

       	}
       	else {
       		$ret = array("error"=>true,"message"=>"Data gagal diupdate");
       	}

       } // end of validation true 
       else {
       	 	$ret = array("error"=>true,"message"=>validation_errors());
       }

       	echo json_encode($ret);



	}


}

?>