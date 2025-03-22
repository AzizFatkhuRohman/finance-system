@extends('partials.app')
@section('content')      
       <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
                    <li class="breadcrumb-item"><a href="#">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form Produk</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container-fluid">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="align-left"></i></span></span>Form Produk</h4>
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Tambah Produk</h5>
                            <p class="mb-25">Untuk menambah <code>Produk</code> isi form berikut dengan lengkap.</p>
                            <div class="row">
                                <div class="col-sm">
                                    <form action="{{ url('produk') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="firstName">Nama Produk</label>
                                                <input class="form-control" id="firstName" placeholder="" name="nm_produk" value="" type="text">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="firstName">Kode Produk</label>
                                                <input class="form-control" id="firstName" placeholder="" name="kd_produk" value="" type="text">
                                            </div>
                                        </div>
                                       
                                        <div class="row">
                                        <div class="col-md-6 form-group">
                                                <label for="firstName">Satuan</label>
                                                <select class="form-control custom-select" name="satuan">
                                                <option selected value="#"> -- Select --</option>
                                                <option value="pcs">pcs</option>
                                                <option value="pack">pack</option>
                                                <option value="buah">buah</option>
                                                <option value="kg">kg</option>
                                            </select>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="firstName">Harga Jual</label>
                                                <input class="form-control" placeholder="" name="harga" value="" type="text">
                                            </div>              
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3 mb-10">
                                                <label for="zip">Stock</label>
                                                <input class="form-control" id="zip" name="stok" placeholder="" type="text">
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
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </form>
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