<html>
<head>

    <link rel="icon" href="<?= base_url();?>/assets/ksb.png" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url();?>/assets/ksb.png" />

    <title>Peta Sebaran sakit korona</title>

    <script src="<?= base_url(); ?>/assets/js/vendors/jquery-3.2.1.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/vendors/bootstrap.bundle.min.js"></script>
    <link href="<?= base_url(); ?>/assets/plugins/sweetalert2/sweetalert2.css" rel="stylesheet" />   
    <script src="<?= base_url(); ?>/assets/plugins/sweetalert2/sweetalert2.all.js"></script>
    
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/fonts/fonts/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <style type="text/css">
        <?= $css_wrn; ?>
    </style>
    

</head>

<body style="overflow: hidden;">
    <div>
        <iframe 
            id="framepeta"
            style="margin:0px; padding: 0px; height: 85%; width: 100%; overflow: hidden;"
            src="<?= base_url("peta/lihat") ?>">
        </iframe>
    </div>
</body>

</html>