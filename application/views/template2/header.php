<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Title -->
        <title>Alpha | Responsive Admin Dashboard Template</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />


        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
        <link href="<?php echo base_url(); ?>assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet">


        <!-- Theme Styles -->
        <link href="<?php echo base_url(); ?>assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css"/>

        <script>
            //para testeo local
            var URL = "http://localhost:8080/Parking/";
            var base_url = "http://localhost:8080/Parking/";
            
            //para testeo en hosting
            //var URL = "http://parking.rtcingenieros.cl/";
            //var base_url = "http://parking.rtcingenieros.cl/";
        </script>






        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
        <?php
        $user = $this->session->userdata("usuario");
        ?>


        <div class="loader-bg"></div>
        <div class="loader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-teal lighten-1">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>





        <div class="mn-content fixed-sidebar">
            <header class="mn-header navbar-fixed">
                <nav class="cyan darken-1">
                    <div class="nav-wrapper row">
                        <section class="material-design-hamburger navigation-toggle">
                            <a href="javascript:void(0)" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                                <span class="material-design-hamburger__layer"></span>
                            </a>
                        </section>
                        <div class="header-title col s3 m3">      
                            <span class="chapter-title">Administrador</span>
                        </div>

                    </div>
                </nav>
            </header>

            <!-- BARRA LATERAL IZQUIERDA MENU  --> 
            <aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">
                    <div class="sidebar-profile">
                        <div class="sidebar-profile-image">
                            <img src="assets/images/profile-image.png" class="circle" alt="">
                        </div>
                        <div class="sidebar-profile-info">
                            <a href="javascript:void(0);" class="account-settings-link">
                                <p><?php echo $user[0]->nombre ?></p>
                                <span><?php echo $user[0]->email ?><i class="material-icons right">arrow_drop_down</i></span>
                            </a>
                        </div>
                    </div>
                    <div class="sidebar-account-settings">
                        <ul>
                            <li class="no-padding">
                                <a href="<?php echo base_url(); ?>logout" class="waves-effect waves-grey">
                                    <i class="material-icons">exit_to_app</i>
                                    Cerrar Sesión
                                </a>
                            </li>
                        </ul>
                    </div>
                    <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
                        <li class="no-padding active"><a class="waves-effect waves-grey active" href="<?php echo base_url(); ?>administrador"><i class="material-icons">home</i>Inicio</a></li>
                        <!-- MENU SERVICIOS PRINCIPALES -->
                        <li class="no-padding active"><a class="waves-effect waves-grey active" href="#" id="item_reg_servicio"><i class="material-icons">directions_car</i>Ingreso</a></li>
                        <!-- -->
                        <!-- MENU SERVICIOS ARRIENDO -->
                        <li class="no-padding">
                            <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">explicit</i>Arriendo<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="#">Ingresar</a></li>
                                    <li><a href="#">Ver Contratos</a></li>
                                    <li><a href="#">Pagar Mes</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- -->
                        <!-- MENU REPORTES -->
                        <li class="no-padding">
                            <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">code</i>Reportes<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="#">Ingresos (Fecha)</a></li>
                                    <li><a href="#">Vehiculos</a></li>
                                </ul>
                            </div>
                        </li>
                        <!--  -->
                        <!-- MENU CONFIGURACION -->
                        <li class="no-padding active"><a class="waves-effect waves-grey active" href="#" id="item_config"><i class="material-icons">settings</i>Configuración</a></li>
                        <!--  -->

                    </ul>
                    <div class="footer">
                        <p class="copyright">Steelcoders ©</p>
                        <p class="copyright">SOCOIN Empresas ©</p>
                    </div>
                </div>
            </aside>



            <main class="mn-inner inner-active-sidebar">
