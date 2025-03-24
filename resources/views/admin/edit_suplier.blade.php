@extends('partials.app')

@section('content')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form Suplier</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container-fluid">
        <!-- Title -->
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
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Tambah Suplier</h5>
                    <p class="mb-25">Untuk menambah <code>suplier</code> isi form berikut dengan lengkap.</p>
                    <div class="row">
                        <div class="col-sm">
                            <form>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="firstName">Nama PT/CV</label>
                                        <input class="form-control" id="firstName" type="text" placeholder="">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control" id="email" type="email" placeholder="you@example.com">
                                </div>
                                
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <input class="form-control" id="address" type="text" placeholder="Jalan ..">
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-10">
                                        <label for="province">Provinsi</label>
                                        <select class="custom-select" name="province" id="province">
                                            @foreach ($provinsi as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-10">
                                        <label for="regency">Kabupaten</label>
                                        <select id="regency" name="regency" class="custom-select">
                                            <option value="">Pilih Kota/Kabupaten</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4 mb-10">
                                        <label for="district">Kecamatan</label>
                                        <select id="district" name="district" class="custom-select">
                                            <option value="">Pilih Kecamatan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-10">
                                        <label for="village">Kelurahan</label>
                                        <select id="village" name="village" class="custom-select">
                                            <option value="">Pilih Kelurahan/Desa</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-10">
                                        <label for="zip">Kode Pos <span class="text-muted">(Optional)</span></label>
                                        <input class="form-control" id="zip" type="text" placeholder="">
                                    </div>
                                </div>
                                
                                <hr>
                                <h6 class="form-group">Payment</h6>
                                
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="account-number">No Rekening</label>
                                        <input class="form-control" id="account-number" type="number" placeholder="">
                                        <small class="form-text text-muted">Nomor Rekening aktif</small>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="account-owner">Nama Pemilik Rekening</label>
                                        <input class="form-control" id="account-owner" type="text" placeholder="">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label for="bank-name">Nama Bank</label>
                                        <input class="form-control" id="bank-name" type="text">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="branch">Cabang</label>
                                        <input class="form-control" id="branch" type="text">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="npwp">NPWP</label>
                                        <input class="form-control" id="npwp" type="number">
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