@extends('partials.app')

@section('content')
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form Suplier</li>
        </ol>
    </nav>

    <div class="container-fluid">
        <div class="hk-pg-header">
            <h4 class="hk-pg-title">
                <span class="pg-title-icon">
                    <span class="feather-icon">
                        <i data-feather="align-left"></i>
                    </span>
                </span>
                Form Suplier
            </h4>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Tambah Suplier</h5>
                    <p class="mb-25">Isi form berikut dengan lengkap.</p>
                    <div class="row">
                        <div class="col-sm">
                            <form action="{{ url('suplier') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nama_perusahaan">Nama PT/CV</label>
                                    <input class="form-control @error('nama_perusahaan') is-invalid @enderror"
                                        id="nama_perusahaan" name="nama_perusahaan" type="text"
                                        value="{{ old('nama_perusahaan') }}">
                                    @error('nama_perusahaan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="akronim">Akronim</label>
                                    <input class="form-control @error('akronim') is-invalid @enderror" id="akronim"
                                        name="akronim" type="text" value="{{ old('akronim') }}">
                                    @error('akronim')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control @error('email') is-invalid @enderror" id="email"
                                        name="email" type="email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                        name="alamat" type="text" value="{{ old('alamat') }}">
                                    @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-10">
                                        <label for="province">Provinsi</label>
                                        <select name="province" id="province"
                                            class="custom-select @error('province') is-invalid @enderror">
                                            <option value="">Pilih Provinsi</option>
                                            @foreach ($provinsi as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('province') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('province')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-10">
                                        <label for="regency">Kabupaten</label>
                                        <select name="regency" id="regency"
                                            class="custom-select @error('regency') is-invalid @enderror">
                                            <option value="">Pilih Kabupaten</option>
                                        </select>
                                        @error('regency')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-10">
                                        <label for="regency">Kecamatan</label>
                                        <select name="district" id="district"
                                            class="custom-select @error('district') is-invalid @enderror">
                                            <option value="">Pilih Kecamatan</option>
                                        </select>
                                        @error('district')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-10">
                                        <label for="regency">Desa</label>
                                        <select name="village" id="village"
                                            class="custom-select @error('village') is-invalid @enderror">
                                            <option value="">Pilih Desa</option>
                                        </select>
                                        @error('village')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-10">
                                        <label for="kode_pos">Kode Pos</label>
                                        <input type="text" name="kode_pos"
                                            class="form-control @error('kode_pos') is-invalid @enderror"
                                            value="{{ old('kode_pos') }}">
                                        @error('kode_pos')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nomor_rekening">No Rekening</label>
                                    <input class="form-control @error('nomor_rekening') is-invalid @enderror"
                                        id="nomor_rekening" name="nomor_rekening" type="text"
                                        value="{{ old('nomor_rekening') }}">
                                    @error('nomor_rekening')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nama_bank">Nama Bank</label>
                                    <input class="form-control @error('nama_bank') is-invalid @enderror" id="nama_bank"
                                        name="nama_bank" type="text" value="{{ old('nama_bank') }}">
                                    @error('nama_bank')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nama_pemilik">Nama Pemilik Rekening</label>
                                    <input class="form-control @error('nama_pemilik') is-invalid @enderror"
                                        id="nama_pemilik" name="nama_pemilik" type="text"
                                        value="{{ old('nama_pemilik') }}">
                                    @error('nama_pemilik')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="npwp">NPWP</label>
                                    <input class="form-control @error('npwp') is-invalid @enderror" id="npwp"
                                        name="npwp" type="text" value="{{ old('npwp') }}">
                                    @error('npwp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button class="btn btn-primary" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- /Container -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#province').on('change', function() {
                let province_id = $(this).val();
                $('#regency').html('<option value="">Pilih Kota/Kabupaten</option>');
                $('#district').html('<option value="">Pilih Kecamatan</option>');
                $('#village').html('<option value="">Pilih Kelurahan/Desa</option>');

                if (province_id) {
                    $.get('/cities', {
                        province_id: province_id
                    }, function(data) {
                        $.each(data, function(id, name) {
                            $('#regency').append(new Option(name, id));
                        });
                    });
                }
            });

            $('#regency').on('change', function() {
                let regency_id = $(this).val();
                $('#district').html('<option value="">Pilih Kecamatan</option>');
                $('#village').html('<option value="">Pilih Kelurahan/Desa</option>');

                if (regency_id) {
                    $.get('/districts', {
                        regency_id: regency_id
                    }, function(data) {
                        $.each(data, function(id, name) {
                            $('#district').append(new Option(name, id));
                        });
                    });
                }
            });

            $('#district').on('change', function() {
                let district_id = $(this).val();
                $('#village').html('<option value="">Pilih Kelurahan/Desa</option>');

                if (district_id) {
                    $.get('/villages', {
                        district_id: district_id
                    }, function(data) {
                        $.each(data, function(id, name) {
                            $('#village').append(new Option(name, id));
                        });
                    });
                }
            });
        });
    </script>
@endsection
