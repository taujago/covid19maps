<form id="frm_data" method="post" enctype="multipart/form-data">

	<input type="hidden" id="id" name="id" value="<?= isset($id)?$id:""; ?>">
		 
	<div class="card">
		<div class="card-status bg-teal br-tr-7 br-tl-7"></div>
		<div class="card-header">
			<h3 class="card-title">Koordinat</h3>
			<div class="card-options">
				<a href="#" class="card-options-collapse" data-toggle="card-collapse">
					<i class="fe fe-chevron-up"></i></a>
			</div>
		</div>
		<div class="card-body">
			 <div class="row">
			 	<div class="col-md-12">
			 		<div class="form-group">
						<label for="koordinat" class="form-label">Koordinat ?</label>
						<textarea rows="10" name="koordinat" id="koordinat" class="form-control" placeholder="Contoh : &#13;&#10; -8.682508289999932,116.849103903 &#13;&#10; -8.7427231405604,116.84784446125" required><?php echo isset($koordinat)?$koordinat:""; ?></textarea>
					</div>
			 	</div>

			 	<div class="col-md-12">
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

					 
					echo "<a class='btn btn-success mt-2 mr-2' onclick='lihatpeta();'><i class='fa fa-eye'></i> Lihat di peta</a>";

					echo "<a class='btn btn-primary mt-2 mr-2' onclick='get_koor();'><i class='fa fa-map-o'></i> Ambil koordinat dari google map</a>";

					
					?>
			 	</div>

			 </div>
		</div>
	</div>

	<div class="form-group d-none" id="process">
		<div class="progress progress-md">
			<div class="progress-bar progress-bar-striped progress-bar-animated bg-green" style=""></div>
		</div>
	</div>
	

	<div class="card-footer">
		<div class="row">
		 	<div class="col-md-6 col-lg-6"  >
		 		<button type="button" class="btn btn-lg btn-block btn-success" id="btnsimpan"> <i class="fa fa-save"></i> SIMPAN</button>
		 	</div>
		 	<div class="col-md-6 col-lg-6"  >
		 		<a href="<?= site_url('peta/tabel'); ?>" class="btn btn-lg btn-block btn-danger"> <i class="fa fa-arrow-left"></i> KEMBALI</a>
		 	</div>
		 </div>
	</div>
</form>

<script src="<?= base_url(); ?>/assets/js/vendors/jquery-3.2.1.min.js"></script>

<script type="text/javascript">
	
	function lihatpeta(){
		koordinat = $("#koordinat").val();

		if(koordinat==""){
			swal.fire('Error','Data koodinat tidak ada ','error');
		}

		else{
		    $.ajax({
		    	type : 'POST',
		    	url : '<?= site_url("peta/set_geojson"); ?>',
		    	dataType : 'JSON',
		    	data : {koordinat:koordinat},
		    	success : function(data){
		    		window.open('<?php echo site_url("peta/lihat"); ?>', '_blank');
		    	}
		    });
		    return false;
	    }
	}


	function get_koor(){
		window.open("http://localhost/covid19maps/peta/get_koordinat?k=-8.748349,116.8547","_blank","width=1024,height=600,scrollbars=yes,menubar=no,status=yes,resizable=yes,screenx=0,screeny=0");
		return false;
	}

	$("#btnsimpan").click(function(){
		console.log($("#frm_data").serialize());
		swal.fire({
			title : 'Sedang proses. Harap menunggu',
			allowEscapeKey: false,
			allowOutsideClick: false,
			onOpen: () => {
				swal.showLoading();
			}});

		$.ajax({
			url : '<?= site_url('peta/simpan'); ?>',
			data : $("#frm_data").serialize(),
			type : 'post',
			dataType : 'json',
			success : function(obj) {
				swal.close();
				swal.fire({
	                title: 'Sukses!',
	                text: obj.message,
	                timer : 1000,
	                type: 'success',
	                showCancelButton: false,
	                showConfirmButton: false
	            });
				setTimeout(function(){location.reload();},1000);
			}
		});
		return false;

	});	
</script>