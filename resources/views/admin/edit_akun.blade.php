@extends('partials.app')
@section('content')
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
                    <li class="breadcrumb-item"><a href="#">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Data Akun</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container-fluid">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="align-left"></i></span></span>Edit Akun</h4>
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Edit Data Akun</h5>
                            <p class="mb-25">Untuk mengedit <code>Produk</code> isi form berikut dengan lengkap.</p>
                            <div class="row">
                                <div class="col-sm">
                                    <form method="POST" action="{{ url('akun/'.$data->id) }}">
                                        @csrf
                                        @method('put')
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="firstName">Nomor Akun</label>
                                                <input class="form-control" id="firstName" name="no_account" placeholder="" value="{{ $data->no_account }}" type="text">
                                            </div>
                                            
                                        </div>
                                       
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="firstName">Deskripsi</label>
                                                <textarea name="description" class="form-control" id="">{{$data->description}}</textarea>
                                            </div>              
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-10">
                                                <label for="zip">Nature</label>
                                                <textarea name="nature" class="form-control" id="">{{$data->nature}}</textarea>
                                            </div>
                                            <!-- <div class="col-md-3 mb-10">
                                                <label for="zip">Kecamatan</label>
                                                <input class="form-control" id="zip" placeholder="" type="text">
                                            </div>
                                            <div class="col-md-3 mb-10">
                                                <label for="zip">Kelurahan</label>
                                                <input class="form-control" id="zip" placeholder="" type="text">
                                            </div>
                                            <div class="col-md-3 mb-10">
                                                <label for="zip">Kode Pos <span class="text-muted">(Optional)</span></label>
                                                <input class="form-control" id="zip" placeholder="" type="text">
                                            </div> -->
                                        </div>
                                        
                                        <hr>
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </form>
                                </div>
                            </div>
                        </section>
                        
                        
                        
                    </div>
                </div>
                <!-- /Row -->
            </div>
            <!-- /Container -->
@endsection