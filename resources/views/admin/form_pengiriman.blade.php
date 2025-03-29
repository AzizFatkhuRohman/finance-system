@extends('partials.app')
@section('content')
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form Pengiriman</li>
        </ol>
    </nav>

    <div class="container-fluid">
        <div class="hk-pg-header">
            <h4 class="hk-pg-title">
                <span class="pg-title-icon">
                    <span class="feather-icon"><i data-feather="align-left"></i></span>
                </span>
                Form Pengiriman
            </h4>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <div class="row">
                        <div class="col-sm">
                            <form action="{{ url('penjualan') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="nama_bank">Nama Customer</label>
                                        <input class="form-control form-control-sm @error('nama_customer') is-invalid @enderror"
                                            id="nama_bank" name="nama_bank" type="text"
                                            value="{{ old('nama_customer') }}" readonly>
                                        @error('nama_bank')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="tanggal">Tanggal</label>
                                        <input class="form-control form-control-sm @error('tgl') is-invalid @enderror" id="cabang"
                                            name="cabang" type="date" value="{{ old('tgl') }}" readonly>
                                        @error('tgl')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="nomor_rekening">Alamat Pengiriman</label>
                                        <textarea name="alamat"
                                            class="form-control @error('nomor_rekening') is-invalid @enderror" readonly>{{ old('nomor_rekening') }}</textarea>
                                        @error('nomor_rekening')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="nama_pemilik">Kode Transaksi</label>
                                        <input type="text" name="kode_transaksi"
                                            class="form-control form-control-sm @error('kode_transaksi') is-invalid @enderror"
                                            value="{{ old('kode_transaksi') }}" readonly>
                                        @error('kode_transaksi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <br>
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
                                                <td>
                                                    <select class="form-control custom-select-sm" readonly>
                                                        <option selected>Kode Akun</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control custom-select-sm" readonly>
                                                        <option selected>Pilih Produk</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </td>
                                                <td><input type="number" name="quantity" class="form-control form-control-sm" value="" readonly></td>
                                                <td><input type="text" name="harga" class="form-control form-control-sm" value="" readonly></td>
                                                <td><input type="text" name="total_harga" class="form-control form-control-sm" value="" readonly></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </br>
                                </div>
                                <div class="table-wrap">
                                    <table class="table table-hover mb-x0">
                                        <thead>
                                            <tr>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th>Pajak</th>
                                                <th><input type="text" class="form-control form-control-sm" readonly></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th>Diskon</th>
                                                <th><input type="text" class="form-control form-control-sm" readonly></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th><strong>Total</strong></th>
                                                <th><input type="text" name="total" class="form-control form-control-sm" readonly></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </br>
                                </div>
                                <div class="col-xl-4">
                                    <section class="hk-sec-wrapper">
                                        <h5 class="hk-sec-title">File Upload</h5>
                                        <p class="mb-40">upload jika ada lampiran.</p>
                                        <div  class="row">
                                            <div class="col-sm">
                                                <form action="#" class="dropzone" id="remove_link">
                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                <button type="button" id="editButton" class="btn btn-warning btn-sm">Edit</button>
                            </form>
                            <script>
                                document.getElementById('editButton').addEventListener('click', function () {
                                    const inputs = document.querySelectorAll('input, textarea, select');
                                    const isReadonly = inputs[0].hasAttribute('readonly');
                                    inputs.forEach(input => {
                                        if (input.name !== 'total_harga' && input.name !== 'total') { // Exclude specific inputs
                                            if (isReadonly) {
                                                input.removeAttribute('readonly');
                                            } else {
                                                input.setAttribute('readonly', true);
                                            }
                                        }
                                    });
                                    this.textContent = isReadonly ? 'Update' : 'Edit';
                                });
                            </script>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
