<?php 
require_once APPPATH . 'core/Admin_controller.php';

class Petani extends Admin_controller {

	var $class ;
function __construct(){
	parent::__construct();
	$this->class = strtolower(get_class($this)); 
	$this->load->model("Core_model","cm");
	$this->load->model("Petani_model","dm");

}

function index(){

	$data['arr_kecamatan'] = $this->cm->arr_dropdown("tiger_kecamatan","id","kecamatan","kecamatan");
  $data['arr_kecamatan'] = $this->cm->add_arr_head($data['arr_kecamatan'],"","== SEMUA KECAMATAN ==");
	$data['class'] =  $this->class;
  $data['arr_desa'] = array('' => '== PILIH KECAMATAN ==');
	// $data['arr_desa'] = $this->cm->arr_desa();
	// $data['arr_desa'] = $this->cm->add_arr_head($data['arr_desa'],"","== SEMUA DESA ==");
	$content = $this->load->view("petani/petani_view",$data,true); 
	$this->set_title("DATA PETANI");
	$this->set_content($content);
	$this->render();
 
}


function get_data(){
		
		$draw = $_REQUEST['draw'];  
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:"daft_id"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        $nama = 	$_REQUEST['columns'][1]['search']['value'];  
        $id_desa = 	$_REQUEST['columns'][2]['search']['value'];  
        $id_kecamatan =  $_REQUEST['columns'][3]['search']['value'];  


        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null ,
				"nama"=>$nama,
				"id_desa"=>$id_desa,
        "id_kecamatan" => $id_kecamatan
		);     
           
        $row = $this->dm->get_data($req_param)->result_array();
		
        $count = count($row); 
       
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->get_data($req_param)->result_array();
        $n = $start;
        
        	$arr_data = array();
      

        foreach($result as $row) : 
        	$n++;

        	$id = $row['id_petani'];
         
        	$arr_data[] = array(
        			'<div class="btn-group">
						  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    Proses
						  </button>
						  <div class="dropdown-menu">
						    <a  class="btn btn-info dropdown-item" href="'.
						       site_url("$this->class/edit/$id") 
						    .'"><i class="fa fa-pencil"></i> Edit</a>
                <a  class="btn btn-info dropdown-item" href="'.
                   site_url("LahanSaldo/index/$id") 
                .'"><i class="fa fa-eye"></i> Detail</a>
						    <a onclick="hapus(\''.$id.'\')" class="btn btn-info dropdown-item" href="#"><i class="fa fa-remove"></i> Hapus</a>
						    
						  </div>
						</div>',
        			$row['petani_nik'], 
        			$row['petani_nama'],
        			$row['desa'],
        			$row['petani_alamat'],
        			$row['nama_poktan'],
        			$row['nama_pengecer'],
        			$row['luas']
        			
        	);
        endforeach;

        
         $responce = array('draw' => $draw, // ($start==0)?1:$start,
        				  'recordsTotal' => $count, 
        				  'recordsFiltered' => $count,
        				  'data'=>$arr_data
        	);
         
        echo json_encode($responce); 
	}
	


function baru(){
	$data['class'] =  $this->class;
	$data['action'] = "save";
  $data['arr_komoditas'] = $this->cm->arr_dropdown('m_komoditas', 'id', 'komoditas', 'komoditas');
  $data['arr_kecamatan'] = $this->cm->arr_dropdown("tiger_kecamatan","id","kecamatan","kecamatan");
   $data['arr_desa'] = array('' => '== PILIH KECAMATAN DULU ==');
	$content = $this->load->view("petani/petani_form_view",$data,true); 
	$this->set_title("TAMBAH DATA PETANI");
	$this->set_content($content);
	$this->render();
}


function edit($id){

	$this->db->select("a.*, poktan.nama_poktan, pengecer.nama_pengecer, desa.id as id_desa, desa.desa, gapoktan.id_gapoktan, kec.id as id_kecamatan")

	->from("petani a")
	->join('m_pengecer pengecer','pengecer.id_pengecer = a.id_pengecer','left')
	->join('m_poktan poktan','poktan.id_poktan = a.id_poktan','left')
	->join('m_gapoktan gapoktan','gapoktan.id_gapoktan = poktan.id_gapoktan','left')

	->join('tiger_desa desa','desa.id = gapoktan.id_desa','left')
	->join('tiger_kecamatan kec','kec.id = desa.id_kecamatan','left');

  

	$this->db->where("id_petani",$id);
	$data = $this->db->get()->row_array();
  // show_array($data);
  $data['arr_komoditas'] = $this->cm->arr_dropdown('m_komoditas', 'id', 'komoditas', 'komoditas');
	$data['petani_tgl_lahir'] = flipdate($data['petani_tgl_lahir']);

	// show_array($data); exit;
  $data['komoditas'] = json_decode($data['komoditas']);
	$data['class'] =  $this->class;
	$data['action'] = "update";
  $data['arr_kecamatan'] = $this->cm->arr_dropdown("tiger_kecamatan","id","kecamatan","kecamatan");
 $data['arr_desa'] = $this->cm->arr_dropdown2("tiger_desa","id","desa","desa", "id_kecamatan", $data['id_kecamatan']);
 // show_array($data);
	// $data['arr_desa'] = $this->cm->arr_desa();
	// $data['arr_desa'] = $this->cm->add_arr_head($data['arr_desa'],"","== PILIH DESA ==");
	$content = $this->load->view("petani/petani_form_view",$data,true); 
	$this->set_title("EDIT DATA PETANI");
	$this->set_content($content);
	$this->render();
}

function save(){

	$post = $this->input->post();
  $document = $_FILES;
  // show_array($post);
  // show_array($_FILES);
 
  // exit();
	unset($post['id_petani']);
	unset($post['id_desa']);
	unset($post['id_gapoktan']);
  unset($post['id_kecamatan']);

	$this->load->library('form_validation');

	$this->form_validation->set_rules('petani_nik', 'NIK ', 'required');
	$this->form_validation->set_rules('petani_nama', 'Nama Petani', 'required');
	// $this->form_validation->set_rules('luas', 'Luas', 'required|numeric');
	$this->form_validation->set_rules('id_gapoktan', 'Gapoktan', 'required');
	// $this->form_validation->set_rules('id_poktan', 'Poktan', 'required');

	$this->form_validation->set_message('required', '{field} harus diisi');
	$this->form_validation->set_message('numeric', '{field} harus diisi angka');
	$this->form_validation->set_error_delimiters('* ', '<br />');	

   if ($this->form_validation->run() == TRUE){
    
    if ($document['foto']['size']>0) {

      $this->load->library('upload');
    
$arr_real_name = explode('.', $document['foto']['name']);
       $this->load->helper('string');
      $file_name = random_string('alnum', 50); 
    
    $config['upload_path']          = './foto_petani/';
    $config['allowed_types']        = 'jpg|png|jpeg';
    $config['file_name']            = $file_name.'.'.$arr_real_name[1];
    $config['overwrite']            = true;
    $config['max_size']             = 5024;
   
    $this->upload->initialize($config);
   
    if ($this->upload->do_upload('foto')) {
      
      $res = $this->upload->data();
      


      $post['foto'] = "foto_petani/".$res['file_name'];
      
    }else{
      $ret = array("error"=>true,"message"=>"Terjadi Kesalahan silahkan ulang proses simpan");
      echo json_encode($ret);
      exit();
    }

  }

    $post['komoditas'] = json_encode($post['komoditas']);
   		$post['petani_tgl_lahir'] = flipdate($post['petani_tgl_lahir']);

   		$res = $this->db->insert("petani",$post);
   		if($res){
   			$ret = array("error"=>false,"message"=>"Data berhasil disimpan","mode"=>"I");
   		}
   		else {
   			$ret = array("error"=>true,"message"=>"Data gagal disimpan ".mysql_error());
   		}
   }
   else {
   		$ret = array("error"=>true,"message"=>validation_errors());
   }

   
   echo json_encode($ret);


}


function update(){

	$post = $this->input->post();
  // show_array($post);
  $document = $_FILES;
	unset($post['id_desa']);
	unset($post['id_gapoktan']);
  unset($post['id_kecamatan']);

	$this->load->library('form_validation');

	$this->form_validation->set_rules('petani_nik', 'NIK ', 'required');
	$this->form_validation->set_rules('petani_nama', 'Nama Petani', 'required');
	// $this->form_validation->set_rules('luas', 'Luas', 'required|numeric');
	$this->form_validation->set_rules('id_gapoktan', 'Gapoktan', 'required');

	$this->form_validation->set_message('required', '{field} harus diisi');
	$this->form_validation->set_message('numeric', '{field} harus diisi angka');
	$this->form_validation->set_error_delimiters('* ', '<br />');	

   if ($this->form_validation->run() == TRUE){

    if ($document['foto']['size']>0) {

      $this->load->library('upload');
    
$arr_real_name = explode('.', $document['foto']['name']);
       $this->load->helper('string');
      $file_name = random_string('alnum', 50); 
    
    $config['upload_path']          = './foto_petani/';
    $config['allowed_types']        = 'jpg|png|jpeg';
    $config['file_name']            = $file_name.'.'.$arr_real_name[1];
    $config['overwrite']            = true;
    $config['max_size']             = 5024;
   
    $this->upload->initialize($config);
   
    if ($this->upload->do_upload('foto')) {
      
      $res = $this->upload->data();
      


      $post['foto'] = "foto_petani/".$res['file_name'];
      
    }else{
      $ret = array("error"=>true,"message"=>"Terjadi Kesalahan silahkan ulang proses simpan");
      echo json_encode($ret);
      exit();
    }

  }


   		$post['petani_tgl_lahir'] = flipdate($post['petani_tgl_lahir']);
       $post['komoditas'] = json_encode($post['komoditas']);
      
   		$this->db->where("id_petani",$post['id_petani']);

   		$res = $this->db->update("petani",$post);
   		if($res){
   			$ret = array("error"=>false,"message"=>"Data berhasil diupdate","mode"=>"U");
   		}
   		else {
   			$ret = array("error"=>true,"message"=>"Data gagal diupdate ".mysql_error());
   		}
   }
   else {
   		$ret = array("error"=>true,"message"=>validation_errors());
   }

   
   echo json_encode($ret);


}


function hapus(){
	$post = $this->input->post();

	$this->db->where("id_petani",$post['id_petani']);
	$res = $this->db->delete("petani");
	// echo $this->db->last_query(); 
	// $res = true;
	if($res){
   			$ret = array("error"=>false,"message"=>"Data berhasil dihapus");
	}
	else {
		$ret = array("error"=>true,"message"=>"Data gagal dihapus ".mysql_error());
	}

	echo json_encode($ret);
}


function toexcel(){

	$this->load->library('Excel');

	$this->excel->setActiveSheetIndex(0);
    $this->excel->getActiveSheet()->setTitle('Laporan pupuk');
    $this->excel->getActiveSheet()->getColumnDimension('a')->setWidth(20);
    $this->excel->getActiveSheet()->getColumnDimension('b')->setWidth(20);
    $this->excel->getActiveSheet()->getColumnDimension('c')->setWidth(20);
    $this->excel->getActiveSheet()->getColumnDimension('d')->setWidth(20);
    $this->excel->getActiveSheet()->getColumnDimension('e')->setWidth(20);
    $this->excel->getActiveSheet()->getColumnDimension('f')->setWidth(20);
    $this->excel->getActiveSheet()->getColumnDimension('g')->setWidth(20);
    $this->excel->getActiveSheet()->getColumnDimension('h')->setWidth(20);
    $this->excel->getActiveSheet()->getColumnDimension('i')->setWidth(20);
    $this->excel->getActiveSheet()->getColumnDimension('j')->setWidth(20);
    $this->excel->getActiveSheet()->getColumnDimension('k')->setWidth(20);
    $this->excel->getActiveSheet()->getColumnDimension('l')->setWidth(30);
    $this->excel->getActiveSheet()->getColumnDimension('m')->setWidth(20);
    $this->excel->getActiveSheet()->getColumnDimension('n')->setWidth(20);
    $this->excel->getActiveSheet()->getColumnDimension('o')->setWidth(20);
    $this->excel->getActiveSheet()->getColumnDimension('p')->setWidth(20);
    $this->excel->getActiveSheet()->getColumnDimension('q')->setWidth(20);
    $this->excel->getActiveSheet()->getColumnDimension('r')->setWidth(20);
    $this->excel->getActiveSheet()->getColumnDimension('s')->setWidth(20);
    $this->excel->getActiveSheet()->getColumnDimension('t')->setWidth(20);


    $baris = 1;

    // $this->excel->getActiveSheet()->mergeCells('A'.$baris.':l'.$baris);
    $this->excel->getActiveSheet()
            ->setCellValue('a'.$baris, "Nama Penyuluh")
            ->setCellValue('b'.$baris, "Kode Kios")
            ->setCellValue('c'.$baris, "Nama Kios Pengecer")
            ->setCellValue('d'.$baris, "Nama Gapoktan")
            ->setCellValue('e'.$baris, "Nama Poktan")
            ->setCellValue('f'.$baris, "Desa/Keluarahan")
            ->setCellValue('g'.$baris, "Nama Petani")
            ->setCellValue('h'.$baris, "NIK")
            ->setCellValue('i'.$baris, "Tempat Lahir")
            ->setCellValue('j'.$baris, "Tanggal Lahir")
            ->setCellValue('k'.$baris, "Nama Ibu")
            ->setCellValue('l'.$baris, "Alamat")
            ->setCellValue('m'.$baris, "Subsektor")
            ->setCellValue('n'.$baris, "Komoditas")
            ->setCellValue('o'.$baris, "Luas")
            ->setCellValue('p'.$baris, "Pupuk Urea (kg)")
            ->setCellValue('q'.$baris, "Pupuk SP-36 (kg)")
            ->setCellValue('r'.$baris, "Pupuk ZA (kg)")
            ->setCellValue('s'.$baris, "Pupuk NPK (kg)")
            ->setCellValue('t'.$baris, "Pupuk Organik (kg)")


            ;


     $record = $this->dm->list_data_petani();

     foreach($record->result() as $row): 
     	$baris++;
     	$this->excel->getActiveSheet()
            ->setCellValue('a'.$baris,$row->nama_penyuluh)
            ->setCellValue('b'.$baris,$row->kode_pengecer)
            ->setCellValue('c'.$baris,$row->nama_pengecer)
            ->setCellValue('d'.$baris,$row->nama_gapoktan)
            ->setCellValue('e'.$baris,$row->nama_poktan)
            ->setCellValue('f'.$baris,$row->desa)
            ->setCellValue('g'.$baris,$row->petani_nama)
            ->setCellValue('h'.$baris,$row->petani_nik)
            ->setCellValue('i'.$baris,$row->petani_ttl)
            ->setCellValue('j'.$baris,flipdate($row->petani_tgl_lahir))
            ->setCellValue('k'.$baris,$row->petani_nama_ibu)
            ->setCellValue('l'.$baris,$row->petani_alamat)
            ->setCellValue('m'.$baris,$row->subsektor)
            ->setCellValue('n'.$baris,$row->komoditas)
            ->setCellValue('o'.$baris,$row->luas)
            ->setCellValue('p'.$baris,$row->urea)
            ->setCellValue('q'.$baris,$row->sp36)
            ->setCellValue('r'.$baris,$row->za)
            ->setCellValue('s'.$baris,$row->npk)
            ->setCellValue('t'.$baris,$row->organik)
            ;

       	 $this->excel->getActiveSheet()->getStyle('h'.$baris)
		    ->getNumberFormat()
		    ->setFormatCode('0');

     endforeach;

   

    $filename = "Data_pupuk_petani.xlsx";
	 
    header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell  
                  
    
    $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');  
      
    $objWriter->save('php://output');
}

}
?>