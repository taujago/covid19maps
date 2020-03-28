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
		<h3 class="card-title">DATA PENGECER</h3>
		<div class="card-options">
			<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
		 
		</div>
	</div>
	<div class="card-body">
		 <div class="row">
		 	<div class="col-md-12 col-lg-12">
		 		<div class="form-group">
						<label for="kode_pengecer" class="form-label">Kode  pengecer</label>
						 <input type="text" name="kode_pengecer" id="kode_pengecer" placeholder="Kode pengecer" class="form-control" value="<?php echo isset($kode_pengecer)?$kode_pengecer:"" ?>">
					</div>
		 	</div>
		 	<div class="col-md-12 col-lg-12">
		 		<div class="form-group">
						<label for="nama_pengecer" class="form-label">Nama kios / pengecer</label>
						 <input type="text" name="nama_pengecer" id="nama_pengecer" placeholder="Nama pengecer" class="form-control" value="<?php echo isset($nama_pengecer)?$nama_pengecer:"" ?>">
					</div>
		 	</div>
		 	 

		 	
		 	 

		 	 
		 	<input type="hidden" name="id_pengecer" id="id_pengecer" value="<?php echo isset($id_pengecer)?$id_pengecer:"" ?>">
		 	 
		 </div>
	</div>
</div>


 

<div class="row">
	<div class="col-md-3">
		<button type="submit" class="btn btn-block btn-primary"><i class="fa fa-paper-plane"></i> SIMPAN</button>
	</div>
	<div class="col-md-3">
		<a  href="<?php echo site_url("$this->class") ?>" class="btn btn-block btn-danger"><i class="fa fa-chevron-left"></i> KEMBALI</a>
	</div>
</div>

<?php $this->load->view("$this->class/".$this->class."_form_view_js"); ?>
  