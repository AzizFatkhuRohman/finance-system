<nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar hk-navbar-alt">
            <a class="navbar-toggle-btn nav-link-hover navbar-toggler" href="javascript:void(0);" data-toggle="collapse" data-target="#navbarCollapseAlt" aria-controls="navbarCollapseAlt" aria-expanded="false" aria-label="Toggle navigation"><span class="feather-icon"><i data-feather="menu"></i></span></a>
            <a class="navbar-brand" href="#">
                <img class="brand-img d-inline-block align-top" src="{{ asset('dist/img/logo_dwi2.png') }}" alt="brand" />
            </a>
            <div class="collapse navbar-collapse" id="navbarCollapseAlt">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown show-on-hover active">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Dashboard
							</a>                        
                    </li>
                    <li class="nav-item dropdown show-on-hover">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Master Data
							</a>
                        <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">                            
                            <a class="dropdown-item" href="{{url('customer')}}">Customer</a>
                            <a class="dropdown-item" href="{{ url('suplier') }}">Suplier</a>
                            <a class="dropdown-item" href="{{ url('produk') }}">Product</a>                            
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('penjualan') }}" >Penjualan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('biaya') }}" >Biaya</a>
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