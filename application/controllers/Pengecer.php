<?php 
require_once APPPATH . 'core/Admin_controller.php';

class Pengecer extends Admin_controller {

	var $class ;
function __construct(){
	parent::__construct();
	$this->class = strtolower(get_class($this)); 
	$this->load->model("Core_model","cm");
	$this->load->model("Pengecer_model","dm");

}

function index(){

	
	$data['class'] =  $this->class;
	$data['arr_desa'] = $this->cm->arr_desa();
	$data['arr_desa'] = $this->cm->add_arr_head($data['arr_desa'],"","== SEMUA DESA ==");
	$content = $this->load->view("$this->class/$this->class"."_view",$data,true); 
	$this->set_title("DATA KIOS PENGECER");
	$this->set_content($content);
	$this->render();
 

}


function get_data(){
		// show_array($_REQUEST);
		$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:"daft_id"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        $nama = 	$_REQUEST['columns'][1]['search']['value'];  
         


        
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null ,
				"nama"=>$nama
		);     
           
        $row = $this->dm->get_data($req_param)->result_array();
		
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->get_data($req_param)->result_array();
        $n = $start;

        


        if(count($result)<1) {
        	$arr_data[] = array(
        			'', 
					'',
					'',
					'',
					'',
					'',
					''
        		);
        }

        else { 

        foreach($result as $row) : 
        	$n++;

        	$id = $row['id_pengecer'];
         
        	$arr_data[] = array(
        			'<div class="btn-group">
						  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    Proses
						  </button>
						  <div class="dropdown-menu">
						    <a  class="btn btn-info dropdown-item" href="'.
						       site_url("$this->class/edit/$id") 
						    .'"><i class="fa fa-pencil"></i> Edit</a>
						    <a onclick="hapus(\''.$id.'\')" class="btn btn-info dropdown-item" href="#"><i class="fa fa-remove"></i> Hapus</a>
						    
						  </div>
						</div>',
        			$row['kode_pengecer'], 
        			$row['nama_pengecer'],
        			 
        			 
        			 

        			 
        	);
        endforeach;

        }
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
	$data['arr_desa'] = $this->cm->arr_desa();
	$content = $this->load->view("$this->class/$this->class"."_form_view",$data,true); 
	$this->set_title("TAMBAH DATA KIOS PENGECER");
	$this->set_content($content);
	$this->render();
}


function edit($id){

	 

	$this->db->where("id_pengecer",$id);
	$data = $this->db->get("m_pengecer")->row_array();

 
	// show_array($data); exit;

	$data['class'] =  $this->class;
	$data['action'] = "update";
	 
	$content = $this->load->view("$this->class/$this->class"."_form_view",$data,true); 
	$this->set_title("EDIT DATA KIOS PENGECER");
	$this->set_content($content);
	$this->render();
}

function save(){

	$post = $this->input->post();

	 

	$this->load->library('form_validation');

	$this->form_validation->set_rules('nama_pengecer', 'Nama Pengecer ', 'required');
	 

	$this->form_validation->set_message('required', '{field} harus diisi');
	$this->form_validation->set_message('numeric', '{field} harus diisi angka');
	$this->form_validation->set_error_delimiters('* ', '<br />');	

   if ($this->form_validation->run() == TRUE){

      unset($post['id_pengecer']);
   		$res = $this->db->insert("m_pengecer",$post);
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
 

	$this->load->library('form_validation');

	$this->form_validation->set_rules('nama_pengecer', 'Nama pengecer ', 'required');
	 
	// $this->form_validation->set_rules('id_poktan', 'Poktan', 'required');

	$this->form_validation->set_message('required', '{field} harus diisi');
	$this->form_validation->set_message('numeric', '{field} harus diisi angka');
	$this->form_validation->set_error_delimiters('* ', '<br />');	

   if ($this->form_validation->run() == TRUE){

 

   		$this->db->where("id_pengecer",$post['id_pengecer']);

   		$res = $this->db->update("m_pengecer",$post);
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

	$this->db->where("id_pengecer",$post['id']);
	$res = $this->db->delete("m_pengecer");
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