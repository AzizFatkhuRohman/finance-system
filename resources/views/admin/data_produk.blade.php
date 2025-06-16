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
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Satuan</th>
                                            <th>Harga</th>
                                            <th>Stock</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->nama_produk }}</td>
                                                <td>{{ $item->satuan }}</td>
                                                <td>Rp. {{ number_format($item->harga, 0, ',', '.') }}</td>
                                                <td>{{ $item->stok }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="{{ url('produk/' . $item->id) }}" class="mr-2"
                                                            data-toggle="tooltip" data-original-title="Edit">
                                                            <i class="icon-pencil"></i>
                                                        </a>
                                                        <form action="{{ url('produk/' . $item->id) }}" method="post"
                                                            id="delete-form-{{$item->id}}">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="button" class="btn btn-sm" onclick="
                                                                            Swal.fire({
                                                                                title: 'Apakah Anda yakin?',
                                                                                text: 'Data ini akan dihapus permanen!',
                                                                                icon: 'warning',
                                                                                showCancelButton: true,
                                                                                confirmButtonText: 'Hapus',
                                                                                cancelButtonText: 'Batal',
                                                                                reverseButtons: true
                                                                            }).then((result) => {
                                                                                if (result.isConfirmed) {
                                                                                    // Jika user memilih 'Hapus', submit form untuk menghapus data
                                                                                    document.getElementById('delete-form-{{ $item->id }}').submit();
                                                                                }
                                                                            });">
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
                                            <th>No</th>
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