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
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
                            data-feather="layers"></i></span></span>Penjualan</h4>
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
                                    <p class="mb-25">Data pada tabel ini adalah data semua penjualan yang sudah dibayar
                                        oleh customer.</p>
                                    <div class="table-wrap">
                                        <div class="table-responsive-md">
                                            @if ($faktur)
                                                <table class="table mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Kode Transaksi</th>
                                                            <th>Customer</th>
                                                            <th>Date</th>
                                                            <th>Amount</th>
                                                            <th>Status</th>
                                                            <th>Invoice</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($faktur as $item)
                                                            <tr>
                                                                <td>
                                                                    <a href="{{url('penjualan/faktur/'.$item->id)}}">{{ $item->kode_transaksi }}</a>
                                                                </td>
                                                                <td>{{ $item->customer->nama_perusahaan ?? '-' }}</td>
                                                                <td>
                                                                    <span class="text-muted">
                                                                        <i class="icon-clock font-13"></i>
                                                                        {{ $item->tgl_transaksi }}
                                                                    </span>
                                                                </td>
                                                                <td>Rp. {{ number_format($item->total_harga, 0, ',', '.') }}
                                                                </td>
                                                                <td>
                                                                    @if ($item->status === 'send')
                                                                        <div class="badge badge-warning">Unpaid</div>
                                                                    @else
                                                                        <div class="badge badge-success">Paid</div>
                                                                    @endif
                                                                </td>
                                                                <td><a href="{{url('penjualan/invoice/'. $item->id)}}">Print</a></td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="6" class="text-center">Data Faktur Tidak Ada
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pengiriman" role="tabpanel">
                            <div class="row">
                                <div class="col-sm">
                                    </br>
                                    <p class="mb-25">Data pada tabel ini adalah data pengiriman.</p>
                                    <div class="table-wrap">
                                        <div class="table-responsive-md">
                                            @if ($pengiriman)
                                                <table class="table mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Kode Transaksi</th>
                                                            <th>Customer</th>
                                                            <th>Date</th>
                                                            <th>Amount</th>
                                                            <th>Status</th>
                                                            <th>Surat Jalan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($pengiriman as $item)
                                                            <tr>
                                                                <td>@if($item->status === 'send')
                                                                    {{ $item->kode_transaksi }}
                                                                    @else
                                                                    <a href="{{url('penjualan/pengiriman/'.$item->id)}}">{{ $item->kode_transaksi }}</a>
                                                                    @endif
                                                                </td>
                                                                <td>{{ $item->customer->nama_perusahaan ?? '-' }}</td>
                                                                <td>
                                                                    <span class="text-muted">
                                                                        <i class="icon-clock font-13"></i>
                                                                        {{ $item->tgl_transaksi }}
                                                                    </span>
                                                                </td>
                                                                <td>Rp. {{ number_format($item->total_harga, 0, ',', '.') }}
                                                                </td>
                                                                <td>
                                                                    @if ($item->status === 'created')
                                                                        <div class="badge badge-warning">Pending</div>
                                                                    @else
                                                                        <div class="badge badge-success">Send</div>
                                                                    @endif
                                                                </td>
                                                                <td><a href="{{url('penjualan/surat_jalan/'. $item->id)}}">Print</a></td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="6" class="text-center">Data Pengiriman Tidak
                                                                    Ada</td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            @endif

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
                                            @if ($data)
                                                <table class="table table-hover mb-x0">
                                                    <thead>
                                                        <tr>
                                                            <th>Kode Transaksi</th>
                                                            <th>Customer</th>
                                                            <th>Tanggal</th>
                                                            <th>Total Harga</th>
                                                            <th>Status</th>
                                                            <th>Quatation</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($data as $item)
                                                            <tr>
                                                                <td>
                                                                    @if ($item->status === 'created')
                                                                        {{ $item->kode_transaksi }}
                                                                    @else
                                                                    <a href="{{ url('penjualan/spk/' . $item->id) }}">{{ $item->kode_transaksi }}</a>
                                                                    @endif
                                                                </td>
                                                                <td>{{ $item->customer->nama_perusahaan ?? '-' }}</td>
                                                                <td>
                                                                    <span class="text-muted">
                                                                        <i class="icon-clock font-13"></i>
                                                                        {{ $item->tgl_transaksi }}
                                                                    </span>
                                                                </td>
                                                                <td>Rp.
                                                                    {{ number_format($item->total_harga, 0, ',', '.') }}
                                                                </td>
                                                                <td>
                                                                    @if ($item->status === 'draft')
                                                                        <div class="badge badge-warning">Draft</div>
                                                                    @else
                                                                        <div class="badge badge-success">Created</div>
                                                                    @endif
                                                                </td>
                                                                <td><a href="{{ url('penjualan/quotation/'. $item->id) }}">Print</a></td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="6" class="text-center">Data Penawaran Tidak
                                                                    Ada</td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            @endif
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
