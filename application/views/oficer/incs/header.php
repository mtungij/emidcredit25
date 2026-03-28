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

    .navbar-right {
        display: flex;
        align-items: center;
        margin-left: auto;
        gap: 12px;
    }

    #navbar-menu {
        margin-left: auto;
    }

    #navbar-menu .nav-actions {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-end;
        margin: 0;
    }

    #navbar-menu .nav-action-item {
        margin-left: 8px;
    }

    #navbar-menu .nav-action-item:first-child {
        margin-left: 0;
    }

    .pwa-install-link,
    .logout-link {
        display: inline-flex !important;
        align-items: center;
        justify-content: center;
        gap: 6px;
        min-height: 42px;
        padding: 8px 12px !important;
        border-radius: 14px !important;
        white-space: nowrap;
        font-size: 12px !important;
        font-weight: 600 !important;
        text-decoration: none !important;
        transition: all 0.25s ease !important;
    }

    .pwa-install-link {
        color: #fff !important;
        background-color: #dc3545 !important;
        box-shadow: 0 2px 8px rgba(220, 53, 69, 0.28) !important;
    }

    .logout-link {
        color: #fff !important;
        background-color: #343a40 !important;
        box-shadow: 0 2px 8px rgba(52, 58, 64, 0.22) !important;
    }

    .pwa-install-link i,
    .logout-link i {
        font-size: 14px !important;
    }

    .pwa-install-label,
    .logout-label {
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 0.2px;
    }

    .pwa-install-link:hover,
    .pwa-install-link:focus,
    .logout-link:hover,
    .logout-link:focus {
        color: #fff !important;
        text-decoration: none !important;
        transform: translateY(-1px);
    }

    .pwa-install-link:hover,
    .pwa-install-link:focus {
        background-color: #c82333 !important;
        box-shadow: 0 4px 12px rgba(220, 53, 69, 0.4) !important;
    }

    .logout-link:hover,
    .logout-link:focus {
        background-color: #23272b !important;
        box-shadow: 0 4px 12px rgba(52, 58, 64, 0.3) !important;
    }

    .pwa-install-link:active,
    .logout-link:active {
        transform: scale(0.98) !important;
    }

    @media (max-width: 767.98px) {
        #navbar-search {
            display: none !important;
        }

        .navbar-right {
            gap: 8px;
        }

        #navbar-menu .nav-action-item {
            margin-left: 6px;
        }

        .pwa-install-link,
        .logout-link {
            min-height: 38px;
            padding: 8px 10px !important;
            border-radius: 10px !important;
        }

        .logout-label {
        display: none;
    }

        .navbar-brand img {
            max-height: 30px;
            max-width: 100px;
        }
    }

    @media (min-width: 768px) and (max-width: 991.98px) {
        #navbar-search {
            width: 200px !important;
        }

        .navbar-right {
            gap: 10px;
        }

        .pwa-install-link,
        .logout-link {
            padding: 8px 11px !important;
        }

        .navbar-brand img {
            max-height: 36px;
            max-width: 132px;
        }
    }

    @media (min-width: 992px) {
        #navbar-search {
            width: 300px !important;
        }

        .navbar-brand img {
            max-height: 40px;
            max-width: 160px;
        }

        .passport-card {
    position: relative;
    width: 75px;
    height: 75px;
    border-radius: 12px;
    overflow: hidden;
    border: 2px solid #dee2e6;
    box-shadow: 0 4px 10px rgba(0,0,0,0.08);
    cursor: pointer;
    transition: all 0.3s ease;
}

.passport-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.passport-card:hover {
    transform: scale(1.08);
    box-shadow: 0 6px 18px rgba(0,0,0,0.2);
}

/* Overlay */
.passport-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(10, 31, 68, 0.75); /* dark blue */
    display: flex;
    justify-content: center;
    align-items: center;
    opacity: 0;
    transition: 0.3s ease;
}

.passport-card:hover .passport-overlay {
    opacity: 1;
}

.view-text {
    color: #fff;
    font-size: 12px;
    padding: 6px 12px;
    border: 1px solid #fff;
    border-radius: 20px;
}

.card {
    border-radius: 12px;
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
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
