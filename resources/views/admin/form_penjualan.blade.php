@extends('partials.app')
@section('content')
        <nav class="hk-breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light bg-transparent">
                <li class="breadcrumb-item"><a href="#">Forms</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form Penjualan</li>
            </ol>
        </nav>

        <div class="container-fluid">
            <div class="hk-pg-header">
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
                                data-feather="align-left"></i></span></span>Form Penjualan</h4>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <section class="hk-sec-wrapper">
                        <!-- <h5 class="hk-sec-title">Tambah Penjualan</h5>
                        <p class="mb-25">Isi form berikut dengan lengkap.</p> -->
                        <div class="row">
                            <div class="col-sm">
                                <form action="{{ url('penjualan') }}" method="post">
                                    @csrf
                                    
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="nama_bank">Nama Customer</label>
                                            <input class="form-control @error('nama_customer') is-invalid @enderror"
                                                id="nama_bank" name="nama_bank" type="text"
                                                value="{{ old('nama_customer') }}">
                                            @error('nama_bank')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="tanggal">Tanggal</label>
                                            <input class="form-control @error('tgl') is-invalid @enderror" id="cabang"
                                                name="cabang" type="date" value="{{ old('tgl') }}">
                                            @error('tgl')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="nomor_rekening">Alamat Pengiriman</label>
                                            <textarea name="alamat"
                                                class="form-control @error('nomor_rekening') is-invalid @enderror"
                                                value="{{ old('nomor_rekening') }}"></textarea>
                                            @error('nomor_rekening')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="nama_pemilik">Kode Transaksi</label>
                                            <input type="text" name="kode_transaksi"
                                                class="form-control @error('kode_transaksi') is-invalid @enderror"
                                                value="{{ old('kode_transaksi') }}">
                                            @error('kode_transaksi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </br>
                                    <div class="table-wrap">
                                        <table class="table table-hover mb-x0">
                                            <thead>
                                                <tr>
                                                    <th>Kode Akun</th>
                                                    <th>Produk</th>
                                                    <th>Quantity</th>
                                                    <th>Harga</th>
                                                    <th>Total Harga</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                    <tr>
                                                        <td><input type="text" name="kode_transaksi"
                                                class="form-control"
                                                value=""></td>
                                                        <td><input type="text" name="kode_transaksi"
                                                class="form-control"
                                                value=""></td>
                                                        <td><input type="text" name="kode_transaksi"
                                                class="form-control"
                                                value=""></td>
                                                        <td><input type="text" name="kode_transaksi"
                                                class="form-control"
                                                value=""></td>
                                                        <td><input type="text" name="kode_transaksi"
                                                class="form-control"
                                                value=""></td>
                                                        
                                                    </tr>
                                            
                                            </tbody>
                                    
                                        </table>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

@endsection
