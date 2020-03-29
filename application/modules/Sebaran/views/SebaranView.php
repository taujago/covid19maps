
<link href="<?php echo base_url(); ?>/assets/plugins/datepicker/datepicker.css" rel="stylesheet" />

<script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/datepicker/bootstrap-datepicker.js"></script>

<style type="text/css">
	
.angka{
	text-align: right;
}

.tebal {
	font-weight: bold;
}

</style> 
<form id="frmsebaran" method="post" >	
<div class="row row-cards">
	<div class="col-md-12">
		<div class="card">
			<div class="card-status bg-primary br-tr-7 br-tl-7"></div>
			<div class="card-header">
					<h3 class="card-title">Waktu Update</h3>
					
			</div>
			<div class="card-body">

				<div class="row">
					
					<div class="col-md-4">
						

						<div class="form-group">
							<label for="tanggal"><strong>Tanggal update (dd-mm-YYYY)</strong> </label>
							<input id="tanggal" type="text" name="tanggal" class="form-control" placeholder="dd-mm-YYYY" data-date-format="dd-mm-yyyy" autocomplete="off" value="<?php echo date("d-m-Y");?>">
						</div>

					</div>

				</div>

			</div>
		</div>
	</div>
</div>


<div class="row row-cards">
	<div class="col-md-12">
		<div class="card">
			<div class="card-status bg-primary br-tr-7 br-tl-7"></div>
			<div class="card-header">
					<h3 class="card-title">Data sebaran</h3>
					
			</div>
			<div class="card-body">

				
			

			<div class="row mb-3">
					<div class="col-md-3">
						<span><strong> KECAMATAN</strong> </span> 
						 
					</div>	

					<div class="col-md-2">
						<span  class="tebal text-success">ODP</span > 
					</div>
					<div class="col-md-2">
						<span  class="tebal text-warning">PDP</span > 
					</div>
					<div class="col-md-2">
						<span  class="tebal text-danger">POSITIF</span > 
					</div>
					<div class="col-md-2">
						<span  class="tebal text-dark">WAFAT</span > 
					</div>
			</div>

			<?php foreach($arr_kecamatan  as $id => $kecamatan) : ?>
					<div class="row mt-1">
					<div class="col-md-3">
						<span><?php echo $kecamatan; ?></span> 
						<input type="hidden" name="id_kecamatan[<?php echo $id ?>]" value="<?php echo $id ?>">
					</div>	

					<div class="col-md-2">
						<input type="number" min="0" name="odp[<?php echo $id ?>]" class="angka form-control" placeholder="ODP" value="<?php echo $arr_sebaran[$id]['odp'] ?>">
					</div>
					<div class="col-md-2">
						<input type="number" min="0" name="pdp[<?php echo $id ?>]" class="angka form-control" placeholder="PDP" value="<?php echo $arr_sebaran[$id]['pdp'] ?>">
					</div>
					<div class="col-md-2">
						<input type="number" min="0" name="positif[<?php echo $id ?>]" class="angka form-control" placeholder="Positif" value="<?php echo $arr_sebaran[$id]['positif'] ?>">
					</div>
					<div class="col-md-2">
						<input type="number" min="0" name="mati[<?php echo $id ?>]" class="angka form-control" placeholder="Wafat" value="<?php echo $arr_sebaran[$id]['mati'] ?>">
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

</form>
<div id="hasil">
</div>




<?php $this->load->view("$this->class"."ViewJs"); ?>

