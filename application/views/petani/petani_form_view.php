<link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
<!-- select2 Plugin -->
<link href="<?php echo base_url("assets") ?>/plugins/select2/select2.min.css" rel="stylesheet" />

<script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>

<!--Select2 js -->
<script src="<?php echo base_url("assets") ?>/plugins/select2/select2.full.min.js"></script>

<script src="<?php echo base_url("assets") ?>/js/jquery.form.js"></script>


<div class="row mb-5">
	 
	<div class="col-md-2">
		<a  href="<?php echo site_url("$this->class") ?>" class="btn btn-block btn-danger"><i class="fa fa-chevron-left"></i> KEMBALI</a>
	</div>
</div>


<form id="frmpetani" action="<?php echo site_url("$this->class/$action"); ?>"  method="post" enctype="multipart/form-data">  


<div class="card">
	<div class="card-status bg-teal br-tr-7 br-tl-7"></div>
	<div class="card-header">
		<h3 class="card-title">DATA KELOMPOK TANI DAN PENGECER</h3>
		<div class="card-options">
			<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
		 
		</div>
	</div>
	<div class="card-body">

		
		 <div class="row">
		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="id_desa" class="form-label">Kecamatan</label>
						<?php
							echo form_dropdown("id_kecamatan",$arr_kecamatan,isset($id_kecamatan)?$id_kecamatan:"",'id="id_kecamatan" class="form-control"');
						?>
					</div>
		 	</div>
		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="id_desa" class="form-label">Desa/Kelurahan</label>
						<?php
						 	
							echo form_dropdown("id_desa",$arr_desa,isset($id_desa)?$id_desa:"",'id="id_desa" class="form-control selek2"');
						  ?>
					</div>
		 	</div>
		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="id_gapoktan" class="form-label">GAPOKTAN</label>
						<?php


					 
						echo form_dropdown("id_gapoktan",array(),'','class="form-control selek2" id="id_gapoktan"') 
						?>
					</div>
		 	</div>

		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="id_poktan" class="form-label">POKTAN</label>
						<?php


					 
						echo form_dropdown("id_poktan",array(),'','class="form-control selek2" id="id_poktan"') 
						?>
					</div>
		 	</div>

		 	<!-- <div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="id_pengecer" class="form-label">KIOS PENGECER</label>
						<?php

						$id_pengecer = isset($id_pengecer)?$id_pengecer:"";
					 	$arr_pengecer = $this->cm->arr_dropdown("m_pengecer","id_pengecer","nama_pengecer","nama_pengecer");
						echo form_dropdown("id_pengecer",$arr_pengecer,$id_pengecer,'class="form-control selek2" id="id_pengecer"') 
						?>
					</div>
		 	</div> -->

		 	<!-- <div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="id_penyuluh" class="form-label">PENYULUH</label>
						<?php

						$id_penyuluh = isset($id_penyuluh)?$id_penyuluh:"";
					 	$arr_penyuluh = $this->cm->arr_dropdown("m_penyuluh","id_penyuluh","nama_penyuluh","nama_penyuluh");
						echo form_dropdown("id_penyuluh",$arr_penyuluh,$id_penyuluh,'class="form-control selek2" id="id_penyuluh"') 
						?>
					</div>
		 	</div> -->
		 </div>
	</div>
</div>




<div class="card">
	<div class="card-status bg-teal br-tr-7 br-tl-7"></div>
	<div class="card-header">
		<h3 class="card-title">DATA PETANI</h3>
		<div class="card-options">
			<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
		 
		</div>
	</div>
	<div class="card-body">
		 <div class="row">
		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="petani_nik" class="form-label">NIK</label>
						 <input type="text" name="petani_nik" id="petani_nik" class="form-control" placeholder="NIK" value="<?php echo isset($petani_nik)?$petani_nik:""; ?>">
					</div>
		 	</div>
		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="petani_nama" class="form-label">Nama</label>
						 <input type="text" name="petani_nama" id="petani_nama" class="form-control" placeholder="Nama" value="<?php echo isset($petani_nama)?$petani_nama:""; ?>">
					</div>
		 	</div>
		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="petani_ttl" class="form-label">Tempat lahir</label>
						 <input type="text" name="petani_ttl" id="petani_ttl" class="form-control" placeholder="Nama" value="<?php echo isset($petani_ttl)?$petani_ttl:""; ?>">
					</div>
		 	</div>
		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="petani_tgl_lahir" class="form-label">Tanggal lahir</label>
						 <input type="text" name="petani_tgl_lahir" id="petani_tgl_lahir" class="form-control" placeholder="DD-MM-YYYY" data-date-format="dd-mm-yyyy" value="<?php echo isset($petani_tgl_lahir)?$petani_tgl_lahir:""; ?>">
					</div>
		 	</div>
		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="petani_nama_ibu" class="form-label">Nama ibu kandung</label>
						 <input type="text" name="petani_nama_ibu" id="petani_nama_ibu" class="form-control" placeholder="Nama ibu kandung " value="<?php echo isset($petani_nama_ibu)?$petani_nama_ibu:""; ?>">
					</div>
		 	</div>

		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="petani_alamat" class="form-label">Alamat</label>
						 <textarea  name="petani_alamat" id="petani_alamat" class="form-control" placeholder="Alamat lengkap"><?php echo isset($petani_alamat)?$petani_alamat:""; ?></textarea>
					</div>
		 	</div>
		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="Komoditas" class="form-label">Komoditas</label>
						<?php
						echo form_dropdown("komoditas[]",$arr_komoditas,'','class="form-control" id="komoditas" ') 
						?>
						<!-- <input type="text" name="komoditas" id="komoditas" class="form-control" placeholder="Komoditas " value="<?php echo isset($komoditas)?$komoditas:""; ?>"> -->
						<input type="hidden" name="id_petani" id="id_petani" value="<?php echo isset($id_petani)?$id_petani:""; ?>">
					</div>
		 	</div>

		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="Foto" class="form-label">Foto</label>
						<input type="file" name="foto" id="foto" class="form-control" accept="image/*">
					</div>
		 	</div>
		 	 
		 </div>
	</div>
</div>



<!-- <div class="card">
	<div class="card-status bg-teal br-tr-7 br-tl-7"></div>
	<div class="card-header">
		<h3 class="card-title">KOMODITAS DAN KEBUTUHAN PUPUK</h3>
		<div class="card-options">
			<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
		 
		</div>
	</div>
	<div class="card-body">
		 <div class="row">
		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="komoditas" class="form-label">Komoditas</label>
						 <input type="text" name="komoditas" id="komoditas" class="form-control" placeholder="Komoditas" value="<?php echo isset($komoditas)?$komoditas:""; ?>">
					</div>
		 	</div>
		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="luas" class="form-label">Luas (Ha)</label>
						 <input step="0.1" min=0  lang="en-150"  type="number" name="luas" id="luas" class="form-control"  placeholder="Gunakan tanda titik sebagai koma. contoh : 2.4 " value="<?php echo isset($luas)?$luas:""; ?>">
					</div>
		 	</div>
		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="urea" class="form-label">Pupuk Urea (Kg)</label>
						 <input type="text" name="urea" id="urea" class="form-control" placeholder="Pupuk Urea" value="<?php echo isset($urea)?$urea:""; ?>">
					</div>
		 	</div>
		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="sp36" class="form-label">Pupuk SP-36 (Kg)</label>
						 <input type="text" name="sp36" id="sp36" class="form-control" placeholder="Pupuk SP-36" value="<?php echo isset($sp36)?$sp36:""; ?>">
					</div>
		 	</div>

		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="za" class="form-label">Pupuk ZA (Kg)</label>
						 <input type="text" name="za" id="za" class="form-control" placeholder="Pupuk ZA" value="<?php echo isset($za)?$za:""; ?>">
					</div>
		 	</div>

		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="npk" class="form-label">Pupuk NPK (Kg)</label>
						 <input type="text" name="npk" id="npk" class="form-control" placeholder="Pupuk NPK" value="<?php echo isset($npk)?$npk:""; ?>">
					</div>
		 	</div>

		 	<div class="col-md-6 col-lg-6">
		 		<div class="form-group">
						<label for="organik" class="form-label">Pupuk Organik (Kg)</label>
						 <input type="text" name="organik" id="organik" class="form-control" placeholder="Pupuk Organik" value="<?php echo isset($organik)?$organik:""; ?>">
					</div>
		 	</div>
		 	 
		 	 <input type="hidden" name="id_petani" value="<?php echo isset($id_petani)?$id_petani:""; ?>">
		 </div>
	</div>
</div> -->

<div class="row">
	<div class="col-md-3">
		<button type="submit" class="btn btn-block btn-primary"><i class="fa fa-paper-plane"></i> SIMPAN</button>
	</div>
	<div class="col-md-3">
		<a  href="<?php echo site_url("$this->class") ?>" class="btn btn-block btn-danger"><i class="fa fa-chevron-left"></i> KEMBALI</a>
	</div>
</div>

<?php $this->load->view("petani/".$this->class."_form_view_js"); ?>
  