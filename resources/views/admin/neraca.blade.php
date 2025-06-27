@extends('partials.app')
@section('content')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Laporan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Neraca</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container-fluid">

        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
                            data-feather="database"></i></span></span>Neraca</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Neraca</h5>
                    <p class="mb-40">Berikut data <code>Neraca</code> yang sudah di proses dari data transaksi yang
                        berjalan..</p>
                    <div class="row">
                        <div class="col-md-3 mb-10">
                            <label for="zip">Tanggal Awal</label>
                            <input class="form-control" placeholder="" type="date">
                        </div>
                        <div class="col-md-3 mb-10">
                            <label for="zip">Tanggal Akhir</label>
                            <input class="form-control" placeholder="" type="date">
                        </div>
                        <div class="col-md-3 mb-10">
                            <label>-</label>
                            <input style="background-color: #1E90FF;" class="form-control" placeholder="" value="Filter"
                                type="submit">
                        </div>

                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" role="tabpanel">
                            <div class="row">
                                <div class="col-sm">
                                    </br>

                                    <div class="table-wrap">
                                        <div class="table-responsive-md">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 20px;">No.</th>
                                                        <th style="width: 10%;">Tanggal</th>
                                                        <th>No. Akun</th>
                                                        <th>keterangan</th>
                                                        <th>Debit</th>
                                                        <th>kredit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>2023-10-01</td>
                                                        <td>500.11</td>
                                                        <td>Bank Mega</td>
                                                        <td>- </td>
                                                        <td>Rp. 450.000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>2023-10-01</td>
                                                        <td>500.11</td>
                                                        <td>Bank Mega</td>
                                                        <td>- </td>
                                                        <td>Rp. 450.000</td>
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
