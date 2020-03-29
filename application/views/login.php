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
		<link rel="icon" href="favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

		<!-- Title -->
		<title>LOGIN COVID 19 GEOMAP</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/fonts/fonts/font-awesome.min.css">
		
		<!-- Font Family-->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

		<!-- Dashboard Css -->
		<link href="<?php echo base_url(); ?>/assets/css/dashboard.css" rel="stylesheet" />
 
		<link href="<?php echo base_url(); ?>/assets/plugins/sweetalert2/sweetalert2.css" rel="stylesheet" />	
		<script src="<?php echo base_url(); ?>/assets/plugins/sweetalert2/sweetalert2.all.js"></script>
		<!---Font icons-->
		<link href="<?php echo base_url(); ?>/assets/plugins/iconfonts/plugin.css" rel="stylesheet" />


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


	</head>
	<body class="login-img">
		<div id="global-loader" ></div>
		<div class="page">
			<div class="page-single">
				<div class="container">
					<div class="row">
						<div class="col col-login mx-auto">
							<form id="login" class="card" method="post" enctype="multipart/form-data">
								<div class="card-body p-6">
									<div class="card-title text-center">LOGIN COVID 19 GEOMAP </div>
									<div class="form-group">
										<label class="form-label">Username</label>
										<input type="text" class="form-control" name="username" placeholder="Enter Username">
									</div>
									<div class="form-group">
										<label class="form-label">Password</label>
										<input type="password" class="form-control" name="password" placeholder="Enter Password">
									</div>
									<div class="form-footer">
										<button type="button" class="btn btn-primary btn-block" id="btn_login">Sign in</button>
									</div>
								</div>
								
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Custom Js-->
		<script src="<?php echo base_url(); ?>/assets/js/custom.js"></script>

		<script type="text/javascript">
			$("#btn_login").click(function(){
				$.ajax({
					url : '<?= site_url('login/cek_login'); ?>',
					data : $("#login").serialize(),
					type : 'post',
					dataType : 'json',
					success : function(obj) {
						if(obj.error==false){
		                    Swal.fire({
		                        title: 'Sukses!',
		                        text: obj.message,
		                        type: 'success',
		                        showCancelButton: false,
		                        showConfirmButton: false
		                    });
		                    setTimeout(function(){
		                    	location.href = '<?php echo site_url('sebaran'); ?>';
		                    },1000);
		                }
		                else {
		                    swal.fire('Error',obj.message,'error');
		                    setTimeout(function(){login_form();},2000);
		                }
					}
				});
				return false;
			});
		</script>
	</body>
</html>