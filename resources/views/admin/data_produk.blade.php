@extends('partials.app')
@section('content')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Produk</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container-fluid">

        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
                            data-feather="database"></i></span></span>Produk &nbsp; <a
                    href="{{ url('produk/create') }}"><button class="btn btn-primary btn-sm">Tambah data</button></a></h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Data Produk </h5>
                    <p class="mb-40">Untuk mengelola <code>Produk</code> bisa melihat beberapa data berikut dan bisa di
                        lihat lebih detail dari tabel produk di bawah ini. </p>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <table id="datable_1" class="table table-hover mb-x0">
                                    <thead>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th>Satuan</th>
                                            <th>Harga</th>
                                            <th>Stock</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>

                                                <td>{{ $item->nama_produk }}</td>
                                                <td>{{ $item->satuan }}</td>
                                                <td>{{ $item->harga }}</td>
                                                <td>{{ $item->stok }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="{{ url('produk/' . $item->id) }}" class="mr-2"
                                                            data-toggle="tooltip" data-original-title="Edit">
                                                            <i class="icon-pencil"></i>
                                                        </a>
                                                        <form action="{{ url('produk/' . $item->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-sm">
                                                                <i class="icon-trash txt-danger" data-toggle="tooltip"
                                                                    data-original-title="Hapus"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th>Satuan</th>
                                            <th>Harga</th>
                                            <th>Stock</th>
                                            <th>Option</th>
                                        </tr>
                                    </tfoot>
                                </table>
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
