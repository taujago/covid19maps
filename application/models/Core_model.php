<?php 
class Core_model extends CI_Model {



	 function arr_dropdown($vTable, $vINDEX, $vVALUE, $vORDERBY){
                $this->db->order_by($vORDERBY);
                $res  = $this->db->get($vTable);
		 

                $ret = array('' => '== PILIH SATU ==');
                foreach($res->result_array() as $row) : 
                        $ret[$row[$vINDEX]] = $row[$vVALUE];
                endforeach;
                return $ret;

        }


function arr_dropdown_nohead($vTable, $vINDEX, $vVALUE, $vORDERBY){
                $this->db->order_by($vORDERBY);
                $res  = $this->db->get($vTable);
         

                $ret = array();
                foreach($res->result_array() as $row) : 
                        $ret[$row[$vINDEX]] = $row[$vVALUE];
                endforeach;
                return $ret;

        }


        


    function add_arr_head($arr,$index,$str) {
	  $res[$index] = $str;
	  foreach($arr as $x => $y) : 
	  	$res[$x] = $y;
	  endforeach;
	  return $res;
	}


    function arr_desa(){

        $this->db->select('desa.*,kec.kecamatan')->from("tiger_desa desa")
        ->join("tiger_kecamatan kec","kec.id=desa.id_kecamatan")
        ->order_by("kec.kecamatan")
        ->order_by("desa.desa");
        $res = $this->db->get();

        $ret = array();
        foreach($res->result() as $row): 
            $ret[$row->id] = $row->kecamatan." - ".$row->desa;
        endforeach;
        return $ret;
    }


    function arr_dropdown2($vTable, $vINDEX, $vVALUE, $vORDERBY, $field, $search){
                $this->db->where($field, $search);
                $this->db->order_by($vORDERBY);
                $res  = $this->db->get($vTable);
                
                $ret = array();
                
                foreach($res->result_array() as $row) : 
                        $ret[$row[$vINDEX]] = $row[$vVALUE];
                endforeach;
                return $ret;

        }

function get_data_poktan(){
    $userdata  = $this->session->userdata("userdata");

    $id_desa = $userdata['desa'];
    $this->db->select("poktan.*")
    ->from('m_poktan poktan')
    ->join('m_gapoktan gapok','poktan.id_gapoktan = gapok.id_gapoktan')
    ->where("gapok.id_desa",$id_desa);

    $res = $this->db->get();
    // echo $this->db->last_query(); exit;

    $arr = array();

    foreach($res->result() as $row): 
        $arr[$row->id_poktan] = $row->nama_poktan;
    endforeach;

    return $arr; 
}


function get_data_desa($id_desa) {

    $this->db->select('d.desa,k.kecamatan')
    ->from('tiger_desa d')->join('tiger_kecamatan k','k.id=d.id_kecamatan')
    ->where('d.id',$id_desa);
    $desa = $this->db->get()->row_array();

    return $desa;


}


function get_data_kecamatan($id_kecamatan) {

    $this->db->select('d.*')
    ->from('tiger_kecamatan d')
    ->where('d.id',$id_kecamatan);
    $kecamatan = $this->db->get()->row_array();

    return $kecamatan;


}


function get_data_komoditas($id){
    $this->db->where("id",$id);
    $data = $this->db->get("m_komoditas")->row();
    return $data->komoditas;
}


}