<script type="text/javascript">
	$(document).ready(function(){
		 




$("#btnsimpan").click(function(){

	console.log($("#frmsebaran").serialize());

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