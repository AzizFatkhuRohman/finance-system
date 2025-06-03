@extends('partials.app')
@section('content')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form Data Akun</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container-fluid">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
                            data-feather="align-left"></i></span></span>Form Akun</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Tambah Data Akun</h5>
                    <p class="mb-25">Untuk menambah <code>Produk</code> isi form berikut dengan lengkap.</p>
                    <div class="row">
                        <div class="col-sm">
                            <form method="POST" action="{{ url('akun') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="firstName">Nomor Akun</label>
                                        <input class="form-control" id="firstName" name="no_account" placeholder="" value=""
                                            type="text">
                                    </div>
                                    @error('no_account')
                                        <spa class="">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="firstName">Kategori Akun</label>
                                        <select class="form-control" name="kategori" id="">
                                            <option value="">Pilih Kategori</option>
                                            <option value="1">Aktiva</option>
                                            <option value="2">Pasiva</option>
                                            <option value="3">Modal</option>
                                            <option value="4">Pendapatan</option>
                                            <option value="5">Harga Pokok Penjualan</option>
                                            <option value="6">Beban Usaha</option>
                                            <option value="7">Beban Operasional</option>
                                            <option value="8">Beban Lain-lain</option>
                                            <option value="9">Beban Pajak</option>
                                        </select>
                                    </div>
                                    @error('kategori')
                                        <spa class="">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="firstName">Deskripsi</label>
                                        <textarea name="description" class="form-control" id=""></textarea>
                                    </div>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-10">
                                        <label for="zip">Nature</label>
                                        <textarea name="nature" class="form-control" id=""></textarea>

                                    </div>
                                    @error('nature')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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
@endsection