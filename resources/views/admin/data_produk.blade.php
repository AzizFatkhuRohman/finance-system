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
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>Produk &nbsp; <a href="form_produk.html"><button class="btn btn-primary btn-sm">Tambah data</button></a></h4>
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Data Produk </h5>
                            <p class="mb-40">Untuk mengelola <code>Produk</code> bisa melihat beberapa data berikut dan bisa di lihat lebih detail dari tabel produk di bawah ini. </p>
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
                                                <tr>
                                                    <td>Baja Ringan</td>
                                                    <td>Kg</td>
                                                    <td>10.000</td>
                                                    <td>100</td>
                                                    <td><a href="#" class="mr-25" data-toggle="tooltip" data-original-title="Edit"> <i class="icon-pencil"></i> </a>                           <a href="#" data-toggle="tooltip" data-original-title="Hapus"> <i class="icon-trash txt-danger"></i> </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Baja Ringan</td>
                                                    <td>Kg</td>
                                                    <td>10.000</td>
                                                    <td>100</td>
                                                    <td><a href="#" class="mr-25" data-toggle="tooltip" data-original-title="Edit"> <i class="icon-pencil"></i> </a>                           <a href="#" data-toggle="tooltip" data-original-title="Hapus"> <i class="icon-trash txt-danger"></i> </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Baja Ringan</td>
                                                    <td>Kg</td>
                                                    <td>10.000</td>
                                                    <td>100</td>
                                                    <td><a href="#" class="mr-25" data-toggle="tooltip" data-original-title="Edit"> <i class="icon-pencil"></i> </a>                           <a href="#" data-toggle="tooltip" data-original-title="Hapus"> <i class="icon-trash txt-danger"></i> </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Baja Ringan</td>
                                                    <td>Kg</td>
                                                    <td>10.000</td>
                                                    <td>100</td>    
                                                    <td><a href="#" class="mr-25" data-toggle="tooltip" data-original-title="Edit"> <i class="icon-pencil"></i> </a>                           <a href="#" data-toggle="tooltip" data-original-title="Hapus"> <i class="icon-trash txt-danger"></i> </a>
                                                    </td>
                                                </tr>
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