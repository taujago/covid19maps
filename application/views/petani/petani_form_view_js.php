<script type="text/javascript">
$(document).ready(function(){


$("#komoditas").select2({
  multiple: true,
  allowClear: true,
  tokenSeparators: [',', ' ']
});

<?php if($action == "update") :  
?>

id_desa = '<?php echo $id_desa; ?>';
id_gapoktan = '<?php echo $id_gapoktan; ?>';
id_poktan = '<?php echo $id_poktan; ?>';

$.ajax({
	url : '<?php echo site_url("general/get_gapoktan") ?>',
	data : { id_desa : id_desa, id_gapoktan : id_gapoktan }, 
	type : 'post',
	success : function(htmldata){
		$("#id_gapoktan").html(htmldata);
	}
});

$.ajax({
	url : '<?php echo site_url("general/get_poktan") ?>',
	data : { id_poktan : id_poktan, id_gapoktan : id_gapoktan }, 
	type : 'post',
	success : function(htmldata){
		$("#id_poktan").html(htmldata);
	}
});

 

 var selectedValues = new Array();
		<?php 
			foreach ($komoditas as $key => $value) { ?>
				
				selectedValues[<?php echo $key; ?>] = <?php echo $value ?>;

		<?php	}
		?>

		
		$('#komoditas').val(selectedValues).trigger("change");


<?php endif; ?>



 $("#id_kecamatan").change(function(){
  		$.ajax({
  			url : '<?php echo site_url("general/get_desa") ?>',
  			data : {id_kecamatan : $(this).val() },
  			type : 'post',
  			success : function(htmldata){
  					$("#id_desa").html(htmldata);
  			}
  		});


  });


$("#frmpetani").submit(function(){


	$.ajax({
		url : $(this).prop('action'),
		data : new FormData($(this)[0]),
		contentType: false,
	    processData: false,
		type : 'post',
		dataType : 'json',
		success : function(obj){
			if(obj.error==false) { // berhasil 
				swal.fire('Informasi',obj.message,'success');

				if(obj.mode=="I") { 
					$("#frmpetani").trigger("reset");
					location.href=('#top')
				}  
			}
			else {
				swal.fire('Error',obj.message,'error');
			}
		}
	});
return false;

});






  	$('.selek2').select2({
	         minimumResultsForSearch: ''
   });


 $("#petani_tgl_lahir").datepicker().on('changeDate', function(ev){                 
			 $('#petani_tgl_lahir').datepicker('hide');
});





$("#petani_nama,#petani_ttl,#petani_tgl_lahir,#petani_nama_ibu,#alamat").focusin(function(){
	$.ajax({
		url : '<?php echo site_url("general/get_data_penduduk") ?>',
		type : 'post',
		data : { nik : $("#petani_nik").val() },
		dataType : 'json', 
		success : function(obj){
			console.log(obj);
			$("#petani_nik").val(obj.petani_nik);
			$("#petani_nama").val(obj.petani_nama);
			$("#petani_ttl").val(obj.petani_ttl);
			$("#petani_tgl_lahir").val(obj.petani_tgl_lahir);
			$("#petani_nama_ibu").val(obj.petani_nama_ibu);
			$("#petani_alamat").val(obj.alamat);
		}
	});
});

  $('#id_desa').change(function(){

  		$.ajax({
  			url : '<?php echo site_url("general/get_gapoktan") ?>',
  			data : {id_desa : $(this).val() },
  			type : 'post',
  			success : function(htmldata){
  					$("#id_gapoktan").html(htmldata);
  			}
  		});


  });


  $("#id_gapoktan").change(function(){

  		$.ajax({
  			url : '<?php echo site_url("general/get_poktan") ?>',
  			data : {id_gapoktan : $(this).val() },
  			type : 'post',
  			success : function(htmldata){
  					$("#id_poktan").html(htmldata);
  			}
  		});


  });

});
</script>