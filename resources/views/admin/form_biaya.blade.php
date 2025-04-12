@extends('partials.app')
@section('content')
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form Biaya</li>
        </ol>
    </nav>

    <div class="container-fluid">
        <div class="hk-pg-header">
            <h4 class="hk-pg-title">
                <span class="pg-title-icon">
                    <span class="feather-icon"><i data-feather="align-left"></i></span>
                </span>
                Form Biaya
            </h4>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <div class="row">
                        <div class="col-sm">
                            <form action="{{ url('Biaya') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="nama_customer">Nama Suplier</label>
                                        <select
                                            class="form-control custom-select-sm @error('nama_customer') is-invalid @enderror"
                                            name="nama_supplier" id="nama_supplier" value="{{ old('nama_customer') }}">
                                            <option value="">Pilih Supplier</option>
                                            @foreach ($supplier as $item)
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
                                            id="tgl" name="tgl" type="date" value="{{ old('tgl') }}">
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
                                                <th>Item Biaya</th>
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
                                                        <option value="">Pilih Kode Akun</option>
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
                                                    <input type="text"
                                                        class="form-control custom-select-sm @error('produk.*') is-invalid @enderror"
                                                        name="produk[]">
                                                    @error('produk.*')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                                <td><input type="number" name="quantity[]"
                                                        class="form-control form-control-sm @error('quantity.*') is-invalid @enderror"
                                                        value=""></td>
                                                @error('quantity.*')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                <td><input type="text" name="harga[]"
                                                        class="form-control form-control-sm @error('harga.*') is-invalid @enderror"
                                                        value=""></td>
                                                @error('harga.*')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                <td><input type="text" name="total_harga[]"
                                                        class="form-control form-control-sm" value="" readonly></td>
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
                                                <th><input type="text" class="form-control form-control-sm"
                                                        name="pajak" value="{{ old('pajak') }}"></th>
                                                @error('pajak')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </tr>
                                            <tr>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th>Diskon</th>
                                                <th><input type="text" class="form-control form-control-sm"
                                                        name="diskon" value="{{ old('diskon') }}"></th>
                                                @error('diskon')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </tr>
                                            <tr>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th><strong>Total</strong></th>
                                                <th><input type="text" class="form-control form-control-sm"
                                                        name="total" id="total" readonly>
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                                    </br>
                                </div>
                                <div class="col-md-4">
                                    <section class="hk-sec-wrapper">
                                        <h5 class="hk-sec-title">File Upload</h5>
                                        <p class="mb-40">upload jika ada lampiran.</p>
                                        <div class="row">
                                            <div class="col-sm">
                                                <div class="dropzone" id="remove_link">
                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple />
                                                    </div>
                                                </div>
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
        $(document).ready(function() {
            // Ketika customer dipilih
            $('#nama_supplier').on('change', function() {
                var supplierId = $(this).val(); // Ambil ID customer yang dipilih

                // Jika ID customer dipilih, kirim request AJAX
                if (supplierId) {
                    $.ajax({
                        url: '/supplier/' + supplierId + '/alamat', // URL untuk mengambil alamat
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
        const kodeAkunOptions = `
            @foreach ($kode_akun as $item)
                <option value="{{ $item->id }}">{{ $item->no_account }}</option>
            @endforeach
        `;
    </script>
    <script>
        // JavaScript untuk menambah input barang
        document.getElementById('add-row').addEventListener('click', function() {
            const tableBody = document.getElementById('dynamic-rows');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>
                    <select class="form-control custom-select-sm" name="kode_akun[]">
                         <option value="">Pilih Kode Akun</option>
            ${kodeAkunOptions}
                    </select>
                </td>
                <td><input type="text" class="form-control custom-select-sm name="produk[]" value=""> </td>
                <td><input type="number" name="quantity[]" class="form-control form-control-sm" value=""></td>
                <td><input type="text" name="harga[]" class="form-control form-control-sm" value=""></td>
                <td><input type="text" name="total_harga[]" class="form-control form-control-sm" value="" readonly></td>
                <td><button type="button" class="btn btn-danger btn-sm remove-row"><i class="icon-trash txt-danger"></i></button></td>
            `;
            tableBody.appendChild(newRow);
        });

        document.getElementById('dynamic-rows').addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('remove-row')) {
                e.target.closest('tr').remove();
            }
        });
    </script>
    <script>
        function hitungTotal() {
            let totalKeseluruhan = 0;

            // Loop semua baris dan hitung total per baris
            document.querySelectorAll('#dynamic-rows tr').forEach(function(row) {
                const qtyEl = row.querySelector('input[name="quantity[]"]');
                const hargaEl = row.querySelector('input[name="harga[]"]');
                const totalEl = row.querySelector('input[name="total_harga[]"]');

                const qty = parseFloat(qtyEl?.value) || 0;
                const harga = parseFloat(hargaEl?.value) || 0;
                const total = qty * harga;

                if (totalEl) {
                    totalEl.value = total.toFixed(2);
                }

                totalKeseluruhan += total;
            });

            // Ambil nilai pajak dan diskon
            const pajak = parseFloat(document.querySelector('input[name="pajak"]').value) || 0;
            const diskon = parseFloat(document.querySelector('input[name="diskon"]').value) || 0;

            const grandTotal = totalKeseluruhan + pajak - diskon;

            // Tampilkan hasil akhir di input total
            const totalInput = document.querySelector('input[name="total"]');
            if (totalInput) {
                totalInput.value = grandTotal.toFixed(2);
            }
        }

        // Jalankan saat input berubah
        document.addEventListener('input', function(e) {
            const namesToWatch = ['quantity[]', 'harga[]', 'pajak', 'diskon'];
            if (namesToWatch.includes(e.target.name)) {
                hitungTotal();
            }
        });

        // Jalankan juga saat tambah baris
        document.getElementById('add-row').addEventListener('click', function() {
            setTimeout(() => {
                hitungTotal();
            }, 100);
        });
    </script>
@endsection
