@extends('partials.app')
@section('content')
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
                    <li class="breadcrumb-item"><a href="#">Data</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Akun</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container-fluid">

                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>Akun</h4>
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Data Akun &nbsp;&nbsp; <a href="{{ url('akun/create') }}"><button class="btn btn-primary btn-sm">Tambah data</button></a></h5>
                            <p class="mb-40">Data <code>akun</code> adalah data awal proses pencatatan keuangan bisa melihat tabel akun di bawah ini.</p>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <table id="datable_1" class="table table-hover mb-x0">
                                            <thead>
                                                <tr>
                                                    <th>Kode Akun</th>
                                                    <th>Deskripsi</th>
                                                    <th>Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>100-00</td>
                                                    <td>Aset</td>
                                                    <td><a href="#" class="mr-25" data-toggle="tooltip" data-original-title="Edit"> <i class="icon-pencil"></i> </a>                           <a href="#" data-toggle="tooltip" data-original-title="Hapus"> <i class="icon-trash txt-danger"></i> </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>200-00</td>
                                                    <td>Hutang</td>
                                                    <td><a href="#" class="mr-25" data-toggle="tooltip" data-original-title="Edit"> <i class="icon-pencil"></i> </a>                           <a href="#" data-toggle="tooltip" data-original-title="Hapus"> <i class="icon-trash txt-danger"></i> </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>300-00</td>
                                                    <td>Equity</td>
                                                    <td><a href="#" class="mr-25" data-toggle="tooltip" data-original-title="Edit"> <i class="icon-pencil"></i> </a>                           <a href="#" data-toggle="tooltip" data-original-title="Hapus"> <i class="icon-trash txt-danger"></i> </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>400-00</td>
                                                    <td>Pendapatan</td>
                                                    <td><a href="#" class="mr-25" data-toggle="tooltip" data-original-title="Edit"> <i class="icon-pencil"></i> </a>                           <a href="#" data-toggle="tooltip" data-original-title="Hapus"> <i class="icon-trash txt-danger"></i> </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>500-00</td>
                                                    <td>Biaya</td>
                                                    <td><a href="#" class="mr-25" data-toggle="tooltip" data-original-title="Edit"> <i class="icon-pencil"></i> </a>                           <a href="#" data-toggle="tooltip" data-original-title="Hapus"> <i class="icon-trash txt-danger"></i> </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Kode Akun</th>
                                                    <th>Deskripsi</th>
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