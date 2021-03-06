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
		<title>COVID 19 GEOMAP</title>
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
	<body class="">
		<div id="global-loader" ></div>
		<div class="page">
			<div class="page-main">
				<div class="header py-4">
					<div class="container">
						<div class="d-flex">
							<a class="header-brand" href="<?php echo site_url(); ?>">
								<img alt="vobilet logo" class="header-brand-img" src="<?php echo base_url(); ?>assets/images/fight-covid19.png">
							</a>
							<div class="d-flex order-lg-2 ml-auto">
								 
								 
								 
								<div class="dropdown">
									<a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
										<span class="avatar avatar-md brround" style="background-image: url(assets/images/faces/female/25.jpg)"></span>

										<span class="ml-2 d-none d-lg-block">
											<span class="text-dark app-sidebar__user-name font-weight-semibold">
												<?php echo strtoupper($userdata['nama']) ?>
											</span><br>
											<span class="text-muted app-sidebar__user-name" style="font-size: 12px">
												<?= $userdata['level'] == 9 ? 'Administrator' : 'Operator'; ?>
											</span>
										</span>

									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<a class="dropdown-item" href="#">
											<i class="dropdown-icon mdi mdi-account-outline "></i> Profile
										</a>
										 
										 
										<a class="dropdown-item" href="<?php echo site_url('login/logout'); ?>">
											<i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign out
										</a>
									</div>
								</div>
							</div>
							<a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
							<span class="header-toggler-icon"></span>
							</a>
						</div>
					</div>
				</div>
				<div class="vobilet-navbar" id="headerMenuCollapse">
					<div class="container">
<ul class="nav">

	<li class="nav-item">
		<a class="nav-link" href="<?php echo site_url('Sebaran'); ?>">
			<i class="fa fa-home"></i>
			<span>DASHBOARD</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?php echo site_url('Peta/tabel'); ?>">
			<i class="fa fa-cubes"></i>
			<span>DATA KECAMATAN</span>
		</a>
	</li>
	 


	 
	
</ul>
					</div>
				</div>
				<div class="my-3 my-md-5">




						<div class="container">
						 
							 
<div class="row mt-5">
<div class="col-lg-12 col-sm-12">
	<div class="card">
		<div class="card-body" >
			 

<div class="card-header">
<h3 class="card-title"><?php echo $subtitle; ?></h3>
</div>

<div class="card-body" style="
    padding-top: 10px;
    padding-left: 0px;
    padding-right: 0px;
    padding-bottom: 0px;
">
<?php echo $content; ?>
</div>







		</div>
	</div>
</div>
</div>




						 
					</div>




				</div>
			</div>

			<!--footer-->
			<footer class="footer">
				<div class="container">
					<div class="row align-items-center flex-row-reverse">
						<div class="col-lg-12 col-sm-12 mt-3 mt-lg-0 text-center">
							Copyright © 2020 <a href="https://covid19.sumbawabaratkab.go.id">Dibuat dan dikelola oleh Satgas Covid19. Kabupaten Sumbawa Barat</a>
						</div>
					</div>
				</div>
			</footer>
			<!-- End Footer-->
		</div>

		
		
		<!-- Custom Js-->
		<script src="<?php echo base_url(); ?>/assets/js/custom.js"></script>
	</body>
</html>