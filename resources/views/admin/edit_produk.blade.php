@extends('partials.app')
@section('content')
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
                        <h5 class="hk-sec-title">Edit Produk</h5>
                        <p class="mb-25">Untuk mengubah <code>Produk</code>, ubah data di form berikut.</p>
                        <div class="row">
                            <div class="col-sm">
                                <form action="{{ url('produk/'.$data->id) }}" method="post">
                                    @csrf
                                    @method('put')

                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="nm_produk">Nama Produk</label>
                                            <input class="form-control form-control-sm @error('nm_produk') is-invalid @enderror" id="nm_produk" placeholder="Nama Produk" name="nm_produk" value="{{ old('nm_produk', $data->nama_produk) }}" type="text">
                                            @error('nm_produk')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="kd_produk">Kode Produk</label>
                                            <input class="form-control form-control-sm @error('kd_produk') is-invalid @enderror" id="kd_produk" placeholder="Kode Produk" name="kd_produk" value="{{ old('kd_produk', $data->kode_produk) }}" type="text">
                                            @error('kd_produk')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="satuan">Satuan</label>
                                            <select class="form-control form-control-sm custom-select @error('satuan') is-invalid @enderror" name="satuan">
                                                <option value="pcs" {{ old('satuan', $data->satuan) == 'pcs' ? 'selected' : '' }}>pcs</option>
                                                <option value="pack" {{ old('satuan', $data->satuan) == 'pack' ? 'selected' : '' }}>pack</option>
                                                <option value="buah" {{ old('satuan', $data->satuan) == 'buah' ? 'selected' : '' }}>buah</option>
                                                <option value="kg" {{ old('satuan', $data->satuan) == 'kg' ? 'selected' : '' }}>kg</option>
                                            </select>
                                            @error('satuan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="harga">Harga Jual</label>
                                            <input class="form-control form-control-sm @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga', $data->harga) }}" type="number">
                                            @error('harga')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 mb-10">
                                            <label for="stok">Stock</label>
                                            <input class="form-control form-control-sm @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{ old('stok', $data->stok) }}" type="number">
                                            @error('stok')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <hr>
                                    <button class="btn btn-primary btn-sm" type="submit">Update</button>
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
