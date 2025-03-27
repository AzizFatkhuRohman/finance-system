@extends('partials.app')

@section('content')
<div class="hk-pg-wrapper">
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Edit</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Customer</li>
        </ol>
    </nav>

    <div class="container-fluid">
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
                            data-feather="align-left"></i></span></span>Edit Customer</h4>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Edit Customer {{$data->code_customer}}</h5>
                    <p class="mb-25">Isi form berikut dengan lengkap.</p>
                    <div class="row">
                        <div class="col-sm">
                            <form action="{{ url('customer/'.$data->id) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="nama_perusahaan">Nama PT/CV</label>
                                        <input type="text" name="nama_perusahaan"
                                            class="form-control @error('nama_perusahaan') is-invalid @enderror"
                                            value="{{ old('nama_perusahaan', $data->nama_perusahaan) }}">
                                        @error('nama_perusahaan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- <div class="col-md-6 form-group">
                                        <label for="akronim">Akronim</label>
                                        <input type="text" name="akronim"
                                            class="form-control @error('akronim') is-invalid @enderror"
                                            value="{{ old('akronim',$data->akronim) }}">
                                        @error('akronim')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div> --}}
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email',$data->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="4">{{ old('alamat', $data->alamat) }}</textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>                                

                                {{-- <div class="row">
                                    <div class="col-md-6 mb-10">
                                        <label for="province">Provinsi</label>
                                        <select name="province" id="province"
                                            class="custom-select @error('province') is-invalid @enderror">
                                            <option value="{{$data->province_id}}" selected>{{$data->province->name}}</option>
                                            @foreach ($provinsi as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('province', $data->province_id) == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
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
                                            <option value="{{$data->regency_id}}" selected>{{$data->regency->name}}</option>
                                        </select>
                                        @error('regency')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-10">
                                        <label for="district">Kecamatan</label>
                                        <select name="district" id="district"
                                            class="custom-select @error('district') is-invalid @enderror">
                                            <option value="{{$data->district_id}}" selected>{{$data->district->name}}</option>
                                        </select>
                                        @error('district')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-10">
                                        <label for="village">Desa</label>
                                        <select name="village" id="village"
                                            class="custom-select @error('village') is-invalid @enderror">
                                            <option value="{{$data->village_id}}" selected>{{$data->village->name}}</option>
                                        </select>
                                        @error('village')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-10">
                                        <label for="kode_pos">Kode Pos</label>
                                        <input type="text" name="kode_pos"
                                            class="form-control @error('kode_pos') is-invalid @enderror"
                                            value="{{ old('kode_pos',$data->kode_pos) }}">
                                        @error('kode_pos')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> --}}

                                <h6 class="form-group">Informasi Bank</h6>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="nama_bank">Nama Bank</label>
                                        <input class="form-control @error('nama_bank') is-invalid @enderror"
                                            id="nama_bank" name="nama_bank" type="text"
                                            value="{{ old('nama_bank',$data->nama_bank) }}">
                                        @error('nama_bank')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="cabang">Cabang Bank</label>
                                        <input class="form-control @error('cabang') is-invalid @enderror"
                                            id="cabang" name="cabang" type="text"
                                            value="{{ old('cabang',$data->cabang) }}">
                                        @error('cabang')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="nomor_rekening">No Rekening</label>
                                        <input type="text" name="nomor_rekening"
                                            class="form-control @error('nomor_rekening') is-invalid @enderror"
                                            value="{{ old('nomor_rekening',$data->nomor_rekening) }}">
                                        @error('nomor_rekening')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="nama_pemilik">Nama Pemilik Rekening</label>
                                        <input type="text" name="nama_pemilik"
                                            class="form-control @error('nama_pemilik') is-invalid @enderror"
                                            value="{{ old('nama_pemilik',$data->nama_pemilik) }}">
                                        @error('nama_pemilik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="npwp">NPWP</label>
                                    <input type="text" name="npwp"
                                        class="form-control @error('npwp') is-invalid @enderror"
                                        value="{{ old('npwp',$data->npwp) }}">
                                    @error('npwp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#province').on('change', function() {
            let province_id = $(this).val();
            $('#regency').html('<option value="">Pilih Kota/Kabupaten</option>');
            $('#district').html('<option value="">Pilih Kecamatan</option>');
            $('#village').html('<option value="">Pilih Kelurahan/Desa</option>');

            if (province_id) {
                $.get('/cities', { province_id: province_id }, function(data) {
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
                $.get('/districts', { regency_id: regency_id }, function(data) {
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
                $.get('/villages', { district_id: district_id }, function(data) {
                    $.each(data, function(id, name) {
                        $('#village').append(new Option(name, id));
                    });
                });
            }
        });
    });
</script>
@endsection
