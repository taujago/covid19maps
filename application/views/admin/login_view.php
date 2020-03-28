<!doctype html>
<html lang="en" dir="ltr">
  <head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		
		<meta name="msapplication-TileColor" content="#0061da">
		<meta name="theme-color" content="#1643a3">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<link rel="icon" href="<?php echo base_url("assets/images/"); ?>favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
		
		<!-- Title -->
		<title>Sistem Informasi Pertanian - SIMTAN </title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/fonts/fonts/font-awesome.min.css">
		
		<!-- Font Family -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
		
		<!-- Custom scroll bar css-->
		<link href="<?php echo base_url(); ?>/assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />
		
		<!-- Dashboard Css -->
		<link href="<?php echo base_url(); ?>/assets/css/dashboard.css" rel="stylesheet" />
		
		<!-- c3.js Charts Plugin -->
		<link href="<?php echo base_url(); ?>/assets/plugins/charts-c3/c3-chart.css" rel="stylesheet" />
		
		<!---Font icons-->
		<link href="<?php echo base_url(); ?>/assets/plugins/iconfonts/plugin.css" rel="stylesheet" />

		<link href="<?php echo base_url(); ?>/assets/plugins/sweet-alert/sweetalert.css" rel="stylesheet" />
	

		<!-- Dashboard js -->
		<script src="<?php echo base_url(); ?>/assets/js/vendors/jquery-3.2.1.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/js/vendors/bootstrap.bundle.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/js/vendors/jquery.sparkline.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/js/vendors/selectize.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/js/vendors/jquery.tablesorter.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/js/vendors/circle-progress.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/rating/jquery.rating-stars.js"></script>
		
		<!-- Custom scroll bar Js-->
		<script src="<?php echo base_url(); ?>/assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<script src="<?php echo base_url(); ?>/assets/plugins/sweet-alert/sweetalert.min.js"></script>

		<script src="<?php echo base_url(); ?>/assets/js/jquery.md5.js"></script>
		
		<!-- custom js -->
		<script src="<?php echo base_url(); ?>/assets/js/custom.js"></script>


  </head>
	<body class="login-img">
		<div id="global-loader" ></div>
		<div class="page">
			<div class="page-single">
				<div class="container">
					<div class="row">
						<div class="col col-login mx-auto">
							<div class="text-center mb-6">
								<!-- <img src="<?php echo base_url(); ?>/assets/images/brand/logo.png" class="h-6" alt=""> -->
							</div>
							<form id="login" class="card" method="post">
								<div class="card-body p-6">
									<div class="card-title text-center">SISTEM INFORMASI PERTANIAN</div>
									<div class="form-group">
										<label class="form-label">Nama pengguna</label>
										<input type="text" class="form-control" id="username"  placeholder="Enter email">
									</div>
									<div class="form-group">
										<label class="form-label">Kata sandi
											 
										</label>
										<input type="password" class="form-control" id="password" placeholder="Password">
									</div>

									<div class="form-group">
										<label class="form-label">Tahun
											 
										</label>
										<select class="form-control" id="tahun" name="tahun">
											<?php 
											for ($i=2002; $i <= date('Y'); $i++) { ?>
												<option value="<?php echo $i ?>"><?php echo $i ?></option>
											<?php }
											?>
										  
										  <!-- <option value="saab">Saab</option>
										  <option value="opel">Opel</option>
										  <option value="audi">Audi</option> -->
										</select>
										<!-- <input type="text" class="form-control" id="tahun" placeholder="Tahun"> -->
									</div>
									<div class="form-group">
										<label class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" />
											<span class="custom-control-label">Remember me</span>
										</label>

										<input type="hidden" id="hash" name="hash" value="<?php echo $hash; ?>">
									</div>
									<div class="form-footer">
										<button type="submit" class="btn btn-primary btn-block">Masuk</button>
									</div>
									 
								</div>
								
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
<script type="text/javascript">
	$("#login").submit(function(){
		// /swal('hello...');
		// swal('Congratulations!', 'Your message has been succesfully sent', 'success');

		username = $("#username").val();
		tahun = $("#tahun").val();
		password = $.md5($("#password").val());
		hash = $("#hash").val();

		secret = $.md5(password+hash);

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
 
