<!doctype html>
<html lang="en">
<head>
<title>Mikoposoft | Employee Panel</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="manifest" href="<?php echo base_url('manifest.json'); ?>">
<meta name="theme-color" content="#00bcd4">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-title" content="Loan Pocket">
<link rel="apple-touch-icon" href="<?php echo base_url('assets/img/pwa-icon-192.png'); ?>">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<!-- VENDOR CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/chartist/css/chartist.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/toastr/toastr.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/color_skins.css">

<!-- Additional CSS for your styles -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/sweetalert/sweetalert.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/jquery-steps/jquery.steps.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/croper.min.css">

<style>
    /* Apply Poppins font globally */
    body {
        font-family: 'Poppins', sans-serif;
    }

    .select2-container .select2-selection--single {
        height: 36px !important;
    }
    .select2-container--default .select2-selection--single {
        border: 2px solid #ccc !important; 
        border-radius: 10px !important;
    }

    .c {
        text-transform: uppercase;
    }

    .pwa-install-link {
        display: inline-flex !important;
        align-items: center;
    justify-content: center;
    gap: 6px;
    white-space: nowrap;
    color: #fff !important;
    background-color: #dc3545 !important;
    padding: 6px 12px !important;
    border-radius: 20px !important;
    font-weight: 600 !important;
    font-size: 12px !important;
    transition: all 0.3s ease !important;
    box-shadow: 0 2px 8px rgba(220, 53, 69, 0.3) !important;
    cursor: pointer !important;
    text-decoration: none !important;
}

.pwa-install-link i {
    font-size: 14px !important;
}

.pwa-install-label {
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 0.3px;
}

.pwa-install-link:hover,
.pwa-install-link:focus {
    color: #fff !important;
    background-color: #c82333 !important;
    transform: scale(1.05) !important;
    box-shadow: 0 4px 12px rgba(220, 53, 69, 0.5) !important;
    text-decoration: none !important;
}

.pwa-install-link:active {
    transform: scale(0.98) !important;
}

/* Extra small devices (phones: < 576px) */
@media (max-width: 575.98px) {
    #navbar-search {
        display: none !important;
    }

    .navbar-right {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    #navbar-menu .nav {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 4px;
    }

    .icon-menu {
        padding: 8px !important;
        font-size: 16px !important;
    }

    .pwa-install-link {
        padding: 6px 8px !important;
        min-height: 38px !important;
        border-radius: 6px !important;
        font-size: 10px !important;
        gap: 4px !important;
    }

    .pwa-install-link i {
        font-size: 12px !important;
    }

    .pwa-install-label {
        display: none;
    }

    .navbar-brand img {
        max-height: 30px;
        max-width: 100px;
    }
}

/* Small devices (tablets portrait: 576px - 767.98px) */
@media (min-width: 576px) and (max-width: 767.98px) {
    #navbar-search {
        display: none !important;
    }

    .navbar-right {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    #navbar-menu .nav {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 6px;
    }

    .icon-menu {
        padding: 10px !important;
        font-size: 18px !important;
    }

    .pwa-install-link {
        padding: 6px 10px !important;
        min-height: 40px !important;
        border-radius: 8px !important;
        font-size: 11px !important;
        gap: 5px !important;
    }

    .pwa-install-link i {
        font-size: 13px !important;
    }

    .pwa-install-label {
        display: none;
    }

    .navbar-brand img {
        max-height: 35px;
        max-width: 120px;
    }
}

/* Medium devices (tablets landscape: 768px - 991.98px) */
@media (min-width: 768px) and (max-width: 991.98px) {
    #navbar-search {
        width: 200px !important;
    }

    .navbar-right {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    #navbar-menu .nav {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 8px;
    }

    .icon-menu {
        padding: 10px !important;
        font-size: 18px !important;
    }

    .pwa-install-link {
        padding: 6px 12px !important;
        min-height: 42px !important;
        border-radius: 10px !important;
        font-size: 11px !important;
    }

    .pwa-install-link i {
        font-size: 13px !important;
    }

    .pwa-install-label {
        display: inline !important;
    }

    .navbar-brand img {
        max-height: 38px;
        max-width: 140px;
    }
}

/* Large devices (desktops: >= 992px) */
@media (min-width: 992px) {
    #navbar-search {
        width: 300px !important;
    }

    .navbar-right {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    #navbar-menu .nav {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 10px;
    }

    .icon-menu {
        padding: 12px !important;
        font-size: 18px !important;
    }

    .pwa-install-link {
        padding: 6px 12px !important;
        min-height: 44px !important;
        border-radius: 20px !important;
        font-size: 12px !important;
    }

    .pwa-install-link i {
        font-size: 14px !important;
    }

    .pwa-install-label {
        display: inline !important;
    }

    .navbar-brand img {
        max-height: 40px;
        max-width: 160px;
    }
}
</style>
</head>
<body class="theme-cyan">

<script src="<?php echo base_url() ?>assets/js/cdn.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/cdn2.min.js"></script>

<!-- Page Loader -->
<!-- <div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="<?php //echo base_url() ?>assets/img/mikopo.png" width="300" height="100" alt="Lucid"></div>
        <p>Please wait...</p>        
    </div>
</div> -->
<!-- Overlay For Sidebars -->
