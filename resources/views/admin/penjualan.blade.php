@extends('partials.app')
@section('content')
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Penjualan</li>
                </ol>

            </nav>

            <!-- /Breadcrumb -->
			<!-- Container -->
            <div class="container-fluid">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="layers"></i></span></span>Penjualan</h4>
                    <a href="{{ url('penjualan/create') }}"><button class="btn btn-primary btn-sm">Tambah data</button></a>
                </div>

                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper hk-gallery-wrap">
                            <ul class="nav nav-light nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a href="#faktur" class="nav-link" data-toggle="tab">Faktur</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="#invoice" class="nav-link" data-toggle="tab">Invoice</a>
                                </li> -->
                                <li class="nav-item">
                                    <a href="#pengiriman" class="nav-link" data-toggle="tab">Pengiriman</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#penawaran" class="nav-link active" data-toggle="tab">Penawaran</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade" id="faktur" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm">
                                            </br>
                                            <p class="mb-25">Data pada tabel ini adalah data semua penjualan yang sudah dibayar oleh customer.</p>
                                            <div class="table-wrap">
                                                <div class="table-responsive-md">
                                                    <table class="table mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Invoice</th>
                                                                <th>Customer</th>
                                                                <th>Date</th>
                                                                <th>Amount</th>
                                                                <th>Status</th>
                                                                <th>Invoice</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><a href="javascript:void(0)">Order #26589</a></td>
                                                                <td>PT. ABC</td>
                                                                <td><span class="text-muted"><i class="icon-clock font-13"></i> Oct 16, 2016</span></td>
                                                                <td>Rp. 450.000</td>
                                                                <td><div class="badge badge-warning">Unpaid</div></td>
                                                                <td><a href="#">Print</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td><a href="javascript:void(0)">Order #58746</a></td>
                                                                <td>PT. ABC</td>
                                                                <td><span class="text-muted"><i class="icon-clock font-13"></i> Oct 12, 2016</span></td>
                                                                <td>Rp. 245.300</td>
                                                                <td><div class="badge badge-warning">Unpaid</div></td>
                                                                <td><a href="#">Print</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td><a href="javascript:void(0)">Order #98458</a></td>
                                                                <td>PT. ABC</td>
                                                                <td><span class="text-muted"><i class="icon-clock font-13"></i> May 18, 2016</span></td>
                                                                <td>Rp. 380.000</td>
                                                                <td><div class="badge badge-success">Paid</div></td>
                                                                <td><a href="#">Faktur</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td><a href="javascript:void(0)">Order #32658</a></td>
                                                                <td>PT. ABC</td>
                                                                <td><span class="text-muted"><i class="icon-clock font-13"></i> Apr 28, 2016</span></td>
                                                                <td>Rp. 770.990</td>
                                                                <td><div class="badge badge-success">Paid</div></td>
                                                                <td><a href="#">Faktur</a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="tab-pane fade" id="invoice" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm">
                                            </br>
                                            <p class="mb-25">Data pada tabel ini adalah data invoice.</p>
                                            <div class="table-wrap">
                                                <div class="table-responsive-md">
                                                <table class="table mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Invoice</th>
                                                                <th>Customer</th>
                                                                <th>Date</th>
                                                                <th>Amount</th>
                                                                <th>Status</th>
                                                                <th>Invoice</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><a href="javascript:void(0)">Order #26589</a></td>
                                                                <td>PT. ABC</td>
                                                                <td><span class="text-muted"><i class="icon-clock font-13"></i> Oct 16, 2016</span></td>
                                                                <td>Rp. 450.000</td>
                                                                <td><div class="badge badge-success">Paid</div></td>
                                                                <td><a href="#">Print</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td><a href="javascript:void(0)">Order #58746</a></td>
                                                                <td>PT. ABC</td>
                                                                <td><span class="text-muted"><i class="icon-clock font-13"></i> Oct 12, 2016</span></td>
                                                                <td>Rp. 245.300</td>
                                                                <td><div class="badge badge-warning">Pending</div></td>
                                                                <td><a href="#">Print</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td><a href="javascript:void(0)">Order #98458</a></td>
                                                                <td>PT. ABC</td>
                                                                <td><span class="text-muted"><i class="icon-clock font-13"></i> May 18, 2016</span></td>
                                                                <td>Rp. 380.000</td>
                                                                <td><div class="badge badge-success">Paid</div></td>
                                                                <td><a href="#">Print</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td><a href="javascript:void(0)">Order #32658</a></td>
                                                                <td>PT. ABC</td>
                                                                <td><span class="text-muted"><i class="icon-clock font-13"></i> Apr 28, 2016</span></td>
                                                                <td>Rp. 770.990</td>
                                                                <td><div class="badge badge-success">Paid</div></td>
                                                                <td><a href="#">Print</a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="tab-pane fade" id="pengiriman" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm">
                                            </br>
                                            <p class="mb-25">Data pada tabel ini adalah data pengiriman.</p>
                                            <div class="table-wrap">
                                                <div class="table-responsive-md">
                                                <table class="table mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Invoice</th>
                                                                <th>Customer</th>
                                                                <th>Date</th>
                                                                <th>Amount</th>
                                                                <th>Status</th>
                                                                <th>Surat Jalan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><a href="javascript:void(0)">Order #26589</a></td>
                                                                <td>PT. ABC</td>
                                                                <td><span class="text-muted"><i class="icon-clock font-13"></i> Oct 16, 2016</span></td>
                                                                <td>Rp. 450.000</td>
                                                                <td><div class="badge badge-warning">Pending</div></td>
                                                                <td><a href="#">Print</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td><a href="javascript:void(0)">Order #58746</a></td>
                                                                <td>PT. ABC</td>
                                                                <td><span class="text-muted"><i class="icon-clock font-13"></i> Oct 12, 2016</span></td>
                                                                <td>Rp. 245.300</td>
                                                                <td><div class="badge badge-warning">Pending</div></td>
                                                                <td><a href="#">Print</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td><a href="javascript:void(0)">Order #98458</a></td>
                                                                <td>PT. ABC</td>
                                                                <td><span class="text-muted"><i class="icon-clock font-13"></i> May 18, 2016</span></td>
                                                                <td>Rp. 380.000</td>
                                                                <td><div class="badge badge-warning">Pending</div></td>
                                                                <td><a href="#">Print</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td><a href="javascript:void(0)">Order #32658</a></td>
                                                                <td>PT. ABC</td>
                                                                <td><span class="text-muted"><i class="icon-clock font-13"></i> Apr 28, 2016</span></td>
                                                                <td>Rp. 770.990</td>
                                                                <td><div class="badge badge-success">Send</div></td>
                                                                <td><a href="#">Print</a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show active" id="penawaran" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm">
                                            </br>
                                            <p class="mb-25">Data pada tabel ini adalah data penawaran.</p>
                                            <div class="table-wrap">
                                                <div class="table-responsive-md">
                                                <table class="table mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Invoice</th>
                                                                <th>Customer</th>
                                                                <th>Date</th>
                                                                <th>Amount</th>
                                                                <th>Status</th>
                                                                <th>Quotation</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><a href="{{ url('spk') }}">Order #26589</a></td>
                                                                <td>PT. ABC</td>
                                                                <td><span class="text-muted"><i class="icon-clock font-13"></i> Oct 16, 2016</span></td>
                                                                <td>Rp. 450.000</td>
                                                                <td><div class="badge badge-success">created</div></td>
                                                                <td><a href="{{ url('quotation') }}">Print</a></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- /Row -->
            </div>
            <!-- /Container -->
@endsection
