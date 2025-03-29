@extends('partials.app')
@section('content')
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
                    <li class="breadcrumb-item"><a href="#">Customer</a></li>
                    <li class="breadcrumb-item active" aria-current="page">AR Aging</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container-fluid">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>AR Aging</h4>
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <p class="mb-40">Berikut data <code>AR Aging</code> yang sudah di proses dari data transaksi yang berjalan..</p>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="table-wrap">
                                                <div class="table-responsive-md">
                                                    <table class="table mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Kode Customer</th>
                                                                <th>Customer</th>
                                                                <th>Total Utang</th>
                                                                <th> 1 - 30 </th>
                                                                <th> 31 - 60 </th>
                                                                <th> 61 - 90 </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>CD2503002</td>
                                                                <td>PT. H3codeverse </td>
                                                                <td>Rp. 1.500.000</td>
                                                                <td>Rp. 500.000</td>
                                                                <td>Rp. 500.000</td>
                                                                <td>Rp. 500.000</td>
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
