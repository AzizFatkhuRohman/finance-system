@extends('partials.app')
@section('content')
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
                                                    <a href="{{ url('penjualan') }}" class="btn btn-primary">Jalan Pintas</a>
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
                                                    <a href="{{ url('biaya') }}" class="btn btn-primary">Jalan Pintas</a>
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
@endsection
