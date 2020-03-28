<div class="row">
	<div class="col-md-12">
		
		<form id="frmpermohonan" action="<?php echo site_url("admin_permohonan/simpan"); ?>" method="post" enctype="multipart/form-data">

		<div class="form-group">
			<label class="form-label" for="nama">Nama Pemohon</label>
			<input type="text" class="form-control" name="nama" placeholder="Nama">
		</div>

		<div class="form-group">
			<label class="form-label" for="nama">Data Koordinat</label>
			<textarea rows="10" id="koordinat" name="koordinat" class="form-control"></textarea>
			 
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
				echo anchor_popup("peta/peta_get_koordinat","<i class='fa fa-map-o'></i> Ambil koordinat dari google map",$atts);
				echo anchor_popup("peta/tambah","<i class='fa fa-file'></i> Baca dari file geojson",$atts);
				echo anchor_popup("peta/readshape","<i class='fa fa-file-code-o'></i>  Baca file .shp",$atts);
			?>
		</div>

		<button class="btn btn-success btn-large" type="submit"><i class='fa fa-floppy-o'></i>  Simpan </button>

		</form>

	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("#frmpermohonan").submit(function(){
			$.ajax({
				url : $(this).prop('action'),
				data : $(this).serialize(), 
				type : 'post',
				dataType : 'json',
				success : function(obj) {
					// console.log(obj);
					alert(obj.pesan);
				}

			});
		return false;	
		}); 
	});
</script>