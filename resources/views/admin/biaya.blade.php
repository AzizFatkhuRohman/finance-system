@extends('partials.app')
@section('content')
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Biaya</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
			<!-- Container -->
            <div class="container-fluid">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="layers"></i></span></span>Biaya</h4>
                    <a href="{{ url('biaya/create') }}"><button class="btn btn-primary btn-sm">Tambah data</button></a>
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper hk-gallery-wrap">
                            <ul class="nav nav-light nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a href="#receipt" class="nav-link" data-toggle="tab">Receipt</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#permohonan" class="nav-link active" data-toggle="tab">Permohonan Pembayaran</a>
                                </li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade" id="receipt" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm">
                                            </br>
                                            <!-- <h6 class="mb-10">Breakpoint specific</h6> -->
                                            <p class="mb-25">Data pada table ini adalah data semua Biaya yang sudah di bayar.</p>
                                            <div class="table-wrap">
                                                <div class="table-responsive-md">
                                                    <table class="table mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Invoice</th>
                                                                <th>Suplier</th>
                                                                <th>Date</th>
                                                                <th>Amount</th>
                                                                <th>Status</th>
                                                                <th>Receipt</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($paid as $item)
                                                            <tr>
                                                                <td><a href="{{ url('biaya/'.$item->id) }}">{{$item->kode_transaksi}}</a></td>
                                                                <td>{{$item->supplier->nama_perusahaan}}</td>
                                                                <td><span class="text-muted"><i class="icon-clock font-13"></i> {{$item->tgl_transaksi}}</span> </td>
                                                                <td>{{$item->total_harga}}</td>
                                                                <td>
                                                                <div class="badge badge-success">Paid</div>
                                                                </td>
                                                                <td>
                                                                <a href="#">Print</a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show active" id="permohonan" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm">
                                            </br>
                                            <!-- <h6 class="mb-10">Breakpoint specific</h6> -->
                                            <p class="mb-25">Data pada table ini adalah data semua permohonan Biaya yang harus di bayar.</p>
                                            <div class="table-wrap">
                                                <div class="table-responsive-md">
                                                    <table class="table mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Invoice</th>
                                                                <th>Suplier</th>
                                                                <th>Date</th>
                                                                <th>Amount</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($pending as $item)
                                                            <tr>
                                                                <td><a href="{{ url('biaya/'.$item->id) }}">{{$item->kode_transaksi}}</a></td>
                                                                <td>{{$item->supplier->nama_perusahaan}}</td>
                                                                <td><span class="text-muted"><i class="icon-clock font-13"></i> {{$item->tgl_transaksi}}</span> </td>
                                                                <td>{{$item->total_harga}}</td>
                                                                <td>
                                                                <div class="badge badge-warning">Pending</div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
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


        </div>
        <!-- /Main Content -->
@endsection
