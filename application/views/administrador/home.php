    

<?php
$user = $this->session->userdata("usuario");
?>


<body>
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
                            <a class="waves-effect waves-grey"><i class="material-icons">mail_outline</i>Inbox</a>
                        </li>
                        <li class="no-padding">
                            <a class="waves-effect waves-grey"><i class="material-icons">star_border</i>Starred<span class="new badge">18</span></a>
                        </li>
                        <li class="no-padding">
                            <a class="waves-effect waves-grey"><i class="material-icons">done</i>Sent Mail</a>
                        </li>
                        <li class="no-padding">
                            <a class="waves-effect waves-grey"><i class="material-icons">history</i>History<span class="new grey lighten-1 badge">3 new</span></a>
                        </li>
                        <li class="divider"></li>
                        <li class="no-padding">
                            <a href="<?php echo base_url() ?>logout" class="waves-effect waves-grey"><i class="material-icons">exit_to_app</i>Sign Out</a>
                        </li>
                    </ul>
                </div>
                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
                    <li class="no-padding active"><a class="waves-effect waves-grey active" href="<?php echo base_url(); ?>administrador"><i class="material-icons">settings_input_svideo</i>Inicio</a></li>

                    <!-- MENU SERVICIOS PRINCIPALES -->
                    <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">apps</i>Estacionamiento<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="mailbox.html">Ingresar</a></li>
                                <li><a href="search.html">Pagar</a></li>
                                <li><a href="todo.html">Cancelar</a></li>
                            </ul>
                        </div>
                    </li>
                    <!-- -->
                    <!-- MENU SERVICIOS ARRIENDO -->
                    <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">apps</i>Arriendo<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="mailbox.html">Ingresar</a></li>
                                <li><a href="search.html">Ver Contratos</a></li>
                                <li><a href="todo.html">Pagar Mes</a></li>
                            </ul>
                        </div>
                    </li>
                    <!-- -->
                    <!-- MENU REPORTES -->
                    <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">code</i>Reportes<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="ui-accordions.html">Ingresos (Fecha)</a></li>
                                <li><a href="ui-badges.html">Vehiculos</a></li>
                            </ul>
                        </div>
                    </li>
                    <!--  -->

                </ul>
                <div class="footer">
                    <p class="copyright">Steelcoders ©</p>
                    <p class="copyright">SOCOIN Empresas ©</p>
                </div>
            </div>
        </aside>
        <!-- FIN BARRA LATERAL IZQUIERDA MENU -->
        
        <!-- DESDE AQUI COMIENZA EL CONTENIDO PRINCIPAL -->
        <main class="mn-inner inner-active-sidebar">
            
            
            
            <!-- BARRA LATERAL DERECHA CON MENSAJES Y EVENTOS -->
            <div class="inner-sidebar">
                <span class="inner-sidebar-title">New Messages</span>
                <div class="message-list">
                    <div class="info-item message-item"><img class="circle" src="assets/images/profile-image-2.png" alt=""><div class="message-info"><div class="message-author">Ned Flanders</div><small>3 hours ago</small></div></div>
                    <div class="info-item message-item"><img class="circle" src="assets/images/profile-image.png" alt=""><div class="message-info"><div class="message-author">Peter Griffin</div><small>4 hours ago</small></div></div>
                    <div class="info-item message-item"><img class="circle" src="assets/images/profile-image-1.png" alt=""><div class="message-info"><div class="message-author">Lisa Simpson</div><small>2 days ago</small></div></div>
                </div>
                <span class="inner-sidebar-title">Events</span>
                <span class="info-item">Envato meeting<span class="new badge">12</span></span>
                <div class="inner-sidebar-divider"></div>
                <span class="info-item">Google I/O</span>
                <div class="inner-sidebar-divider"></div>
                <span class="info-item disabled">No more events scheduled</span>
                <div class="inner-sidebar-divider"></div>

                <span class="inner-sidebar-title">Stats <i class="material-icons">trending_up</i></span>
                <div class="sidebar-radar-chart"><canvas id="radar-chart" width="170" height="140"></canvas></div>
            </div>
            <!-- FIN BARRA LATERAL DERECHA -->
            
            
            <!-- FIN CONTENIDO PRINCIPAL -->
        </main>
    </div>
    <div class="left-sidebar-hover"></div>