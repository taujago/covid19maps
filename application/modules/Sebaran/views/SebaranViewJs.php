<script type="text/javascript">
	$(document).ready(function(){
		 




$("#btnsimpan").click(function(){

	console.log($("#frmsebaran").serialize());


swal.fire({
	    title : 'Sedang proses. Harap menunggu',
	    allowEscapeKey: false,
	    allowOutsideClick: false,
	    onOpen: () => {
	     swal.showLoading();
	    }});



	$.ajax({
		url : '<?php echo site_url("$this->class/simpan"); ?>',
		data : $("#frmsebaran").serialize(),
		type : 'post',
		dataType : 'json',
		success : function(obj) {
			swal.close();
			swal.fire('Info',obj.message,'success');
			console.log(obj);
		}
	});
return false;

});	 



});





	


	
</script>