<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofilio-<?php echo $title;?></title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/bootstrap.css">
    
    <!-- <link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.min.css"> -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/vendors/fontawesome/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/vendors/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/vendors/toastify/toastify.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/toastr.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/vendors/iconly/bold.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/app.css">
    <link href="<?php echo base_url();?>assets/admin/lightbox/dist/css/lightbox.css" rel="stylesheet" />
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/admin/images/logo/logo.png" type="image/x-icon">

    <style>
        table.dataTable td{
            padding: 15px 8px;
        }
        .fontawesome-icons .the-icon svg {
            font-size: 24px;
        }
        .logo img{  
            width: 100px;
            height: auto !important;
        }
        .messageErreur p{
            color:red;
            font-size:15px;
        }
    </style>

    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/app.css">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/admin/images/logo/logo.png" type="image/x-icon">
</head>
<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="#"><img src="<?php echo base_url();?>assets/admin/images/logo/logo.png" alt="Logo" srcset="">Heating</a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>
                        
                        <li class="sidebar-item">
                            <a href="<?php echo base_url();?>Admin/Articles" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Articles</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="<?php echo base_url();?>Admin/Projets" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Projets</span>
                            </a>
                        </li>
                      
                        <li class="sidebar-item">
                            <a href="<?php echo base_url();?>Admin/Services" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Services</span>
                            </a>
                        </li>
                      
                        <li class="sidebar-item">
                            <a href="<?php echo base_url();?>Admin/Pages" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Pages</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="<?php echo base_url();?>Admin/Menus" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Menus</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="<?php echo base_url();?>Admin/Formations" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Formations</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="<?php echo base_url();?>Admin/Competences" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Compétences</span>
                            </a>
                        </li>
                        <li class="sidebar-title">Paramétres</li>

                        <li class="sidebar-item">
                            <a href="<?php echo base_url();?>Admin/Login/logout" class='sidebar-link'>
                                <i class="icon dripicons-exit"></i>
                                <span>Déconnexion</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="<?php echo base_url();?>Admin/Parametre" class='sidebar-link'>
                                <i class="icon dripicons-exit"></i>
                                <span>Mot de passe</span>
                            </a>
                        </li>


                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
