@extends('partials.app')
@section('content')
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form Faktur</li>
        </ol>
    </nav>

    <div class="container-fluid">
        <div class="hk-pg-header">
            <h4 class="hk-pg-title">
                <span class="pg-title-icon">
                    <span class="feather-icon"><i data-feather="align-left"></i></span>
                </span>
                Form Faktur
            </h4>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <div class="row">
                        <div class="col-sm">
                            <form action="{{ url('penjualan/faktur/' . $data->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="nama_bank">Nama Customer</label>
                                        <select
                                            class="form-control custom-select-sm @error('nama_customer') is-invalid @enderror"
                                            name="nama_customer" id="nama_customer" disabled>
                                            <option value="{{ $data->customer_id }}">{{ $data->customer->nama_perusahaan }}
                                            </option>
                                        </select>
                                        @error('nama_customer')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6" id="tgl_bayar">
                                        <label for="tanggal">Tanggal Pembayaran</label>
                                        <input class="form-control form-control-sm @error('tgl_bayar') is-invalid @enderror"
                                            id="cabang" name="tgl_bayar" type="date"
                                            value="{{ $data->tgl_bayar ?? old('tgl_bayar') }}">
                                        @error('tgl_bayar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="nomor_rekening">Alamat Pengiriman</label>
                                        <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" readonly>{{ $data->customer->alamat ?? old('alamat') }}</textarea>
                                        @error('alamat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="nama_pemilik">Kode Transaksi</label>
                                        <input type="text" name="kode_transaksi"
                                            class="form-control form-control-sm @error('kode_transaksi') is-invalid @enderror"
                                            value="{{ $data->kode_transaksi }}" readonly>
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
                                            @foreach ($DetailProdukPenjualan as $penjualan)
                                                <tr>
                                                    <td>
                                                        <select
                                                            class="form-control custom-select-sm @error('kode_akun.*') is-invalid @enderror"
                                                            name="kode_akun[]" disabled>
                                                            <option value="{{ $penjualan->chart_of_account_id }}">
                                                                {{ $penjualan->chartOfAccount->no_account }}</option>
                                                        </select>
                                                        @error('kode_akun.*')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <select
                                                            class="form-control custom-select-sm @error('produk') is-invalid @enderror"
                                                            name="produk[]" disabled>
                                                            <option value="{{ $penjualan->product_id }}">
                                                                {{ $penjualan->product->nama_produk }}</option>
                                                        </select>
                                                        @error('produk')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </td>
                                                    <td><input type="number" name="quantity[]"
                                                            class="form-control form-control-sm @error('quantity') is-invalid @enderror"
                                                            value="{{ $penjualan->qty }}" readonly>
                                                        @error('quantity')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </td>
                                                    <td><input type="text" name="harga[]"
                                                            class="form-control form-control-sm"
                                                            value="{{ $penjualan->product->harga }}" readonly></td>
                                                    <td><input type="text" name="total_harga[]"
                                                            class="form-control form-control-sm"
                                                            value="{{ $penjualan->total_harga }}" readonly></td>
                                                    <td><button type="button" class="btn btn-danger btn-sm remove-row"
                                                            id="tombol" hidden><i
                                                                class="icon-trash txt-danger"></i></button></td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                                <div class="table-wrap">
                                    <table class="table table-hover mb-x0">
                                        <thead>
                                            <tr>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th>Pajak</th>
                                                <th><input type="text" class="form-control form-control-sm"
                                                        value="{{ $data->pajak }}" readonly>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th>Diskon</th>
                                                <th><input type="text" class="form-control form-control-sm"
                                                        value="{{ $data->diskon }}" readonly>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th><strong>Total</strong></th>
                                                <th><input type="text" name="total"
                                                        class="form-control form-control-sm" value="{{ $data->total_harga }}" readonly></th>
                                            </tr>
                                        </thead>
                                    </table>
                                    </br>
                                </div>
                                <div class="col-xl-4">
                                    @foreach ($FilePenjualan as $file)
                                        <div class="card">
                                            <div class="card-body d-flex justify-content-between">
                                                <a href="{{ asset('upload_penjualan/' . $file->nama_file) }}"
                                                    target="_blank">{{ $file->nama_file }}</a>
                                                <button type="button" onclick="deleteFile('{{ $file->id }}')"
                                                    class="btn btn-outline-danger btn-sm">x</button>
                                            </div>
                                        </div>
                                    @endforeach
                                    <section class="hk-sec-wrapper">
                                        <h5 class="hk-sec-title">File Upload</h5>
                                        <p class="mb-40">upload jika ada lampiran.</p>
                                        <div class="row">
                                            <div class="col-sm">
                                                <div class="fallback">
                                                    <input type="file" multiple name="file[]" />
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    @if ($errors->has('file'))
                                    <div class="invalid-feedback d-block">{{ $errors->first('file') }}</div>
                                @endif

                                @foreach ($errors->get('file.*') as $messages)
                                    @foreach ($messages as $message)
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @endforeach
                                @endforeach
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                {{-- <button type="button" id="editButton" class="btn btn-warning btn-sm">Edit</button> --}}
                                <button type="button" class="btn btn-danger btn-sm" onclick="fakturDelete('{{ $data->id }}')"
                                    style="float: right;">Delete</button>
                            </form>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script>
        function deleteFile(id) {
            fetch('/file-penjualan/' + id, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                })
                .then(response => {
                    if (response.ok) {
                        location.reload();
                    }
                })
                .catch(error => {
                    console.error('Terjadi kesalahan:', error);
                });
        }
        function fakturDelete(id) {
            fetch('/penjualan/faktur/delete/' + id, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                })
                .then(response => {
                    if (response.ok) {
                        // Redirect ke halaman penjualan jika berhasil
                        window.location.href = '/penjualan';
                    } else {
                        return response.text().then(text => {
                            console.error('Gagal menghapus penjualan:', text);
                        });
                    }
                })
                .catch(error => {
                    console.error('Terjadi kesalahan:', error);
                });
        }
    </script>
@endsection
