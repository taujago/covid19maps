<link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
<!-- select2 Plugin -->
<link href="<?php echo base_url("assets") ?>/plugins/select2/select2.min.css" rel="stylesheet" />

<script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>

<!--Select2 js -->
<script src="<?php echo base_url("assets") ?>/plugins/select2/select2.full.min.js"></script>

<script src="<?php echo base_url("assets") ?>/js/jquery.form.js"></script>


 
<form id="frm_tataruang" action="<?php echo site_url("admin_permohonan/$action"); ?>"  method="post" enctype="multipart/form-data">  

<div class="card">
	<div class="card-status bg-teal br-tr-7 br-tl-7"></div>
	<div class="card-header">
		<h3 class="card-title">Data Permohonan</h3>
		<div class="card-options">
			<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
		 
		</div>
	</div>
	<div class="card-body">
		 <div class="row">
		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="jenis_permohonan" class="form-label">Permohonan diajukan untuk  ?</label>
						<?php

						$jenis_permohonan = isset($jenis_permohonan)?$jenis_permohonan:"";

						$arr = array(1=>"Pribadi","Perusahaan");
						echo form_dropdown("jenis_permohonan",$arr,$jenis_permohonan,'class="form-control" id="jenis_permohonan"') 
						?>
					</div>
		 	</div>
		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="sertifikat_milik" class="form-label">Kepemilikan Sertifikat/Dokumen</label>
						<?php


						$sertifikat_milik = isset($sertifikat_milik)?$sertifikat_milik:"";

						$arr = array("sendiri"=>"Sendiri","oranglain"=>"Orang lain");
						echo form_dropdown("sertifikat_milik",$arr,$sertifikat_milik,'class="form-control" id="sertifikat_milik"') 
						?>
					</div>
		 	</div>
		 </div>
	</div>
</div>
  


<div class="card">
	<div class="card-status bg-teal br-tr-7 br-tl-7"></div>
	<div class="card-header">
		<h3 class="card-title">Data Surat Pengantar dari DPMPTSP</h3>
		<div class="card-options">
			<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
		 
		</div>
	</div>
	<div class="card-body">
		 <div class="row">
		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="ijin_surat_no" class="form-label">Nomor Surat </label>
						 <input type="text" id="ijin_surat_no" name="ijin_surat_no" class="form-control" placeholder="Nomor surat" value="<?php echo isset($ijin_surat_no)?$ijin_surat_no:""; ?>">
					</div>
		 	</div>
		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="ijin_surat_tgl" class="form-label">Tanggal surat</label>
						  <input type="text" id="ijin_surat_tgl" name="ijin_surat_tgl" class="form-control" data-date-format="dd-mm-yyyy"  placeholder="DD-MM-YYYY" value="<?php echo isset($ijin_surat_tgl)?$ijin_surat_tgl:""; ?>">
					</div>
		 	</div>
		 </div>
	</div>
</div>



<div class="card">
	<div class="card-status bg-teal br-tr-7 br-tl-7"></div>
	<div class="card-header">
		<h3 class="card-title">Data Pemohon</h3>
		<div class="card-options">
			<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
		 
		</div>
	</div>
	<div class="card-body">
		 <div class="row">
		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="pemohon_nama" class="form-label">Nama Pemohon </label>
						 <input type="text" id="pemohon_nama" name="pemohon_nama" class="form-control" placeholder="Nama pemohon" value="<?php echo isset($pemohon_nama)?$pemohon_nama:""; ?>"> 
					</div>
		 	</div>
		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="pemohon_alamat" class="form-label">Alamat Pemohon </label>
						  <textarea class="form-control" id="pemohon_alamat" name="pemohon_alamat"><?php echo isset($pemohon_alamat)?$pemohon_alamat:""; ?></textarea>
					</div>
		 	</div>
		 	 
		 </div>

		 <div class="row">
		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="pemohon_hp" class="form-label">Nomo Telpon </label>
						 <input type="text" id="pemohon_hp" name="pemohon_hp" class="form-control" placeholder="Homor telpon / HP" value="<?php echo isset($pemohon_hp)?$pemohon_hp:""; ?>">
					</div>
		 	</div>
		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="pemohon_pekerjaan" class="form-label">Pekerjaan Pekerjaan </label>
						   <input type="text" id="pemohon_pekerjaan" name="pemohon_pekerjaan" class="form-control" placeholder="Pekerjaan" value="<?php echo isset($pemohon_pekerjaan)?$pemohon_pekerjaan:""; ?>">
					</div>
		 	</div>

		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="pemohon_identitas" class="form-label">Jenis Identitas </label>
						   <?php


						   $pemohon_identitas = isset($pemohon_identitas)?$pemohon_identitas:"";

						$arr = array("ktp"=>"KTP","sim"=>"SIM",'paspor'=>"Paspor");
						echo form_dropdown("pemohon_identitas",$arr,$pemohon_identitas,'class="form-control" id="pemohon_identitas"') 
						?>
					</div>
		 	</div>

		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="pemohon_nik" class="form-label">No. Identitas </label>
						   <input type="text" id="pemohon_nik" name="pemohon_nik" class="form-control" placeholder="No. Identitas" value="<?php echo isset($pemohon_nik)?$pemohon_nik:""; ?>">
					</div>
		 	</div>
		  
		 </div>
	</div>
</div>




<div class="card">
	<div class="card-status bg-teal br-tr-7 br-tl-7"></div>
	<div class="card-header">
		<h3 class="card-title">Data Dokumen</h3>
		<div class="card-options">
			<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
		 
		</div>
	</div>
	<div class="card-body">
		 <div class="row">
		 	<div class="col-md-12 col-lg-12">
		 		<div class="form-group">
						<label for="dokumen_jenis" class="form-label">Jenis dokumen </label>
						 <?php 

						 	$dokumen_jenis=isset($dokumen_jenis)?$dokumen_jenis:"";


						 	$arr = array(
						 		""=>"= PILIH JENIS DOKUMEN ",
						 		"shm"=>"SHM",
						 		"sporadik"=>"Sporadik");
						 	echo form_dropdown("dokumen_jenis",$arr,$dokumen_jenis,'id="dokumen_jenis" class="form-control"');
						 ?>
					</div>
		 	</div>
		 	 
		 </div>
	</div>
</div>


<div id="cardshm" class="card">
	<div class="card-status bg-teal br-tr-7 br-tl-7"></div>
	<div class="card-header">
		<h3 class="card-title">Data SHM </h3>
		<div class="card-options">
			<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
		 
		</div>
	</div>
	<div class="card-body">
		 <div class="row">
		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="shm_nomor" class="form-label">Nomor SHM </label>
						 <input type="text" id="shm_nomor" name="shm_nomor" class="form-control" placeholder="Nomor SHM" value="<?php echo isset($shm_nomor)?$shm_nomor:""; ?>">
					</div>
		 	</div>
		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="shm_nama_pemilik" class="form-label">Nama Pemilik SHM</label>
						  <input type="text" id="shm_nama_pemilik" name="shm_nama_pemilik" class="form-control"    placeholder="Nama Pemilik SHM" value="<?php echo isset($shm_nama_pemilik)?$shm_nama_pemilik:""; ?>">
					</div>
		 	</div>
	 	<div class="col-md-6 col-lg-6">
	 		<div class="form-group">
					<label for="shm_luas" class="form-label">Luas menurut SHM (m<sup>2</sup>)</label>
					 <input type="text" id="shm_luas" name="shm_luas" class="form-control" placeholder="Luas menurut SHM" value="<?php echo isset($shm_luas)?$shm_luas:""; ?>">
				</div>
	 	</div>
		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="shm_lainnya" class="form-label"> Keterangan SHM lainnya</label>
						<textarea name="shm_lainnya" id="shm_lainnya" class="form-control"><?php echo isset($shm_lainnya)?$shm_lainnya:""; ?></textarea>
					</div>
		 	</div>
		 </div>
	</div>
</div>



<div id="cardsporadik" class="card">
	<div class="card-status bg-teal br-tr-7 br-tl-7"></div>
	<div class="card-header">
		<h3 class="card-title">Data Sporadik </h3>
		<div class="card-options">
			<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
		 
		</div>
	</div>
	<div class="card-body">
		 <div class="row">
		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="sporadik_register_no" class="form-label">Nomor Register sporadik </label>
						 <input type="text" id="sporadik_register_no" name="sporadik_register_no" class="form-control" placeholder="Nomor Register sporadik" value="<?php echo isset($sporadik_register_no)?$sporadik_register_no:""; ?>">
					</div>
		 	</div>
		 	<div class="col-md-6 col-lg-6">
		 		 



		 		<div class="form-group">
						<label for="sporadik_register_tgl" class="form-label">Tanggal surat</label>
						  <input type="text" id="sporadik_register_tgl" name="sporadik_register_tgl" placeholder="DD-MM-YYYY" class="form-control" data-date-format="dd-mm-yyyy" value="<?php echo isset($sporadik_register_tgl)?$sporadik_register_tgl:""; ?>" >
					</div>
		 	</div>
		 	 
		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="sporadik_luas" class="form-label">Luas Menurut Sporadik </label>
						 <input type="text" id="sporadik_luas" name="sporadik_luas" class="form-control" placeholder="Luas menurut SHM" value="<?php echo isset($sporadik_luas)?$sporadik_luas:""; ?>" >
					</div>
		 	</div>
		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="sporadik_lainnya" class="form-label"> Keterangan Sporadik lainnya</label>
						<textarea name="sporadik_lainnya" id="sporadik_lainnya" class="form-control"><?php echo isset($sporadik_lainnya)?$sporadik_lainnya:""; ?></textarea>
					</div>
		 	</div>
		 </div>
	</div>
</div>

<div class="card">
	<div class="card-status bg-teal br-tr-7 br-tl-7"></div>
	<div class="card-header">
		<h3 class="card-title">Data Lokasi </h3>
		<div class="card-options">
			<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
		 
		</div>
	</div>
	<div class="card-body">
		 <div class="row">
		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="lokasi_id_kecamatan" class="form-label">Kecamatan</label>
						  <?php 
						 	// $arr = array("shm"=>"SHM","sporadik"=>"Sporadik");
						  	$lokasi_id_kecamatan = isset($lokasi_id_kecamatan)?$lokasi_id_kecamatan:"";
						 	echo form_dropdown("lokasi_id_kecamatan",
						 		$arr_kecamatan,$lokasi_id_kecamatan,'id="lokasi_id_kecamatan" class="form-control"');
						 ?>
					</div>
		 	</div>
		 	<div class="col-md-6 col-lg-6">
		 		 



		 		<div class="form-group">
						<label for="sporadik_register_tgl" class="form-label">Desa / Kelurahan</label>
						  <?php 
						 	 

						 	echo form_dropdown("lokasi_id_desa",array(),'','id="lokasi_id_desa" class="form-control"');
						 ?>  
					</div>
		 	</div>
		 	 
		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="lokasi_id_manfaat" class="form-label">Rencana Pemanfaatan</label>
						 <?php 
						 $lokasi_id_manfaat = isset($lokasi_id_manfaat)?$lokasi_id_manfaat:"";
						 	echo form_dropdown("lokasi_id_manfaat",
						 		$arr_manfaat,$lokasi_id_manfaat,'id="lokasi_id_manfaat" class="form-control select2-show-search"');

						 ?>
					</div>
		 	</div>
		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="lokasi_luas" class="form-label"> Luas m<sup>2</sup></label>
						<input type="text" id="lokasi_luas" name="lokasi_luas" class="form-control" placeholder="Luas" value="<?php echo isset($lokasi_luas)?$lokasi_luas:""; ?>">
					</div>
		 	</div>

		 	<div class="col-md-12 col-lg-12">
		 		<div class="form-group">
						<label for="lampiran" class="form-label"> Lampiran </label>
						<div class="custom-file">
						<input type="file" class="custom-file-input" name="lampiran">
						<label class="custom-file-label">Pilih berkas</label>
					</div>
					</div>
		 	</div>

		 	<div class="col-md-12 col-lg-12">
		 		<div class="form-group">
						<label for="koordinat" class="form-label"> Koordinat </label>
						 <textarea rows="10" name="koordinat" id="koordinat" class="form-control" placeholder="Contoh : -8.682508289999932,116.849103903"><?php echo isset($koordinat)?$koordinat:""; ?></textarea>
					</div>
		 	</div>

		 	<div class="col-md-12 col-lg-12">
		 		<?php 
				$atts = array(
				        'width'       => 1024,
				        'height'      => 600,
				        'scrollbars'  => 'yes',
				        'status'      => 'yes',
				        'resizable'   => 'yes',
				        'screenx'     => 0,
				        'screeny'     => 0,
				        'window_name' => '_blank',
				        'class'  => 'btn btn-primary mt-2 mr-2'
				);

				if($mode=="U"){
				// 	$attsx = array(
				//         'width'       => 1024,
				//         'height'      => 600,
				//         'scrollbars'  => 'yes',
				//         'status'      => 'yes',
				//         'resizable'   => 'yes',
				//         'screenx'     => 0,
				//         'screeny'     => 0,
				//         'window_name' => '_blank',
				//         'class'  => 'btn btn-success mt-2 mr-2'
				// );
					// echo anchor_popup("peta/peta_get_koordinat","<i class='fa fa-eye'></i> Lihat di peta",$attsx);

					echo "<a class='btn btn-success mt-2 mr-2' onclick='lihatpeta();'><i class='fa fa-eye'></i> Lihat di peta</a>";
				}

				echo anchor_popup("peta/peta_get_koordinat","<i class='fa fa-map-o'></i> Ambil koordinat dari google map",$atts);
				echo anchor_popup("peta/tambah","<i class='fa fa-file'></i> Baca dari file geojson",$atts);
				echo anchor_popup("peta/readshape","<i class='fa fa-cloud-upload'></i>  Baca file .shp",$atts);


			?>
		 	</div>

		 	

		 	



		 </div>

		 <div class="row mt-5">
		 	<div class="col-md-6 col-lg-6"  >
		 		<button type="submit" class="btn btn-lg btn-block btn-success" type="submit"> <i class="fa fa-save"></i> SIMPAN</button>
		 	</div>
		 	<div class="col-md-6 col-lg-6"  >
		 		<a  href="<?php echo site_url("admin_permohonan"); ?>"  class="btn btn-lg btn-block btn-danger"  > <i class="fa fa-arrow-left"></i> Kembali</a>
		 	</div>
		 </div>
	</div>
</div>


</form>

<script type="text/javascript">
$(document).ready(function(){


$("#cardsporadik").hide();
	$("#cardshm").hide();


<?php 
if($mode == "U") : 
?>

dokumen_jenis = '<?php echo $dokumen_jenis ?>';

lokasi_id_kecamatan = '<?php echo $lokasi_id_kecamatan ?>';
lokasi_id_desa = '<?php echo $lokasi_id_desa ?>';

if(dokumen_jenis == "shm") {
	$("#cardshm").show('fast');
	$("#cardsporadik").hide('fast');
}
else {
	$("#cardshm").hide('fast');
	$("#cardsporadik").show('fast');
}


$.ajax({
	url : '<?php echo site_url("admin_permohonan/get_data_desa"); ?>/'+lokasi_id_kecamatan,
	data : { lokasi_id_desa : lokasi_id_desa },
	type : 'post',
 	success : function(htmldata) {
 		$("#lokasi_id_desa").html(htmldata);
 	}
});


<?php endif; ?>


	 

	$("#dokumen_jenis").change(function(){
		if( $(this).val() == "shm") {
			$("#cardshm").show('fast');
			$("#cardsporadik").hide('fast');
		}
		else {
			$("#cardshm").hide('fast');
			$("#cardsporadik").show('fast');
		}

	});




	 $("#ijin_surat_tgl").datepicker().on('changeDate', function(ev){                 
			 $('#ijin_surat_tgl').datepicker('hide');
	});

	  $("#sporadik_register_tgl").datepicker().on('changeDate', function(ev){                 
			 $('#sporadik_register_tgl').datepicker('hide');
	});


  	$('.select2-show-search').select2({
	         minimumResultsForSearch: ''
   });

	$("#lokasi_id_kecamatan").change(function(){

		$.ajax({
			url : '<?php echo site_url("admin_permohonan/get_data_desa"); ?>/'+$(this).val(),
			success : function(htmldata){
				$("#lokasi_id_desa").html(htmldata);
			}
		});

	});


	 

	$('#frm_tataruang').submit(function() { 
            // swal('Info',"Thank you for your comment!",'success'); 

            	// waitingDialog.show();

            
            $(this).ajaxSubmit({
            	type : 'post',
            	dataType : 'json',
            	success : function(obj){
            		
            		if(obj.error==false){
            			
            			swal('Info',obj.message,'success');
            			
            		}
            		else {
            			 
            			swal('Error',obj.message,'error');
            			
            		}
            	},
            	complete : function(){

            	}
            }); 
            // waitingDialog.hide();
            return false;

    }); 

	



});

 

function lihatpeta(id){
	// vid = "#"+id;
	koordinat = $("#koordinat").val();

	if(koordinat==""){
		swal('Error','Data koodinat tidak ada ','error');
	}

	else {


    // koordinat = koordinat.replace("\n","/");
    koordinat = koordinat.split("\n").join("/");

	 

    window.open('<?php echo site_url("peta/lihat_by_kordinat"); ?>'+'?kordinat='+koordinat, '_blank', 'width=1024,height=600,scrollbars=yes,menubar=no,status=yes,resizable=yes,screenx=0,screeny=0');
    }
}
 
	
</script>
