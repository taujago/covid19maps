<?php 

	function menuaktif($aktif,$menu){   
	    if($aktif==$menu){
	        return "menu-active";
	    }else{
	        return "";
	    }
	}

	function no_access()
	{
	    $ci=& get_instance();
	    if(!$ci->session->userdata('user')){
	        redirect();
	    }
	}

	function in_access()
	{
	    $ci=& get_instance();
	    if($ci->session->userdata('user')){
	        redirect();
	    }
	}

	function NoEdit($id)
	{ 
	    $CI =& get_instance();
	    $cek=$CI->db->query("SELECT * FROM tataruang WHERE id='$id' AND proses!='0'")->num_rows();
	    if($cek>0){
	        redirect('Welcome/u_profil');
		}
	}

?>