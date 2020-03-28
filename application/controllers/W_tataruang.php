<?php defined('BASEPATH') OR exit('No direct script access allowed');

class W_tataruang extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model("Tataruang_model","dm");
		$this->load->model("Core_model","cm");
		$this->load->model("M_welcome");
		$this->load->library('form_validation');
		no_access();
	}

	function simpan() {
		$post = $this->input->post();
		$koordinat = explode("\n",$post['koordinat']); 
		$this->db->insert("pemohon",array("nama"=>$post['nama']));
		$id = $this->db->insert_id();
		foreach($koordinat as $kord): 
			if($kord =="") continue;
			$pos = explode(",",$kord);
			$arr_ko = array("x"=>$pos[0],"y"=>$pos[1],"id_pemohon"=>$id);
			$this->db->insert("kordinat",$arr_ko);
		endforeach;
		$ret = array("error"=>false,"pesan"=>"Data berhasil disimpan");
		echo json_encode($ret);
	}

	function save(){
		$post = $this->input->post();
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
        
        $this->form_validation->set_rules('dokumen_jenis', 'Jenis dokumen', 'required');
        $this->form_validation->set_rules('pemohon_nama', 'Nama pemohon', 'required');
        $this->form_validation->set_message('required', '{field} harus diisi');
        $this->form_validation->set_error_delimiters('', '');
        
        if ($this->form_validation->run() == TRUE){ 
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

	       	if($res){
	       		$ret = array("error"=>false,"message"=>"Data berhasil disimpan");
	       	}
	       	else {
	       		$ret = array("error"=>true,"message"=>"Data gagal disimpan");
	       	}
       } 

       else {
       	 	$ret = array("error"=>true,"message"=>validation_errors());
       }
       	echo json_encode($ret);
	}


	function edit($id){
		NoEdit($id);
		$data = $this->db->where("id",$id)->get("tataruang")->row_array();
		$data['ijin_surat_tgl'] = flipdate($data['ijin_surat_tgl']);
		$data['sporadik_register_tgl'] = flipdate($data['sporadik_register_tgl']);
		$data['koordinat'] = $this->dm->get_kordinat_by_id($id);
		$data['action'] = "update/$id";
		$arr_kecamatan= $this->cm->arr_dropdown("tiger_kecamatan","id","kecamatan","kecamatan");
		$data['arr_kecamatan'] = $this->cm->add_arr_head($arr_kecamatan,'','- PILIH KECAMATAN -');
		$data['arr_manfaat'] = $this->M_welcome->get_arr_manfaat();
		$data['mode'] = "U";
		$data['title'] = "Edit Data Permohonan";
		$data['content'] = "home/form_permohonan.php";
		$data['aktif'] = "nama";
		//show_array($data);exit;
		$this->load->view('depan/template',$data);
	}

	function update($id){
		$post = $this->input->post();
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

         $this->form_validation->set_rules('dokumen_jenis', 'Jenis dokumen', 'required');
         $this->form_validation->set_rules('pemohon_nama', 'Nama pemohon', 'required');
         $this->form_validation->set_message('required', '{field} harus diisi');
         $this->form_validation->set_error_delimiters('', '');

         if ($this->form_validation->run() == TRUE){ 
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

	       	$this->db->where("id",$id);
	       	$res = $this->db->update("tataruang",$post);

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

	       	if($res){
	       		$ret = array("error"=>false,"message"=>"Data berhasil diupdate");
	       	}
	       	else {
	       		$ret = array("error"=>true,"message"=>"Data gagal diupdate");
	       	}
       } 

       else {
       	 	$ret = array("error"=>true,"message"=>validation_errors());
       }

       echo json_encode($ret);
	}
}
?>