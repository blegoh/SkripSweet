<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Skripsweet | Mahasiswa - Dashboard</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Maniskan Skripsimu dengan Skripsweet">
    <meta name="author" content="Andre Hardika, Ibnu Firmansyah, Yusuf Eka Sayogana | Sistem Informasi - Universitas Jember">

    <link rel="shortcut icon" href="/assets/img/logo-icon-dark.png">

    <link type='text/css' href='http://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500' rel='stylesheet'>
    <link type='text/css'  href="https://fonts.googleapis.com/icon?family=Material+Icons"  rel="stylesheet">

    <link href="/assets/fonts/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet">        <!-- Font Awesome -->
    <link href="/assets/css/styles.css" type="text/css" rel="stylesheet">                                     <!-- Core CSS with all styles -->

    <link href="/assets/plugins/codeprettifier/prettify.css" type="text/css" rel="stylesheet">                <!-- Code Prettifier -->

    <link href="/assets/plugins/dropdown.js/jquery.dropdown.css" type="text/css" rel="stylesheet">            <!-- iCheck -->
    <link href="/assets/plugins/progress-skylo/skylo.css" type="text/css" rel="stylesheet">                   <!-- Skylo -->

    <!--[if lt IE 10]>
    <script src="/assets/js/media.match.min.js"></script>
    <script src="/assets/js/respond.min.js"></script>
    <script src="/assets/js/placeholder.min.js"></script>
    <![endif]-->
    <!-- The following CSS are included as plugins and can be removed if unused-->

    <link href="/assets/plugins/form-daterangepicker/daterangepicker-bs3.css" type="text/css" rel="stylesheet">    <!-- DateRangePicker -->
    <link href="/assets/plugins/fullcalendar/fullcalendar.css" type="text/css" rel="stylesheet">                   <!-- FullCalendar -->
    <link href="/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" type="text/css" rel="stylesheet">
    <link href="/assets/less/card.less" type="text/css" rel="stylesheet">

    <link href="/assets/plugins/chartist/dist/chartist.min.css" type="text/css" rel="stylesheet"> <!-- chartist -->

    @yield('style')
</head>

<body class="animated-content infobar-overlay">
<header id="topnav" class="navbar navbar-fixed-top navbar-blue" role="banner">
    <!-- <div id="page-progress-loader" class="show"></div> -->
    <div class="logo-area">

			<span id="trigger-sidebar" class="toolbar-trigger toolbar-icon-bg stay-on-search">
				<a data-toggle="tooltips" data-placement="right" title="Toggle Sidebar">
					<span class="icon-bg">
						<i class="material-icons">menu</i>
					</span>
                </a>
			</span>

    </div>
    <!-- logo-area -->

    <ul class="nav navbar-nav toolbar pull-right">

        <li class="dropdown toolbar-icon-bg">
            <a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="material-icons">more_vert</i></span><span class="badge badge-info"></span></a>
            <div class="dropdown-menu animated notifications" style= "height:150px;">
                <div class="scroll-pane">
                    <ul class="media-list scroll-content">
                        <li class="media notification">
                            <a href="#">
                                <div class="media-left">
                                    <span class="notification-icon"><i class="material-icons">lock</i></span>
                                </div>
                                <div class="media-body">
                                    <h4 class="notification-heading">Akun Saya</h4>
                                    <span class="notification-time">Ganti pengaturan akun anda</span>
                                </div>
                            </a>
                        </li>
                        <li class="media notification">
                            <a href="{{ url('/logout') }}">
                                <div class="media-left">
                                    <span class="notification-icon"><i class="material-icons">power_settings_new</i></span>
                                </div>
                                <div class="media-body">
                                    <h4 class="notification-heading">Keluar</h4>
                                    <span class="notification-time">Keluar dari aplikasi</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </li>

    </ul>
</header>

<div id="wrapper">
    <div id="layout-static">
        <div class="static-sidebar-wrapper sidebar-default">
            <div class="static-sidebar">
                <div class="sidebar">
                    <div class="widget" id="widget-profileinfo">
                        <div class="widget-body">
                            <div class="userinfo">
                                <div class="avatar pull-left">
                                    <img src="/assets/demo/avatar/avatar_17.jpg" class="img-responsive img-circle">
                                </div>
                                @if(Auth::user()->hasRole('Mahasiswa'))
                                    @php($name = Auth::user()->mahasiswa->nama)
                                @else
                                    @php($name = Auth::user()->pegawai->nama)
                                @endif
                                <div class="info">
                                    <span class="username">{{$name}}</span>
                                    <span class="useremail">{{Auth::user()->username}}</span>
                                </div>

                                <div class="acct-dropdown clearfix dropdown">
						                    <span class="pull-left"><span class="online-status online">

						                    </span>Online</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="widget stay-on-collapse" id="widget-sidebar">
                        <nav role="navigation" class="widget-body">
                            <ul class="acc-menu">

                                <li class="nav-separator">
                                    <span>Navigation</span>
                                </li>

                                <li>
                                    <a class="withripple" href="#">
												<span class="icon">
													<i class="material-icons">home</i>
												</span>
                                        <span>Beranda</span>
                                    </a>
                                </li>
                                @if(Auth::user()->hasRole('Mahasiswa'))
                                <li>
                                    <a class="withripple" href="javascript:;">
												<span class="icon">
													<i class="material-icons">class</i>
												</span>
                                        <span>Pengajuan</span>
                                    </a>
                                    <ul class="acc-menu">
                                        <li>
                                            <a class="withripple" href="{{url('pengajuan/dospem')}}">Dosen Pembimbing</a>
                                        </li>
                                        <li>
                                            <a class="withripple" href="{{url('pengajuan/sempro/create')}}">SEMPRO</a>
                                        </li>
                                        <li>
                                            <a class="withripple" href="#">Sidang</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="active">
                                    <a class="withripple" href="{{url('bimbingan')}}">
												<span class="icon">
													<i class="material-icons">assignment</i>
												</span>
                                        <span>Bimbingan</span>
                                    </a>
                                </li>
                                @elseif(Auth::user()->hasRole('Kombi'))
                                    <li>
                                        <a class="withripple" href="javascript:;">
												<span class="icon">
													<i class="material-icons">class</i>
												</span>
                                            <span>List Pengajuan</span>
                                        </a>
                                        <ul class="acc-menu">
                                            <li>
                                                <a class="withripple" href="{{url('pengajuan/pengaju')}}">Dosen Pembimbing</a>
                                            </li>
                                            <li>
                                                <a class="withripple" href="#">SEMPRO</a>
                                            </li>
                                            <li>
                                                <a class="withripple" href="#">Sidang</a>
                                            </li>
                                        </ul>
                                    </li>
                                @elseif(Auth::user()->hasRole('Dosen'))
                                    <li>
                                        <a class="withripple" href="javascript:;">
												<span class="icon">
													<i class="material-icons">class</i>
												</span>
                                            <span>Dosen</span>
                                        </a>
                                        <ul class="acc-menu">
                                            <li>
                                                <a class="withripple" href="dosen-daftar-bimbingan.html">Daftar Bimbingan</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a class="withripple" href="javascript:;">
												<span class="icon">
													<i class="material-icons">class</i>
												</span>
                                            <span>Bimbingan</span>
                                        </a>
                                        <ul class="acc-menu">
                                            <li>
                                                <a class="withripple" href="{{url('respon')}}">Belum Dilihat</a>
                                            </li>
                                            <li>
                                                <a class="withripple" href="{{url('respon/sudah/1')}}">Sudah Dilihat</a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="static-content-wrapper">
            <div class="static-content">
                <div class="page-content">
                    @yield('content')

                </div>
                <!-- #page-content -->
            </div>

            <footer role="contentinfo">
                <div class="clearfix">
                    <ul class="list-unstyled list-inline pull-left">
                        <li><h6 style="margin: 0;">&copy; 2016 Program Studi Sistem Informasi - Universitas Jember</h6></li>
                    </ul>
                </div>
            </footer>
        </div>
    </div>
</div>

<!-- Load site level scripts -->

<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script> -->

<script src="/assets/js/jquery-1.10.2.min.js"></script> 							<!-- Load jQuery -->
<script src="/assets/js/jqueryui-1.10.3.min.js"></script> 							<!-- Load jQueryUI -->
<script src="/assets/js/bootstrap.min.js"></script> 								<!-- Load Bootstrap -->
<script src="/assets/js/enquire.min.js"></script> 									<!-- Load Enquire -->

<script src="/assets/plugins/velocityjs/velocity.min.js"></script>					<!-- Load Velocity for Animated Content -->
<script src="/assets/plugins/velocityjs/velocity.ui.min.js"></script>

<script src="/assets/plugins/progress-skylo/skylo.js"></script> 		<!-- Skylo -->

<script src="/assets/plugins/wijets/wijets.js"></script>     						<!-- Wijet -->

<script src="/assets/plugins/sparklines/jquery.sparklines.min.js"></script> 			 <!-- Sparkline -->

<script src="/assets/plugins/codeprettifier/prettify.js"></script> 				<!-- Code Prettifier  -->

<script src="/assets/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js"></script>  <!-- Bootstrap Tabdrop -->

<script src="/assets/plugins/nanoScroller/js/jquery.nanoscroller.min.js"></script> <!-- nano scroller -->

<script src="/assets/plugins/dropdown.js/jquery.dropdown.js"></script> <!-- Fancy Dropdowns -->
<script src="/assets/plugins/bootstrap-material-design/js/material.min.js"></script> <!-- Bootstrap Material -->
<script src="/assets/plugins/bootstrap-material-design/js/ripples.min.js"></script> <!-- Bootstrap Material -->

<script src="/assets/js/application.js"></script>
<script src="/assets/demo/demo.js"></script>
<script src="/assets/demo/demo-switcher.js"></script>

@yield('script')

<!-- End loading site level scripts -->

<!-- Load page level scripts-->
</body>
</html>