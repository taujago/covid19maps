<link href="<?php echo base_url(); ?>/assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />

<!-- Data tables -->
<script src="<?php echo base_url(); ?>/assets/plugins/datatable/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
<link href="<?php echo base_url(); ?>/assets/plugins/tabs/style.css" rel="stylesheet" />
<form id="form_target">

<div class="row row-cards">
	<div class="col-md-12">
		<div class="card">
			<div class="card-status bg-primary br-tr-7 br-tl-7"></div>
			<div class="card-header">
					<h3 class="card-title">Filter</h3>
					
			</div>
			<div class="card-body">

				
		<form id="frmsebaran" method="post" >		

			<div class="row">
					<div class="col-md-3">
						<H3>KECAMATAN</H3> 
						 
					</div>	

					<div class="col-md-2">
						<H3 class="text-success">ODP</H3> 
					</div>
					<div class="col-md-2">
						<H3 class=text-warning>PDP</H3> 
					</div>
					<div class="col-md-2">
						<H3 class="text-danger">POSITIF</H3> 
					</div>
			</div>

			<?php foreach($arr_kecamatan  as $id => $kecamatan) : ?>
					<div class="row mt-1">
					<div class="col-md-3">
						<span><?php echo $kecamatan; ?></span> 
						<input type="hidden" name="id_kecamatan[<?php echo $id ?>]" value="<?php echo $id ?>">
					</div>	

					<div class="col-md-2">
						<input type="number" min="0" name="odp[<?php echo $id ?>]" class="form-control" placeholder="ODP">
					</div>
					<div class="col-md-2">
						<input type="number" min="0" name="pdp[<?php echo $id ?>]" class="form-control" placeholder="PDP">
					</div>
					<div class="col-md-2">
						<input type="number" min="0" name="positif[<?php echo $id ?>]" class="form-control" placeholder="Positif">
					</div>

					</div> 	
			<?php endforeach; ?>

			<div class="row mt-2">
				<div class="col-md-2">
					<button id="btnsimpan" class="btn btn-primary btn-block"><i class="fa fa-send"></i> SIMPAN</button>
				</div>
			</div>

		</form>	 
				 
			</div>
		</div>
	</div>
	
</div>

<div id="hasil">
</div>


</form>


<?php $this->load->view("$this->class"."ViewJs"); ?>

