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
		<title>SIMTAN</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<!--font-family -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

		<!-- Dashboard Css -->
		<link href="<?php echo base_url(); ?>assets/css/dashboard.css" rel="stylesheet" />

		<!-- Custom scroll bar css-->
		<link href="<?php echo base_url(); ?>assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

		<!-- Sidemenu Css -->
		<link href="<?php echo base_url(); ?>assets/plugins/toggle-sidebar/css/sidemenu.css" rel="stylesheet">

		<!-- c3.js Charts Plugin -->
		<link href="<?php echo base_url(); ?>assets/plugins/charts-c3/c3-chart.css" rel="stylesheet" />

		<!---Font icons-->
		<link href="<?php echo base_url(); ?>assets/plugins/iconfonts/plugin.css" rel="stylesheet" />

		<link href="<?php echo base_url(); ?>/assets/plugins/sweetalert2/sweetalert2.css" rel="stylesheet" />


		<!-- Dashboard Core -->
		<script src="<?php echo base_url(); ?>assets/js/vendors/jquery-3.2.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/vendors/bootstrap.bundle.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/vendors/jquery.sparkline.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/vendors/selectize.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/vendors/jquery.tablesorter.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/vendors/circle-progress.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/rating/jquery.rating-stars.js"></script>
		

		<!-- Custom scroll bar Js-->
		<script src="<?php echo base_url(); ?>assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>


		<script src="<?php echo base_url(); ?>/assets/plugins/sweetalert2/sweetalert2.all.js"></script>



	 <!-- Index Scripts -->
		<script src="<?php echo base_url(); ?>assets/js/index.js"></script>
	 		 
						 
			<!-- Custom js -->
		<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>	

		 

	 

       

	



	</head>
	<body class="app sidebar-mini rtl">
		<div id="global-loader" ></div>
		<div class="page">
			<div class="page-main">
				<!-- Navbar-->
				<header class="app-header header">

					<!-- Sidebar toggle button-->
					<!-- Navbar Right Menu-->
					<div class="container-fluid">
						<div class="d-flex">
							<a class="header-brand" href="<?php echo site_url("admin"); ?>">
								<img alt="vobilet logo" class="header-brand-img" src="<?php echo base_url(); ?>assets/images/logobaru.png">
							</a>
							<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
							<div class="d-flex order-lg-2 ml-auto">
								 
								 
								<div class="dropdown">
									<a class="nav-link pr-0 leading-none d-flex" data-toggle="dropdown" href="#">
										<span class="avatar avatar-md brround" style="background-image: url(assets/images/faces/male/suhadi.png)"></span>
										<span class="ml-2 d-none d-lg-block">
											<span class="text-dark"><?php echo $userdata['nama'] ?></span>
										</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<a class="dropdown-item" href="#"><i class="dropdown-icon mdi mdi-account-outline"></i> Profile</a>
										 
										<a class="dropdown-item" href="<?php echo site_url("login/logout"); ?>"><i class="dropdown-icon mdi mdi-logout-variant"></i> Sign out</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</header>

				<!-- Sidebar menu-->
				<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
				<aside class="app-sidebar">
					<div class="app-sidebar__user">
						<div class="dropdown">
							<a class="nav-link p-0 leading-none d-flex" data-toggle="dropdown" href="#">
								<span class="avatar avatar-md brround" style="background-image: url(<?php echo base_url(); ?>/assets/images/faces/male/suhadi.png)"></span>
								<span class="ml-2 "><span class="text-dark app-sidebar__user-name font-weight-semibold"><?php echo $userdata['nama'] ?></span><br>
									<span class="text-muted app-sidebar__user-name text-sm">Administrator <?php echo $userdata['tahun'] ?></span>
								</span>
							</a>
							 
						</div>
					</div>
					<ul class="side-menu">
						<!-- <li class="slide">
							<a class="side-menu__item active" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-home"></i><span class="side-menu__label">DASHBOARD</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item" href="index.html">Home 1</a></li>
								<li><a class="slide-item" href="index2.html">Home 2</a></li>
								<li><a class="slide-item" href="index3.html">Home 3</a></li>
								<li><a class="slide-item" href="index4.html">Home 4</a></li>
							</ul>
						</li> -->

 				 <li>
							<a class="side-menu__item <?php echo ($class=="admin")?"active":""; ?>" href="<?php echo base_url("admin"); ?>" ><i class="side-menu__icon fa fa-home"></i><span class="side-menu__label">DASHBOARD</span></a>
						</li>


						<li class="slide">
							<a class="side-menu__item <?php echo ($class=="master" || $class=="penyuluh" || $class=="desa" || $class=="pengecer")?"active":""; ?>" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-sticky-note"></i><span class="side-menu__label">DATA MASTER</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item <?php echo ($class=="desa")?"active":""; ?>" href="<?php echo site_url("desa"); ?>">DATA DESA</a></li>
								<li><a class="slide-item" href="<?php echo site_url('Gapoktan') ?>">GAPOKTAN</a></li>
								<li><a class="slide-item" href="<?php echo site_url('Poktan') ?>">POKTAN</a></li>
								<li><a class="slide-item active" href="<?php echo site_url("pengecer") ?>">KIOS PENGECER</a></li>
								<li><a class="slide-item" href="<?php echo site_url("Penyuluh") ?>">PENYULUH</a></li>
								<li><a class="slide-item" href="<?php echo site_url("Msumberdana") ?>">SUMBER DANA</a></li>
								<li><a class="slide-item" href="<?php echo site_url("Mjenisfisik") ?>">JENIS FISIK</a></li>
								<li><a class="slide-item" href="<?php echo site_url("Mjenisalsintan") ?>">JENIS ALSINTAN</a></li>
							</ul>
						</li>
						 <li>
							<a class="side-menu__item <?php echo ($class=="petani")?"active":""; ?>"  href="<?php echo site_url("petani"); ?>"><i class="side-menu__icon fa fa-user"></i><span class="side-menu__label">DATA PERTANIAN</span></a>
						</li>
						<li>
							<a class="side-menu__item <?php echo ($class=="datafisik")?"active":""; ?>"  href="<?php echo site_url("Datafisik"); ?>"><i class="side-menu__icon fa fa-cog"></i><span class="side-menu__label">SARANA & PERALATAN</span></a>
						</li>
						<li>
							<a class="side-menu__item <?php echo ($class=="Target")?"active":""; ?>"  href="<?php echo site_url("Target"); ?>"><i class="side-menu__icon fa fa-bullseye"></i><span class="side-menu__label">TARGET TANAM, PANEN DAN PRODUKSI</span></a>
						</li>

						<li class="slide">
							<a class="side-menu__item <?php echo ($class=="grafikpetani"||$class=="grafikpenyuluh"||$class=="GrafikDataFisik")?"active":""; ?>" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-area-chart"></i><span class="side-menu__label">Grafik</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item <?php echo ($class=="grafikpetani")?"active":""; ?>" href="<?php echo site_url('GrafikPetani') ?>">Petani</a></li>
								<li><a class="slide-item <?php echo ($class=="grafikpenyuluh")?"active":""; ?>" href="<?php echo site_url('grafikpenyuluh') ?>">Penyuluh</a></li>
								<li><a class="slide-item <?php echo ($class=="GrafikDataFisik")?"active":""; ?>" href="<?php echo site_url('GrafikDataFisik') ?>">Petani & Bangunan Fisik</a></li>
								<li><a class="slide-item <?php echo ($class=="grafikpetani")?"active":""; ?>" href="<?php echo site_url('GrafikAlsintanPetani') ?>">Petani & Alsintan</a></li>
								
							</ul>
						</li>


						<li class="slide">
							<a class="side-menu__item <?php echo ($class=="grafikpetani"||$class=="grafikpenyuluh"||$class=="GrafikDataFisik")?"active":""; ?>" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-area-chart"></i><span class="side-menu__label">LAPORAN ALSINTAN</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item <?php echo ($class=="grafikpetani")?"active":""; ?>" href="<?php echo site_url('GrafikPetani') ?>">PER POKTAN</a></li>
								<li><a class="slide-item <?php echo ($class=="grafikpenyuluh")?"active":""; ?>" href="<?php echo site_url('grafikpenyuluh') ?>">PER DESA/GAPOKTAN</a></li>
								<li><a class="slide-item <?php echo ($class=="GrafikDataFisik")?"active":""; ?>" href="<?php echo site_url('GrafikDataFisik') ?>">KECAMATAN</a></li>
								<li><a class="slide-item <?php echo ($class=="grafikpetani")?"active":""; ?>" href="<?php echo site_url('GrafikAlsintanPetani') ?>">Petani & Alsintan</a></li>
								<li><a class="slide-item <?php echo ($class=="grafikpetani")?"active":""; ?>" href="<?php echo site_url('GrafikAlsintanPetani') ?>">Petani & Alsintan</a></li>
								<li><a class="slide-item <?php echo ($class=="grafikpetani")?"active":""; ?>" href="<?php echo site_url('GrafikAlsintanPetani') ?>">Petani & Alsintan</a></li>
								
							</ul>
						</li>
						
					</ul>
				</aside>
				<div class="app-content my-3 my-md-5">
					<div class="side-app">
						<!-- <div class="page-header">
							<h4 class="page-title">Dashboard</h4>
							 
						</div> -->

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
<!-- Side menu js -->
	<script src="<?php echo base_url(); ?>assets/plugins/toggle-sidebar/js/sidemenu.js"></script>
				  
							 
							 
					</div>
					<!--footer-->
					<footer class="footer">
						<div class="container">
							<div class="row align-items-center flex-row-reverse">
								<div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
									Copyright © 2018 <a href="#">Vobilet</a>. Designed by <a href="#">Spruko</a> All rights reserved.
								</div>
							</div>
						</div>
					</footer>
					<!-- End Footer-->
				</div>
			</div>


		</div>
		<!-- Back to top -->
		<a href="#top" id="back-to-top" style="display: inline;"><i class="fa fa-angle-up"></i></a>

		
	</body>
</html>