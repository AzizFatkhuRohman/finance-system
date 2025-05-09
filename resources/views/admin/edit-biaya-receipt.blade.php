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
                                                                {{ $detail->chartOfAccount->no_account }}</option>
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
                                                    {{-- <td><button type="button" class="btn btn-danger btn-sm remove-row"
                                                            hidden><i class="icon-trash txt-danger"></i></button></td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    </br>
                                    {{-- <button type="button" id="add-row" class="btn btn-success btn-sm" hidden><i
                                            class="icon-plus"> Tambah Produk</i></button> --}}
                                </div>

                                <div class="table-wrap">
                                    <table class="table table-hover mb-x0">
                                        <thead>
                                            {{-- <tr>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th>Pajak</th>
                                                <th><input type="text" class="form-control form-control-sm"
                                                        name="pajak" value="{{ old('pajak') }}"></th>
                                                @error('pajak')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </tr> --}}
                                            {{-- <tr>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th style="width: 20%;"></th>
                                                <th>Diskon</th>
                                                <th><input type="text" class="form-control form-control-sm"
                                                        name="diskon" value="{{ old('diskon') }}"></th>
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
                                    {{-- <section class="hk-sec-wrapper">
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
                                    @endif --}}

                                    {{-- @foreach ($errors->get('file.*') as $messages)
                                        @foreach ($messages as $message)
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @endforeach
                                    @endforeach --}}
                                </div>
                                <div>
                                    {{-- <div class="d-flex">
                                        <button type="submit" class="btn btn-primary" id="submit"
                                            name="action" value="submit">Submit</button>
                                        <button type="button" class="btn btn-success" style="margin-left: 2px"
                                            id="editButton">Edit</button>
                                    </div> --}}
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
            const inputs = document.querySelectorAll('input, select');
            const tombolSemua = document.querySelectorAll('.remove-row');
            const addRow = document.getElementById('add-row');
            const submitBtn = document.getElementById('submit');
            const editBtn = document.getElementById('editButton');

            editMode = !editMode;

            inputs.forEach(input => {
                if (input.tagName === 'SELECT') {
                    if (editMode) {
                        input.removeAttribute('disabled');
                    } else {
                        input.setAttribute('disabled', true);
                    }
                }
                // Untuk input selain total_harga[], tgl, kode_transaksi, dan harga
                else if (input.name !== 'tgl' && input.name !== 'kode_transaksi' && input.name !==
                    'total_harga[]') {
                    if (editMode) {
                        input.removeAttribute('readonly');
                    } else {
                        input.setAttribute('readonly', true);
                    }
                }
            });

            tombolSemua.forEach(tombol => {
                if (editMode) {
                    tombol.removeAttribute('hidden');
                } else {
                    tombol.setAttribute('hidden', true);
                }
            });

            if (editMode) {
                addRow?.removeAttribute('hidden');
                submitBtn.textContent = 'Update';
                submitBtn.value = 'update';
                submitBtn.removeAttribute('hidden');
                editBtn.setAttribute('hidden', true); // Sembunyikan tombol edit
            } else {
                addRow?.setAttribute('hidden', true);
                submitBtn.textContent = 'Submit';
                submitBtn.setAttribute('hidden', true); // Sembunyikan tombol submit
                editBtn.removeAttribute('hidden'); // Munculkan kembali tombol edit
            }
        });
    </script>
    <script>
        // function deleteBiayaFile(id) {
        //     fetch('/file-biaya/' + id, {
        //             method: 'DELETE',
        //             headers: {
        //                 'Content-Type': 'application/json',
        //                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
        //             },
        //         })
        //         .then(response => {
        //             if (response.ok) {
        //                 location.reload();
        //             }
        //         })
        //         .catch(error => {
        //             console.error('Terjadi kesalahan:', error);
        //         });
        // }

        // function detailProduk(id) {
        //     fetch('/detail-produk-penjualan/' + id, {
        //             method: 'DELETE',
        //             headers: {
        //                 'Content-Type': 'application/json',
        //                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
        //             },
        //         })
        //         .then(response => {
        //             if (response.ok) {
        //                 location.reload();
        //             }
        //         })
        //         .catch(error => {
        //             console.error('Terjadi kesalahan:', error);
        //         });
        // }

        function biayaDelete(id) {
            fetch('/biaya-receipt/' + id, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                })
                .then(response => {
                    if (response.ok) {
                        // Redirect ke halaman penjualan jika berhasil
                        window.location.href = '/biaya';
                    } else {
                        return response.text().then(text => {
                            console.error('Gagal menghapus biaya:', text);
                        });
                    }
                })
                .catch(error => {
                    console.error('Terjadi kesalahan:', error);
                });
        }
    </script>
@endsection
