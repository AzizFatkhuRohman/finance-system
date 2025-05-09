@extends('partials.app')
@section('content')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Customers</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container-fluid">

        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
                            data-feather="database"></i></span></span>Customers</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Data Customers &nbsp;&nbsp; <a href="{{ url('customer/create') }}"><button
                                class="btn btn-primary btn-sm">Tambah data</button></a>&nbsp;&nbsp;<a href="{{ url('araging') }}"><button
                                    class="btn btn-warning btn-sm">AR Aging</button></a></h5>

                    <p class="mb-40">Untuk berinteraksi dengan para <code>customers</code> bisa melihat beberapa data
                        berikut dan bisa di lihat lebih detail dari tabel customer di bawah ini.</p>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <table id="datable_1" class="table table-hover mb-x0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Customer</th>
                                            <th>Nama PT/CV</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
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
                                                <td>{{ $item->code_customer }}</td>
                                                <td>{{ $item->nama_perusahaan }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->alamat}}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="{{ url('customer/' . $item->id) }}" class="mr-2"
                                                            data-toggle="tooltip" data-original-title="Edit">
                                                            <i class="icon-pencil"></i>
                                                        </a>
                                                        <form action="{{ url('customer/' . $item->id) }}" method="post"
                                                            id="delete-form-{{ $item->id }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="button" class="btn btn-sm"
                                                                onclick="Swal.fire({
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
                                            <th>Kode Customer</th>
                                            <th>Nama PT/CV</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
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
