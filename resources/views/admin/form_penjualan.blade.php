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
            <h4 class="hk-pg-title">
                <span class="pg-title-icon">
                    <span class="feather-icon"><i data-feather="align-left"></i></span>
                </span>
                Form Penjualan
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
                                        <select class="form-control custom-select-sm" name="nama_customer" value="{{ old('nama_customer') }}">
                                            <option selected>Customer</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                        @error('nama_bank')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="tanggal">Tanggal</label>
                                        <input class="form-control form-control-sm @error('tgl') is-invalid @enderror" id="cabang"
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
                                            class="form-control @error('nomor_rekening') is-invalid @enderror">{{ old('nomor_rekening') }}</textarea>
                                        @error('nomor_rekening')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="nama_pemilik">Kode Transaksi</label>
                                        <input type="text" name="kode_transaksi"
                                            class="form-control form-control-sm @error('kode_transaksi') is-invalid @enderror"
                                            value="{{ old('kode_transaksi') }}">
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
                                        <tbody id="dynamic-rows">
                                            <tr>
                                                <td>
                                                    <select class="form-control custom-select-sm" name="kode_akun[]">
                                                        <option selected>Kode Akun</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control custom-select-sm" name="produk[]">
                                                        <option selected>Pilih Produk</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </td>
                                                <td><input type="number" name="quantity[]" class="form-control form-control-sm" value=""></td>
                                                <td><input type="text" name="harga[]" class="form-control form-control-sm" value=""></td>
                                                <td><input type="text" name="total_harga[]" class="form-control form-control-sm" value="" readonly></td>
                                                <td><button type="button" class="btn btn-danger btn-sm remove-row"><i class="icon-trash txt-danger"></i></button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </br>
                                <button type="button" id="add-row" class="btn btn-success btn-sm"><i class="icon-plus"> Tambah Produk</i></button>
                                </div>
                                <div class="table-wrap">
                                    <table class="table table-hover mb-x0">
                                        <thead>
                                            <tr>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th>Pajak</th>
                                                <th><input type="text" class="form-control form-control-sm"></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th>Diskon</th>
                                                <th><input type="text" class="form-control form-control-sm"></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th><strong>Total</strong></th>
                                                <th><input type="text" class="form-control form-control-sm" readonly></th>
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
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script>
        // JavaScript untuk menambah input barang
        document.getElementById('add-row').addEventListener('click', function () {
            const tableBody = document.getElementById('dynamic-rows');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>
                    <select class="form-control custom-select-sm" name="kode_akun[]">
                        <option selected>Kode Akun</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </td>
                <td>
                    <select class="form-control custom-select-sm" name="produk[]">
                        <option selected>Pilih Produk</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </td>
                <td><input type="number" name="quantity[]" class="form-control form-control-sm" value=""></td>
                <td><input type="text" name="harga[]" class="form-control form-control-sm" value=""></td>
                <td><input type="text" name="total_harga[]" class="form-control form-control-sm" value="" readonly></td>
                <td><button type="button" class="btn btn-danger btn-sm remove-row"><i class="icon-trash txt-danger"></i></button></td>
            `;
            tableBody.appendChild(newRow);
        });

        document.getElementById('dynamic-rows').addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('remove-row')) {
                e.target.closest('tr').remove();
            }
        });
    </script>
@endsection
