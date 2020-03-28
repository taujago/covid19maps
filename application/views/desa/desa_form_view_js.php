<script type="text/javascript">
$(document).ready(function(){

 

$('#id_kecamatan').select2({
	         minimumResultsForSearch: ''
 });

$("#frmpetani").submit(function(){


	$.ajax({
		url : $(this).prop('action'),
		data : $(this).serialize(),
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


$("#luas").keyup(function(){
	hitung($(this).val());
});

$("#luas").keydown(function(){
	hitung($(this).val());
});

function hitung(i){
	// console.log('I am pushed '+i);
	if(i=="") i=0;

	luas = parseFloat(i);
	console.log(i);

	var urea = 250;
	var sp36 = 100;
	var za = 250;
	var npk = 300;
	var organik = 500;

	$("#urea").val(luas * urea);
	$("#sp36").val(luas * sp36);
	$("#za").val(luas * za);
	$("#npk").val(luas * npk);
	$("#organik").val(luas * organik);

}



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

//   	id_gapoktan
// id_poktan
// id_pengecer


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