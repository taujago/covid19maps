
<style type="text/css">
	
	.bawah {
		margin-top: 5px;
	}

</style>
<div class="row row-cards">
<div class="col-md-12">
	<div class="card">
		<div class="card-status bg-primary br-tr-7 br-tl-7"></div>
		<div class="card-header">
				<h3 class="card-title">INPUT LUAS TANAM TAHUN <?php echo $tahun; ?></h3>
					
	</div>
	<div class="card-body">
	 
	<div class="row">
	
	<?php 
	$arr_bulan = array(1=>"Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agus","Sep","Okt","Nov","Des");

	$n=0;
	foreach($arr_bulan as $angka =>$nama) : 

	$n++;

	$kelas = ($n>=6)?"bawah":"";

	?>

	<div class="col-md-2">

		<div class="form-group">
		<label class="form-label" for="target[<?php echo $tahun; ?>][<?php echo $angka ?>]"><?php echo $nama; ?></label>
		<input type="number" min="0" class="form-control" name="target[<?php echo $tahun; ?>][<?php echo $angka ?>]" value="<?php echo isset($luas[$tahun][$angka])?$luas[$tahun][$angka]:""; ?>" placeholder="<?php echo $nama; ?>">
	</div>
		
		 
	</div>


	<?php endforeach; ?>
	</div>
		 
 
	</div>
</div>
</div>

</div>

<?php 
$tahun--;
?>
<div class="row row-cards">
<div class="col-md-12">
	<div class="card">
		<div class="card-status bg-primary br-tr-7 br-tl-7"></div>
		<div class="card-header">
				<h3 class="card-title">INPUT LUAS TANAM TAHUN <?php echo $tahun; ?></h3>
					
	</div>
	<div class="card-body">
	 
	<div class="row">
	
	<?php 
	$arr_bulan = array(1=>"Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agus","Sep","Okt","Nov","Des");

	$n=0;
	foreach($arr_bulan as $angka =>$nama) : 

	$n++;

	$kelas = ($n>=6)?"bawah":"";

	?>

	<div class="col-md-2">

		<div class="form-group">
		<label class="form-label" for="target[<?php echo $tahun; ?>][<?php echo $angka ?>]"><?php echo $nama; ?></label>
		<input type="number" min="0" class="form-control" name="target[<?php echo $tahun; ?>][<?php echo $angka ?>]" value="<?php echo isset($luas[$tahun][$angka])?$luas[$tahun][$angka]:""; ?>"  placeholder="<?php echo $nama; ?>">
	</div>
		
	 
	</div>


	<?php endforeach; ?>
	</div>
		 


	</div>
</div>
</div>

</div>


<div class="row">
	<div class="col-md-12">
		<button type="submit" id="btnSimpan" class="btn btn-primary"><i class="fa fa-paper-plane"></i>SIMPAN</button>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){

$('#btnSimpan').click(function(){
		swal.fire('hello');
			$.ajax({
					url : '<?php echo site_url("$this->class/simpan_target") ?>',
					data : $('#form_target').serialize(),
					type : 'post',
					dataType : 'json',
					success : function(obj){
						swal.fire('Info',obj.message,'success');
					},
				error: function(e){
					swal.fire('Error','Server Error'+e,'error');
				}
				});
			return false;
		});

});
	

</script>