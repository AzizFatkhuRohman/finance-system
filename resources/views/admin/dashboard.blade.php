<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Dashboard</title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
	
	<!-- vector map CSS -->
    <link href="{{ asset('vendors/vectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" type="text/css" />

    <!-- Toggles CSS -->
    <link href="{{ asset('vendors/jquery-toggles/css/toggles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendors/jquery-toggles/css/themes/toggles-light.css') }}" rel="stylesheet" type="text/css">
	
    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- Preloader -->
    <div class="preloader-it">
        <div class="loader-pendulums"></div>
    </div>
    <!-- /Preloader -->
	
	<!-- HK Wrapper -->
	<div class="hk-wrapper hk-alt-nav">

        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar hk-navbar-alt">
            <a class="navbar-toggle-btn nav-link-hover navbar-toggler" href="javascript:void(0);" data-toggle="collapse" data-target="#navbarCollapseAlt" aria-controls="navbarCollapseAlt" aria-expanded="false" aria-label="Toggle navigation"><span class="feather-icon"><i data-feather="menu"></i></span></a>
            <a class="navbar-brand" href="#">
                <img class="brand-img d-inline-block align-top" src="{{ asset('dist/img/logo_dwi2.png') }}" alt="brand" />
            </a>
            <div class="collapse navbar-collapse" id="navbarCollapseAlt">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown show-on-hover active">
                        <a class="nav-link dropdown-toggle" href="dashboard.html" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Dashboard
							</a>                        
                    </li>
                    <li class="nav-item dropdown show-on-hover">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Master Data
							</a>
                        <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">                            
                            <a class="dropdown-item" href="data_customer.html">Customer</a>
                            <a class="dropdown-item" href="data_suplier.html">Suplier</a>
                            <a class="dropdown-item" href="data_produk.html">Product</a>                            
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="penjualan.html" >Penjualan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="biaya.html" >Biaya</a>
                    </li>
                    <li class="nav-item dropdown show-on-hover">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Laporan
                            </a>
                        <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">                            
                            <a class="dropdown-item" href="jurnal.html">Jurnal Umum</a>
                            <a class="dropdown-item" href="neraca.html">Neraca</a>
                            <a class="dropdown-item" href="buku_besar.html">Buku Besar</a>
                            <a class="dropdown-item" href="rl.html">Rugi/Laba</a>                            
                        </div>
                    </li>
                    <li class="nav-item dropdown show-on-hover">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Setting
                            </a>
                        <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <a class="dropdown-item" href="data_akun.html">Akun</a>
                            <a class="dropdown-item" href="#">Akses</a>
                        </div>
                    </li>                    
                </ul>
                <form class="navbar-search-alt">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><span class="feather-icon"><i data-feather="search"></i></span></span>
                        </div>
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    </div>
                </form>
            </div>
            <ul class="navbar-nav hk-navbar-content">                
                <li class="nav-item dropdown dropdown-authentication">
                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar">
                                    <img src="{{ asset('dist/img/avatar5.jpg') }}" alt="user" class="avatar-img rounded-circle">
                                </div>
                                <span class="badge badge-success badge-indicator"></span>
                            </div>
                            <div class="media-body">
                                <span>Admin<i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                                                
                        <div class="dropdown-divider"></div>
                        <div class="sub-dropdown-menu show-on-hover">
                            <a href="#" class="dropdown-toggle dropdown-item no-caret"><i class="zmdi zmdi-check text-success"></i>Online</a>
                            <a class="dropdown-item" href="#"><i class="dropdown-icon zmdi zmdi-settings"></i><span>Change Password</span></a>
                            
                        </div>
                        <div class="dropdown-divider"></div>                        
                        <a class="dropdown-item" href="#"><i class="dropdown-icon zmdi zmdi-power"></i><span>Log out</span></a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /Top Navbar -->

        

        

        <!-- Main Content -->
        <div class="hk-pg-wrapper">
			<!-- Container -->
            <div class="container-fluid mt-xl-50 mt-sm-30 mt-15">
                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
						<div class="hk-row">
							<div class="col-sm-12">
								<div class="card-group hk-dash-type-2">
									<div class="card card-sm">
										<div class="card-body">
											<div class="d-flex justify-content-between mb-5">
												<div>
													<span class="d-block font-15 text-dark font-weight-500">Customers</span>
												</div>
												<div>
													<span class="text-primary font-14 font-weight-500">PT/CV</span>
												</div>
											</div>
											<div>
												<span class="d-block display-4 text-dark mb-5"><span class="counter-anim">18</span></span>
												<small class="d-block">Data Customers</small>
											</div>
										</div>
									</div>
								
									<div class="card card-sm">
										<div class="card-body">
											<div class="d-flex justify-content-between mb-5">
												<div>
													<span class="d-block font-15 text-dark font-weight-500">Supliers</span>
												</div>
												<div>
													<span class="text-primary font-14 font-weight-500">PT/CV</span>
												</div>
											</div>
											<div>
												<span class="d-block display-4 text-dark mb-5"><span class="counter-anim">46</span></span>
												<small class="d-block">Data Supliers</small>
											</div>
										</div>
									</div>
								
									<div class="card card-sm">
										<div class="card-body">
											<div class="d-flex justify-content-between mb-5">
												<div>
													<span class="d-block font-15 text-dark font-weight-500">Product</span>
												</div>
												<div>
													<span class="text-warning font-14 font-weight-500">pack</span>
												</div>
											</div>
											<div>
												<span class="d-block display-4 text-dark mb-5"><span class="counter-anim">73</span></span>
												<small class="d-block">Data Product</small>
											</div>
										</div>
									</div>
								
									<div class="card card-sm">
										<div class="card-body">
											<div class="d-flex justify-content-between mb-5">
												<div>
													<span class="d-block font-15 text-dark font-weight-500">Users</span>
												</div>
												<div>
													<span class="text-success font-14 font-weight-500">orang</span>
												</div>
											</div>
											<div>
												<span class="d-block display-4 text-dark mb-5"><span class="counter-anim">5</span></span>
												<small class="d-block">Users Targeted</small>
											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>
					   <!-- card -->
                       <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Informasi</h5>
                            <p class="mb-40">Sistem ini mencakup beberapa proses pencatatan keuangan, diantaranya Penjualan, Biaya, dan Kesediaan laporan keuangan.</p>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                                            <div class="card">
                                                <div class="card-header">
                                                    Penjualan
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title">Informasi Penjualan</h5>
                                                    <p class="card-text">Mendukung segala pencatatan Penjualan dengan konten yang sudah disediakan.</p>
                                                    <a href="#" class="btn btn-primary">Jalan Pintas</a>
                                                </div>
                                                <div class="card-footer text-muted">
                                                    Tentang Penjualan
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                                            <div class="card card-sm">
                                                <div class="card-header">
                                                    Biaya
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title">Informasi Biaya</h5>
                                                    <p class="card-text">Mendukung segala pencatatan Biaya dengan konten yang sudah disediakan.</p>
                                                    <a href="#" class="btn btn-primary">Jalan Pintas</a>
                                                </div>
                                                <div class="card-footer text-muted">
                                                    Tentang Biaya
                                                </div>
                                            </div>
                                        </div>

                                        
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- close card -->
						
					</div>
                </div>
                <!-- /Row -->
            </div>
            <!-- /Container -->
			
            <!-- Footer -->
            <div class="hk-footer-wrap container-fluid">
                <footer class="footer">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <p>costomize by<a href="#" class="text-dark" target="_blank">h3codeverse</a> © 2025</p>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <p class="d-inline-block">Follow us</p>
                            <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-facebook"></i></span></a>
                            <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-twitter"></i></span></a>
                            <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-instagram "></i></span></a>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- /Footer -->
        </div>
        <!-- /Main Content -->

    </div>
    <!-- /HK Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Slimscroll JavaScript -->
    <script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>

    <!-- Fancy Dropdown JS -->
    <script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="{{ asset('dist/js/feather.min.js') }}"></script>

    <!-- Toggles JavaScript -->
    <script src="{{ asset('vendors/jquery-toggles/toggles.min.js') }}"></script>
    <script src="{{ asset('dist/js/toggle-data.js') }}"></script>
	
	<!-- Counter Animation JavaScript -->
	<script src="{{ asset('vendors/waypoints/lib/jquery.waypoints.min.js') }}"></script>
	<script src="{{ asset('vendors/jquery.counterup/jquery.counterup.min.js') }}"></script>
	
	<!-- Morris Charts JavaScript -->
    <script src="{{ asset('vendors/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('vendors/morris.js/morris.min.js') }}"></script>
	
	<!-- EChartJS JavaScript -->
    <script src="{{ asset('vendors/echarts/dist/echarts-en.min.js') }}"></script>
    
	<!-- Sparkline JavaScript -->
    <script src="{{ asset('vendors/jquery.sparkline/dist/jquery.sparkline.min.js') }}"></script>
	
	<!-- Owl JavaScript -->
    <script src="{{ asset('vendors/owl.carousel/dist/owl.carousel.min.js') }}"></script>
	
	<!-- Init JavaScript -->
    <script src="{{ asset('dist/js/init.js') }}"></script>
	<script src="{{ asset('dist/js/ecStat.min.js') }}"></script>
	<script src="{{ asset('dist/js/dashboard5-data.js') }}"></script>
	
</body>

</html>