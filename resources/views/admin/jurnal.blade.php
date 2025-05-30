@extends('partials.app')
@section('content')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Laporan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Jurnal Umum</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container-fluid">

        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
                            data-feather="database"></i></span></span>Jurnal Umum</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Jurnal Umum</h5>
                    <p class="mb-40">Berikut data <code>Jurnal umum</code> yang sudah di proses dari data transaksi yang
                        berjalan..</p>
                    <div class="row">
                        <div class="col-md-3 mb-10">
                            <label for="zip">Tanggal Awal</label>
                            <input class="form-control" placeholder="" type="date">
                        </div>
                        <div class="col-md-3 mb-10">
                            <label for="zip">Tanggal Akhir</label>
                            <input class="form-control" placeholder="" type="date">
                        </div>
                        <div class="col-md-3 mb-10">
                            <label style="color: transparent">-</label>
                            <select id="input_tags" class="form-control" multiple="multiple">
                                <option selected="selected">orange</option>
                                <option>white</option>
                                <option selected="selected">purple</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-10">
                            <label style="color: transparent">-</label>
                            <input style="background-color: #1E90FF;" class="form-control" placeholder="" value="Filter"
                                type="submit">
                        </div>

                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" role="tabpanel">
                            <div class="row">
                                <div class="col-sm">
                                    </br>

                                    <div class="table-wrap">
                                        <div class="table-responsive-md">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Tanggal</th>
                                                        <th>No. Akun</th>
                                                        <th>Deskripsi</th>
                                                        <th>Debit</th>
                                                        <th>kredit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $item)
                                                        <tr>
                                                            <td>{{ $item->tgl }}</td>
                                                            <td>{{ $item->code_perusahaan }}</td>
                                                            <td>{{ $item->nama }}</td>
                                                            <td>
                                                                @if ($item->debit == null || $item->debit == 0)
                                                                    -
                                                                @else
                                                                    Rp. {{ $item->debit }}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($item->kredit == null || $item->kredit == 0)
                                                                    -
                                                                @else
                                                                    Rp. {{ $item->kredit }}
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->
@endsection
