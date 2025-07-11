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
                            <form action="{{ url('biaya/' . $data->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="nama_customer">Nama Suplier</label>
                                        <select
                                            class="form-control custom-select-sm @error('nama_supplier') is-invalid @enderror"
                                            name="nama_supplier" id="nama_supplier" value="{{ old('nama_supplier') }}"
                                            disabled>
                                            <option value="{{ $data->supplier_id }}">{{ $data->supplier->nama_perusahaan }}
                                            </option>
                                            @foreach ($supplier as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_perusahaan }}</option>
                                            @endforeach
                                        </select>
                                        @error('nama_supplier')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="tanggal">Tanggal</label>
                                        <input class="form-control form-control-sm @error('tgl') is-invalid @enderror"
                                            id="tgl" name="tgl" type="date"
                                            value="{{ $data->tgl_transaksi ?? old('tgl') }}" readonly>
                                        @error('tgl')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="nomor_rekening">Alamat Pengiriman</label>
                                        <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" readonly>{{ $data->supplier->alamat ?? old('alamat') }}</textarea>
                                        @error('alamat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="kode_transaksi">Kode Transaksi</label>
                                        <input type="text" name="kode_transaksi"
                                            class="form-control form-control-sm @error('kode_transaksi') is-invalid @enderror"
                                            value="{{ $data->kode_transaksi }}" readonly>
                                        @error('kode_transaksi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="nama_customer">Sumber Dana</label>
                                    <select class="form-control custom-select-sm @error('sumber_dana') is-invalid @enderror"
                                        name="sumber_dana" id="sumber_dana" value="{{ old('sumber_dana') }}" disabled>
                                        <option value="{{ $data->chart_of_account_id }}">
                                            {{ $data->chartOfAccount->no_account }}
                                        </option>
                                        @foreach ($sumber_dana as $item)
                                            <option value="{{ $item->id }}">{{ $item->no_account }}
                                                {{ $item->description }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('sumber_dana')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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
                                            @foreach ($detailBiaya as $detail)
                                                <tr>
                                                    <td>
                                                        <select
                                                            class="form-control custom-select-sm @error('kode_akun.*') is-invalid @enderror"
                                                            name="kode_akun[]" disabled>
                                                            <option value="{{ $detail->chart_of_account_id }}">
                                                                {{ $detail->chartOfAccount->no_account }}
                                                            </option>
                                                            @foreach ($kode_akun as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->no_account }}
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
                                                            name="produk[]" value="{{ $detail->item_biaya }}" readonly>
                                                        @error('produk.*')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </td>
                                                    <td><input type="number" name="quantity[]"
                                                            class="form-control form-control-sm @error('quantity.*') is-invalid @enderror"
                                                            value="{{ $detail->qty }}" readonly></td>
                                                    @error('quantity.*')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                    <td><input type="text" name="harga[]"
                                                            class="form-control form-control-sm @error('harga.*') is-invalid @enderror"
                                                            value="{{ $detail->harga }}" readonly></td>
                                                    @error('harga.*')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                    <td><input type="text" name="total_harga[]"
                                                            class="form-control form-control-sm"
                                                            value="{{ $detail->total_harga }}" readonly>
                                                    </td>
                                                    <td><button type="button" class="btn btn-danger btn-sm remove-row"
                                                            hidden><i class="icon-trash txt-danger"></i></button></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    </br>
                                    <button type="button" id="add-row" class="btn btn-success btn-sm" hidden><i
                                            class="icon-plus"> Tambah Produk</i></button>
                                </div>

                                <div class="table-wrap">
                                    <table class="table table-hover mb-x0">
                                        <thead>
                                            {{-- <tr>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th>Pajak</th>
                                                <th><input type="text" class="form-control form-control-sm" name="pajak"
                                                        value="{{ old('pajak') }}"></th>
                                                @error('pajak')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </tr> --}}
                                            {{-- <tr>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th>Diskon</th>
                                                <th><input type="text" class="form-control form-control-sm" name="diskon"
                                                        value="{{ old('diskon') }}"></th>
                                                @error('diskon')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </tr> --}}
                                            <tr>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th><strong>Total</strong></th>
                                                <th class="input-group">
                                                    <span class="input-group-text form-control-sm"
                                                        id="basic-addon1">Rp</span>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="total" id="total" value="{{ $data->total_harga }}"
                                                        readonly>
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                                    </br>
                                </div>
                                <div class="col-md-4">
                                    @foreach ($fileUpload as $file)
                                        <div class="card">
                                            <div class="card-body d-flex justify-content-between">
                                                <a href="{{ asset('upload_biaya/' . $file->nama_file) }}"
                                                    target="_blank">{{ $file->nama_file }}</a>
                                                <button type="button" onclick="deleteBiayaFile('{{ $file->id }}')"
                                                    class="btn btn-outline-danger btn-sm">x</button>
                                            </div>
                                        </div>
                                    @endforeach
                                    <section class="hk-sec-wrapper" id="fileUpload" style="display: none">
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
                                <div>
                                    <div class="d-flex">
                                        <button type="submit" class="btn btn-primary" id="submit"
                                            name="action" value="submit">Submit</button>
                                        <button type="button" class="btn btn-success" style="margin-left: 2px"
                                            id="editButton">Edit</button>
                                    </div>
                                    <button type="button" onclick="biayaDelete('{{ $data->id }}')"
                                        class="btn btn-danger btn-sm" id="delete"
                                        style="float: right;">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script>
        let editMode = false;

        document.getElementById('editButton').addEventListener('click', function() {
            const inputs = document.querySelectorAll('input, select, textarea');
            const tombolSemua = document.querySelectorAll('.remove-row');
            const addRow = document.getElementById('add-row');
            const submitBtn = document.getElementById('submit');
            const editBtn = document.getElementById('editButton');
            const sumber_dana = document.getElementById('sumber_dana');

            editMode = !editMode;

            inputs.forEach(input => {
                if (input.tagName === 'SELECT') {
                    input.disabled = !editMode;
                } else if (
                    input.name !== 'tgl' &&
                    input.name !== 'kode_transaksi' &&
                    input.name !== 'total_harga[]'
                ) {
                    input.readOnly = !editMode;
                }
            });

            tombolSemua.forEach(tombol => {
                tombol.style.display = editMode ? 'inline-block' : 'none';
            });

            if (editMode) {
                // Aktifkan input
                addRow?.removeAttribute('hidden');
                sumber_dana?.removeAttribute('disabled');
                document.getElementById('tgl').removeAttribute('readonly')
                submitBtn.textContent = 'Update';
                submitBtn.value = 'update';
                editBtn.textContent = 'Back'; // tombol edit berubah jadi Back
            } else {
                // Kembali ke mode readonly
                addRow?.setAttribute('hidden', true);
                sumber_dana?.setAttribute('disabled', true);
                submitBtn.textContent = 'Submit';
                submitBtn.value = 'submit';
                editBtn.textContent = 'Edit'; // tombol back kembali jadi Edit
            }

            // File upload section SELALU TAMPIL
            document.getElementById('fileUpload').style.display = 'block';
        });

        // Pastikan file upload section langsung tampil saat halaman dibuka
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('fileUpload').style.display = 'block';
        });
    </script>

    <script>
        function deleteBiayaFile(id) {
            fetch('/file-biaya/' + id, {
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

        function detailProduk(id) {
            fetch('/detail-produk-penjualan/' + id, {
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

        function biayaDelete(id) {
            Swal.fire({
                title: 'Yakin ingin menghapus data ini?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('/biaya/' + id, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: data.message,
                                    timer: 1500,
                                    showConfirmButton: false
                                }).then(() => {
                                    window.location.href = '/biaya';
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: data.message
                                });
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
                                text: 'Tidak dapat menghapus data.'
                            });
                        });
                }
            });
        }
    </script>
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
        $('#dynamic-rows').on('click', '.remove-row', function() {
            $(this).closest('tr').remove();
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
                    totalEl.value = total.toFixed(2); // atau gunakan total.toFixed(0) jika tidak ingin desimal
                }

                totalKeseluruhan += total;
            });

            // Ambil nilai pajak dan diskon
            const pajak = parseFloat(document.querySelector('input[name="pajak"]')?.value) || 0;
            const diskon = parseFloat(document.querySelector('input[name="diskon"]')?.value) || 0;

            const grandTotal = totalKeseluruhan + pajak - diskon;

            // Tampilkan hasil akhir di input total
            const totalInput = document.querySelector('input[name="total"]');
            if (totalInput) {
                totalInput.value = grandTotal.toFixed(2); // bisa ubah ke toFixed(0) jika ingin tanpa koma
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
        const addRowBtn = document.getElementById('add-row');
        if (addRowBtn) {
            addRowBtn.addEventListener('click', function() {
                setTimeout(() => {
                    hitungTotal();
                }, 100);
            });
        }
    </script>
@endsection
