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
                    <form action="{{ url('jurnal/filter') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 mb-10">
                            <label for="zip">Tanggal Awal</label>
                            <input class="form-control" name="start" type="date">
                        </div>
                        <div class="col-md-3 mb-10">
                            <label for="zip">Tanggal Akhir</label>
                            <input class="form-control" name="finish" type="date">
                        </div>
                        <div class="col-md-3 mb-10">
                            <label style="color: transparent">-</label>
                            <select class="form-control" name="no_account">
                                @foreach ($coa as $item)
                                    <option value="{{ $item->no_account }}">{{$item->no_account}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-10">
                            <label style="color: transparent">-</label>
                            <input style="background-color: #1E90FF;" class="form-control" placeholder="" value="Filter"
                                type="submit">
                        </div>
                    </div>
                    </form>
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
                                                        <th>No. Referensi</th>
                                                        <th>Deskripsi</th>
                                                        <th>Debit</th>
                                                        <th>kredit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
    @foreach ($data as $item)
        {{-- Baris 1: menampilkan kode perusahaan --}}
        <tr>
            <td>{{ $item->tgl }}</td>
            <td>{{ $item->code_perusahaan }}</td>
            <td>{{ $item->nama ?? '-' }}</td>
            <td>
               @if ($item->kategori === 'penjualan')
                    @if (empty($item->kredit) || $item->kredit == 0)
                    -
                @else
                    Rp. {{ number_format($item->kredit, 0, ',', '.') }}
                @endif
                @else
                @if (empty($item->debit) || $item->debit == 0)
                    -
                @else
                    Rp. {{ number_format($item->debit, 0, ',', '.') }}
                @endif
               @endif
            </td>
            <td>
               @if ($item->kategori === 'penjualan')
                    @if (empty($item->debit) || $item->debit == 0)
                    -
                @else
                    Rp. {{ number_format($item->debit, 0, ',', '.') }}
                @endif
               @else
                    @if (empty($item->kredit) || $item->kredit == 0)
                    -
                @else
                    Rp. {{ number_format($item->kredit, 0, ',', '.') }}
                @endif
               @endif
            </td>
        </tr>
        {{-- Baris 2: menampilkan no_account --}}
        <tr>
            <td>{{ $item->tgl }}</td>
            <td>{{ $item->no_account }}</td>
            <td>{{ $item->deskripsi ?? '-' }}</td>
            <td>
                @if ($item->kategori === 'penjualan')
                    @if (empty($item->debit) || $item->debit == 0)
                    -
                @else
                    Rp. {{ number_format($item->debit, 0, ',', '.') }}
                @endif
                @endif
            </td>
            <td>
                @if ($item->kategori === 'biaya')
                    @if (empty($item->debit) || $item->debit == 0)
                    -
                @else
                    Rp. {{ number_format($item->debit, 0, ',', '.') }}
                @endif
                @else
                @if (empty($item->kredit) || $item->kredit == 0)
                    -
                @else
                    Rp. {{ number_format($item->kredit, 0, ',', '.') }}
                @endif
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
