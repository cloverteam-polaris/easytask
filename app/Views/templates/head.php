<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyTask</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/animation/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/ratting/css/bars-1to10.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
	<script src="<?php echo base_url(); ?>assets/js/vendor-all.min.js"></script>

</head>

<body>
    <nav class="pcoded-navbar menupos-fixed menu-dark menu-item-icon-style6 mob-open">
        <div class="navbar-wrapper ">
            <div class="navbar-brand header-logo">
                <a href="" class="b-brand">
                    <!--<img src="assets/images/logo.svg" alt="logo" class="logo images">
                    <img src="assets/images/logo-icon.svg" alt="logo" class="logo-thumb images">-->
                    <p>EasyTask</p>
                </a>
            </div>
            <div class="navbar-content scroll-div ps ps--active-y" id="layout-sidenav">
                <ul class="nav pcoded-inner-navbar sidenav-inner">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Navegacion</label>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#!"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span
                        class="pcoded-mtext">Dashboard</span></a>
                    </li>
                    <li data-username="dashboard default ecommerce sales Helpdesk ticket CRM analytics project"
                        class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-settings"></i></span><span
                                class="pcoded-mtext">Tareas</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="<?php echo base_url(); ?>index.php/adsdtarea" class="nav-link">Agregar Tarea</a></li>
                            <li class=""><a href="<?php echo base_url(); ?>index.php/lisstadotareas" class="nav-link">Listado Tareas</a></li>
                        </ul>
                    </li>  
                     <li data-username="dashboard default ecommerce sales Helpdesk ticket CRM analytics project"
                        class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-settings"></i></span><span
                                class="pcoded-mtext">Equipos</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="<?php echo base_url(); ?>index.php/addstarea" class="nav-link">Agregar Equipo</a></li>
                            <li class=""><a href="<?php echo base_url(); ?>index.php/listsadotareas" class="nav-link">Listado Equipos</a></li>
                        </ul>
                    </li>   
                </ul>
            </div>
        </div>
    </nav>
    <header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed">

        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
            <a href="index.html" class="b-brand">

                <img src="assets/images/logo.svg" alt="" class="logo images">
                <img src="assets/images/logo-icon.svg" alt="" class="logo-thumb images">
            </a>
        </div>
        <a class="mobile-menu" id="mobile-header" href="#!">
            <i class="feather icon-more-horizontal"></i>
        </a>
        <div class="collapse navbar-collapse">
            <a href="#!" class="mob-toggler"></a>
            <ul class="navbar-nav me-auto">
                <li class="nav-item">

                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li>
                    <div class="dropdown drp-user">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="icon feather icon-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end profile-notification">
                            <ul class="pro-body">
                                <li><a href="<?php echo URL ?>index.php/logout" class="dropdown-item"><i
                                            class="feather icon-power text-danger"></i> Cerrar Session</a></li>
                            </ul>
                        </div>
                    </div>

                </li>
            </ul>
        </div>

    </header>