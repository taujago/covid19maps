<script type="text/javascript">
	
 


$(document).ready(function(){


 $('#id_kecamatan').change(function (){

		$.ajax({
  			url : '<?php echo site_url("general/get_desa") ?>',
  			data : {id_kecamatan : $(this).val() },
  			type : 'post',
  			success : function(htmldata){
  					$("#id_desa").html(htmldata);
  			}
  		});
		
	});

$('#id_desa').select2({
	         minimumResultsForSearch: ''
 });		 

 var dt = $("#tbpetani").DataTable(
 	{
 		// "order": [[ 0, "desc" ]],
 		// "iDisplayLength": 50,
		"columnDefs": [ { "targets": 0, "orderable": false } ],
		"processing": true,
		// "filter": false,
        "serverSide": true,
        "ajax": '<?php echo site_url("$this->class/get_data") ?>'
 	});
	

$("#btn_cari").click(function(){


	dt.columns(1).search($("#nama").val())
		 .column(2).search($("#id_desa").val())	 
		 .column(3).search($("#id_kecamatan").val())	  
		 .draw();
		 
		return false;
});



$("#btn_reset").click(function(){
	$("#nama").val('');
	$("#id_kecamatan").val('').trigger('change');
	$("#id_desa").val('').trigger('change');
	$("#btn_cari").click();
	return false;
});





 
});

function reload(){
	dt = $("#tbpetani").DataTable();
	dt.ajax.reload(null,false);
}

function hapus(id){
	// swal('ayeeeee');

	swal.fire({
		title: "Peringatan",
		text: "Apakan yakin menghapus ? ",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: 'Hapus',
		cancelButtonText: 'Batal',
		cancelButtonColor: '#d33'
		 
	}).then((result)=>{
		if(result.value){
			// swal.fire('Info','ayee.','success');
			exechapus(id);
		}
	});
	 
}



function exechapus(id){
	$.ajax({
					url : '<?php echo site_url("$this->class/hapus") ?>',
					data : { id_petani : id },
					type : 'post',
					dataType : 'json',
					success : function(obj){
						if(obj.error == false) { // sukses
							
							swal.fire('Info',obj.message,'success');
							reload();
						}
						else {
							swal.fire('Error',obj.message,'error');
						}
					}
				});
}



</script>