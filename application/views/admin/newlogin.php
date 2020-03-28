<!DOCTYPE html>
<html lang="en">
<head>
	<title>SIMTAN - KABUPATEN SUMBAWA BARAT </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/login/') ?>/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/') ?>/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/') ?>/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/') ?>/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/') ?>/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/') ?>/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/') ?>/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/') ?>/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/') ?>/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/') ?>/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/') ?>/css/main.css">
<!--===============================================================================================-->
<link href="<?php echo base_url(); ?>/assets/plugins/sweet-alert/sweetalert.css" rel="stylesheet" />
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" id="login" method="post">
					<span class="login100-form-title p-b-43">
						Login to continue
					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" id="username">
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" id="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Tahun is required">
						<select class="input100" id="tahun" name="tahun">
											<?php 
											for ($i=2002; $i <= date('Y'); $i++) { ?>

												<option value="<?php echo $i ?>"><?php echo $i ?></option>
											<?php }
											?>
										</select>
						<span class="focus-input100"></span>
						<span class="label-input100">Tahun</span>
					</div>
					<input type="hidden" id="hash" name="hash" value="<?php echo $hash; ?>">

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>
					
					
				</form>

				<div class="login100-more" style="background-image: url('<?php echo base_url('assets/login/') ?>images/coba1.png');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/') ?>/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/') ?>/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/') ?>/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url('assets/login/') ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/') ?>/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/') ?>/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url('assets/login/') ?>/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/') ?>/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/') ?>/js/main.js"></script>

	<script src="<?php echo base_url(); ?>/assets/plugins/sweet-alert/sweetalert.min.js"></script>

		<script src="<?php echo base_url(); ?>/assets/js/jquery.md5.js"></script>
	<script type="text/javascript">
	$("#login").submit(function(){
		// /swal('hello...');
		// swal('Congratulations!', 'Your message has been succesfully sent', 'success');

		username = $("#username").val();
		tahun = $("#tahun").val();
		password = $.md5($("#password").val());
		hash = $("#hash").val();
		// console.log(password);
		// console.log(hash);
		secret = $.md5(password+hash);
		// console.log(secret);

		$.ajax({
			url : '<?php echo site_url("login/ceklogin"); ?>',
			data : { username : username, secret : secret, tahun : tahun }, 
			type : 'post', 
			dataType : 'json',
			success : function(obj){
				 if(obj.error==false) {
				 	swal('Congratulations!', obj.message, 'success');
				 	location.href=obj.url;
				 }
				 else {
				 	swal('Error!', obj.message, 'error');
				 }
			}
		});

		return false;
	});
</script>		

</body>
</html>