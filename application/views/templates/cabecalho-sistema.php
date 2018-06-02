<!DOCTYPE html>
<html lang="pt">
    <!-- Back-End -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Blog</title>
        <!-- Bootstrap core CSS-->
        <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

        <!-- Custom fonts for this template-->
        <link href="<?= base_url('assets/vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template-->
        <link href="<?= base_url('assets/css/sb-admin.css') ?>" rel="stylesheet">

    </head>

    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="<?php echo base_url(); ?>dashboard">BLOG ADMIN</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <a class="nav-link" href="<?php echo base_url(); ?>dashboard">
                            <i class="fa fa-fw fa-dashboard"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>


                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseCategoria" data-parent="#exampleAccordion">
                            <i class="fa fa-list-alt"></i>
                            <span class="nav-link-text">Posts</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseCategoria">
                            <li>
                                <a href="<?php echo base_url(); ?>posts/criar">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Novo</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>posts/">
                                    <i class="fa fa-bars" aria-hidden="true"></i> ver</a>
                            </li>
                        </ul>
                    </li>




                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                            <i class="fa fa-wrench" aria-hidden="true"></i>
                            <span class="nav-link-text">Categorias</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseComponents">
                            <li>
                                <a href="<?php echo base_url(); ?>categorias/criar">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Novo</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>categorias">
                                    <i class="fa fa-bars" aria-hidden="true"></i> Listar</a>
                            </li>
                        </ul>
                    </li>






                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
                            <i class="fa fa-users"></i>
                            <span class="nav-link-text">Usuários</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseMulti">
                            <li>
                                <a href="<?php echo base_url(); ?>usuarios/novo">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Novo</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>usuarios">
                                   <i class="fa fa-bars" aria-hidden="true"></i> Listar</a>
                            </li>
                        </ul>
                    </li>


                </ul>
                <ul class="navbar-nav sidenav-toggler">
                    <li class="nav-item">
                        <a class="nav-link text-center" id="sidenavToggler">
                            <i class="fa fa-fw fa-angle-left"></i>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-center" id="sidenavToggler" style="color: white;">
                            <?php echo $this->session->userdata('nome'); ?>
                        </a>

                    </li>


                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-fw fa-sign-out"></i>Sair</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->
