@extends('partials.app')
@section('content')
    <!-- Main Content -->
    <div class="hk-pg-wrapper">
        <!-- Breadcrumb -->
        <nav class="hk-breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light bg-transparent">
                <li class="breadcrumb-item"><a href="#">Forms</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form Customer</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->

        <!-- Container -->
        <div class="container-fluid">
            <!-- Title -->
            <div class="hk-pg-header">
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
                                data-feather="align-left"></i></span></span>Form Customer</h4>
            </div>
            <!-- /Title -->

            <!-- Row -->
            <div class="row">
                <div class="col-xl-12">
                    <section class="hk-sec-wrapper">
                        <h5 class="hk-sec-title">Tambah Customer</h5>
                        <p class="mb-25">Untuk menambah customer isi form berikut dengan lengkap.</p>
                        <div class="row">
                            <div class="col-sm">
                                <form action="{{ url('customer') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="firstName">Nama PT/CV</label>
                                            <input class="form-control" id="firstName" placeholder="" value=""
                                                type="text">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="lastName">Nama Singkat</label>
                                            <input class="form-control" id="lastName" placeholder="" value=""
                                                type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input class="form-control" id="email" placeholder="you@example.com"
                                            type="email">
                                    </div>

                                    <div class="form-group">
                                        <label for="address">Alamat</label>
                                        <input class="form-control" id="address" placeholder="jalan .. " type="text">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-10">
                                            <label for="address2">Provinsi</label>
                                            <select class="custom-select" aria-label="Default select example" name="province" id="province">
                                                @foreach ($provinsi as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-10">
                                            <label for="zip">Kabupaten</label>
                                            <select id="regency" name="regency" class="custom-select">
                                                <option value="">Pilih Kota/Kabupaten</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-10">
                                            <label for="zip">Kecamatan</label>
                                            <select id="district" name="district" class="custom-select">
                                                <option value="">Pilih Kecamatan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-10">
                                            <label for="zip">Kelurahan</label>
                                            <select id="village" name="village" class="custom-select">
                                                <option value="">Pilih Kelurahan/Desa</option>
                                            </select>                                
                                        </div>
                                        <div class="col-md-4 mb-10">
                                            <label for="zip">Kode Pos <span
                                                    class="text-muted">(Optional)</span></label>
                                            <input class="form-control" id="zip" placeholder="" type="text">
                                        </div>
                                    </div>

                                    <hr>

                                    <h6 class="form-group">Payment</h6>


                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="cc-name">No Rekening</label>
                                            <input class="form-control" id="cc-name" placeholder="" type="text">
                                            <small class="form-text text-muted">Nomor Rekening aktif</small>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="cc-number">Nama Pemilik Rekening</label>
                                            <input class="form-control" id="cc-number" placeholder=""
                                                data-mask="9999-9999-9999-9999" type="text">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 form-group">
                                            <label for="cc-expiration">Nama Bank</label>
                                            <input class="form-control" type="text">

                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="cc-cvv">Cabang</label>
                                            <input class="form-control" placeholder="" type="text">
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="cc-cvv">NPWP</label>
                                            <input class="form-control" placeholder="" type="text">
                                        </div>
                                    </div>
                                    <hr>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </section>



                </div>
            </div>
            <!-- /Row -->
        </div>
        <!-- /Container -->

    </div>
    <!-- /Main Content -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#province').on('change', function () {
                let province_id = $(this).val();
                $('#regency').html('<option value="">Pilih Kota/Kabupaten</option>');
                $('#district').html('<option value="">Pilih Kecamatan</option>');
                $('#village').html('<option value="">Pilih Kelurahan/Desa</option>');
    
                if (province_id) {
                    $.get('/cities', { province_id: province_id }, function (data) {
                        $.each(data, function (id, name) {
                            $('#regency').append(new Option(name, id));
                        });
                    });
                }
            });
    
            $('#regency').on('change', function () {
                let regency_id = $(this).val();
                $('#district').html('<option value="">Pilih Kecamatan</option>');
                $('#village').html('<option value="">Pilih Kelurahan/Desa</option>');
    
                if (regency_id) {
                    $.get('/districts', { regency_id: regency_id }, function (data) {
                        $.each(data, function (id, name) {
                            $('#district').append(new Option(name, id));
                        });
                    });
                }
            });
    
            $('#district').on('change', function () {
                let district_id = $(this).val();
                $('#village').html('<option value="">Pilih Kelurahan/Desa</option>');
    
                if (district_id) {
                    $.get('/villages', { district_id: district_id }, function (data) {
                        $.each(data, function (id, name) {
                            $('#village').append(new Option(name, id));
                        });
                    });
                }
            });
        });
    </script>
    
@endsection
