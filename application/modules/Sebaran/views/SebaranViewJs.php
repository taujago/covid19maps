<script type="text/javascript">
	$(document).ready(function(){
		 




$("#btnsimpan").click(function(){

	$.ajax({
		url : '<?php echo site_url("$this->class/simpan"); ?>',
		data : $("#frmsebaran").serialize(),
		type : 'post',
		dataType : 'json',
		success : function(obj) {
			console.log(obj);
		}
	});
return false;

});	 



});





	


	
</script>