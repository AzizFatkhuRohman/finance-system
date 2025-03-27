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
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
                                data-feather="align-left"></i></span></span>Form Produk</h4>
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
                                            <label for="nm_produk">Nama Produk</label>
                                            <input class="form-control @error('nm_produk') is-invalid @enderror"
                                                id="nm_produk" name="nm_produk" value="{{ old('nm_produk') }}"
                                                type="text">
                                            @error('nm_produk')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="kd_produk">Kode Produk</label>
                                            <input class="form-control @error('kd_produk') is-invalid @enderror"
                                                id="kd_produk" name="kd_produk" value="{{ old('kd_produk') }}"
                                                type="text">
                                            @error('kd_produk')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="satuan">Satuan</label>
                                            <select class="form-control custom-select @error('satuan') is-invalid @enderror"
                                                name="satuan">
                                                <option> -- Select --</option>
                                                <option value="pcs" {{ old('satuan') == 'pcs' ? 'selected' : '' }}>pcs
                                                </option>
                                                <option value="pack" {{ old('satuan') == 'pack' ? 'selected' : '' }}>pack
                                                </option>
                                                <option value="buah" {{ old('satuan') == 'buah' ? 'selected' : '' }}>buah
                                                </option>
                                                <option value="kg" {{ old('satuan') == 'kg' ? 'selected' : '' }}>kg
                                                </option>
                                            </select>
                                            @error('satuan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="harga">Harga Jual</label>
                                            <input class="form-control @error('harga') is-invalid @enderror" name="harga"
                                                value="{{ old('harga') }}" type="text">
                                            @error('harga')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 mb-10">
                                            <label for="stok">Stock</label>
                                            <input class="form-control @error('stok') is-invalid @enderror" id="stok"
                                                name="stok" value="{{ old('stok') }}" type="text">
                                            @error('stok')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
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
