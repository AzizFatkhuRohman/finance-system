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
                                        <label for="nama_customer">Nama Customer</label>
                                        <select
                                            class="form-control custom-select-sm @error('nama_customer') is-invalid @enderror"
                                            name="nama_customer" id="nama_customer" value="{{ old('nama_customer') }}">
                                            <option value="">Pilih Customer</option>
                                            @foreach ($customer as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_perusahaan }}</option>
                                            @endforeach
                                        </select>
                                        @error('nama_customer')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="tanggal">Tanggal</label>
                                        <input class="form-control form-control-sm @error('tgl') is-invalid @enderror"
                                            id="tgl" name="tgl" type="date" value="{{ old('tgl') ?? date('Y-m-d')}}">
                                        @error('tgl')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="nomor_rekening">Alamat Pengiriman</label>
                                        <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" readonly>{{ old('alamat') }}</textarea>
                                        @error('alamat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="kode_transaksi">Kode Transaksi</label>
                                        <input type="text" name="kode_transaksi"
                                            class="form-control form-control-sm @error('kode_transaksi') is-invalid @enderror"
                                            value="{{ $kodeTransaksi }}" readonly>
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
                                                    <select
                                                        class="form-control custom-select-sm @error('kode_akun.*') is-invalid @enderror"
                                                        name="kode_akun[]">
                                                        <option value="">Pilih kode akun</option>
                                                        @foreach ($kode_akun as $item)
                                                            <option value="{{ $item->id }}">{{ $item->no_account }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('kode_akun.*')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <select
                                                        class="form-control custom-select-sm @error('produk') is-invalid @enderror"
                                                        name="produk[]">
                                                        <option selected>Pilih Produk</option>
                                                        @foreach ($produk as $item)
                                                            <option value="{{ $item->id }}"
                                                                data-harga="{{ $item->harga }}">{{ $item->nama_produk }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('produk')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                                <td><input type="number" name="quantity[]"
                                                        class="form-control form-control-sm @error('quantity') is-invalid @enderror"
                                                        value="">
                                                    @error('quantity')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                                <td><input type="text" name="harga[]"
                                                        class="form-control form-control-sm" readonly></td>
                                                <td><input type="text" name="total_harga[]"
                                                        class="form-control form-control-sm" readonly></td>
                                                <td><button type="button" class="btn btn-danger btn-sm remove-row"><i
                                                            class="icon-trash txt-danger"></i></button></td>
                                            </tr>
                                        </tbody>

                                    </table>
                                    </br>
                                    <button type="button" id="add-row" class="btn btn-success btn-sm"><i
                                            class="icon-plus"> Tambah Produk</i></button>
                                </div>

                                <div class="table-wrap">
                                    <table class="table table-hover mb-x0">
                                        <thead>
                                            <tr>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th>Pajak</th>
                                                <th class="input-group"><input type="number" min="0"
                                                        class="form-control form-control-sm" name="pajak"
                                                        value="{{ 0 ?? old('pajak') }}">
                                                    <span class="input-group-text form-control-sm"
                                                        id="basic-addon1">%</span>
                                                </th>
                                                @error('pajak')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </tr>
                                            <tr>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th>Diskon</th>
                                                <th class="input-group"><input type="number" min="0"
                                                        class="form-control form-control-sm" name="diskon"
                                                        value="{{ 0 ?? old('diskon') }}">
                                                    <span class="input-group-text form-control-sm"
                                                        id="basic-addon1">%</span>
                                                </th>
                                                @error('diskon')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </tr>
                                            <tr>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th><strong>Total</strong></th>
                                                <th class="input-group">
                                                    <span class="input-group-text form-control-sm"
                                                        id="basic-addon1">Rp</span>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="total" readonly>
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                                    </br>
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
        $(document).ready(function() {
            // Ketika customer dipilih
            $('#nama_customer').on('change', function() {
                var customerId = $(this).val(); // Ambil ID customer yang dipilih

                // Jika ID customer dipilih, kirim request AJAX
                if (customerId) {
                    $.ajax({
                        url: '/customer/' + customerId + '/alamat', // URL untuk mengambil alamat
                        method: 'GET',
                        success: function(response) {
                            if (response.alamat) {
                                // Isi textarea alamat dengan alamat yang diterima dari server
                                $('#alamat').val(response.alamat);
                            } else {
                                // Jika tidak ada alamat, kosongkan textarea
                                $('#alamat').val('');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log('Error:', error);
                            $('#alamat').val(''); // Kosongkan jika terjadi error
                        }
                    });
                } else {
                    // Jika tidak ada customer yang dipilih, kosongkan alamat
                    $('#alamat').val('');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Ketika produk dipilih
            $('#produk').on('change', function() {
                var productId = $(this).val(); // Ambil ID produk yang dipilih

                // Jika ID produk dipilih, kirim request AJAX untuk mengambil harga dan stok produk
                if (productId) {
                    $.ajax({
                        url: '/produk/' + productId + '/harga',
                        method: 'GET',
                        success: function(response) {
                            if (response.harga) {
                                // Isi textarea alamat dengan alamat yang diterima dari server
                                $('#harga').val(response.harga);
                            } else {
                                // Jika tidak ada harga, kosongkan textarea
                                $('#harga').val('');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log('Error:', error);
                            $('#harga').val(''); // Kosongkan jika terjadi error
                        }
                    });
                }
            });

            // Ketika quantity diubah
            $('input[name="quantity"]').on('input', function() {
                var harga = $(this).closest('tr').find('input[name="harga"]').val(); // Ambil harga
                var quantity = $(this).val(); // Ambil quantity
                var totalHarga = harga * quantity; // Hitung total harga

                // Tampilkan total harga
                $(this).closest('tr').find('input[name="total_harga"]').val(totalHarga);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Ketika produk dipilih
            $('#dynamic-rows').on('change', 'select[name="produk[]"]', function() {
                var productId = $(this).val(); // Ambil ID produk yang dipilih
                var harga = $(this).find('option:selected').data('harga'); // Ambil harga dari data atribut
                var row = $(this).closest('tr');

                // Isi harga dan hitung total harga berdasarkan quantity
                row.find('input[name="harga[]"]').val(harga);

                var quantity = row.find('input[name="quantity[]"]').val();
                var totalHarga = harga * quantity;
                row.find('input[name="total_harga[]"]').val(totalHarga);
            });

            // Ketika quantity diubah
            $('#dynamic-rows').on('input', 'input[name="quantity[]"]', function() {
                var quantity = $(this).val(); // Ambil quantity
                var harga = $(this).closest('tr').find('input[name="harga[]"]').val(); // Ambil harga
                var totalHarga = harga * quantity; // Hitung total harga
                $(this).closest('tr').find('input[name="total_harga[]"]').val(
                    totalHarga); // Update total harga
            });

            // Menambahkan baris baru
            $('#add-row').on('click', function() {
                const tableBody = $('#dynamic-rows');
                const newRow = $('<tr>');
                newRow.html(`
           <td>
                                                    <select
                                                        class="form-control custom-select-sm @error('kode_akun.*') is-invalid @enderror"
                                                        name="kode_akun[]">
                                                        <option value="">Pilih kode akun</option>
                                                        @foreach ($kode_akun as $item)
                                                            <option value="{{ $item->id }}">{{ $item->no_account }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('kode_akun.*')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <select
                                                        class="form-control custom-select-sm @error('produk.*') is-invalid @enderror"
                                                        name="produk[]">
                                                        <option selected>Pilih Produk</option>
                                                        @foreach ($produk as $item)
                                                            <option value="{{ $item->id }}"
                                                                data-harga="{{ $item->harga }}">{{ $item->nama_produk }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('produk.*')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                                <td><input type="number" name="quantity[]"
                                                        class="form-control form-control-sm @error('quantity.*') is-invalid @enderror"
                                                        value="">
                                                    @error('quantity.*')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </td>
            <td><input type="text" name="harga[]" class="form-control form-control-sm" readonly></td>
            <td><input type="text" name="total_harga[]" class="form-control form-control-sm" readonly></td>
            <td><button type="button" class="btn btn-danger btn-sm remove-row"><i class="icon-trash txt-danger"></i></button></td>
        `);
                tableBody.append(newRow);
            });

            // Menghapus baris
            $('#dynamic-rows').on('click', '.remove-row', function() {
                $(this).closest('tr').remove();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Hitung total harga untuk setiap baris
            $('#dynamic-rows').on('input', 'input[name="quantity[]"], input[name="harga[]"]', function() {
                updateTotal();
            });

            // Hitung total keseluruhan saat pajak atau diskon berubah
            $('input[name="pajak"], input[name="diskon"]').on('input', function() {
                updateTotal();
            });

            // Fungsi untuk menghitung total keseluruhan
            function updateTotal() {
                let totalHarga = 0;

                // Menjumlahkan total harga dari setiap produk
                $('input[name="total_harga[]"]').each(function() {
                    totalHarga += parseFloat($(this).val()) || 0; // Jika kosong, anggap 0
                });

                // Ambil nilai pajak dan diskon
                let pajak = parseFloat($('input[name="pajak"]').val()) || 0; // Default 0 jika kosong
                let diskon = parseFloat($('input[name="diskon"]').val()) || 0; // Default 0 jika kosong

                // Menghitung pajak dan diskon
                let pajakAmount = (pajak / 100) * totalHarga; // Pajak dihitung sebagai persentase
                let diskonAmount = (diskon / 100) * totalHarga; // Diskon dihitung sebagai persentase

                // Hitung total setelah pajak dan diskon
                let grandTotal = totalHarga + pajakAmount - diskonAmount;

                // Masukkan hasil ke dalam input Total
                $('input[name="total"]').val(grandTotal.toFixed(2)); // Menampilkan dengan 2 desimal
            }

            // Inisialisasi hitung total pertama kali jika ada data yang sudah ada
            updateTotal();
        });
    </script>
@endsection
