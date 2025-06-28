@extends('partials.app')
@section('content')
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Laporan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Jurnal Umum</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="hk-pg-header">
            <h4 class="hk-pg-title">
                <span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>
                Jurnal Umum
            </h4>
        </div>
        <section class="hk-sec-wrapper">
            <h5 class="hk-sec-title">Filter Data</h5>
            <form action="{{ url('jurnal/filter') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3 mb-10">
                        <label>Tanggal Awal</label>
                        <input class="form-control" name="start" type="date">
                    </div>
                    <div class="col-md-3 mb-10">
                        <label>Tanggal Akhir</label>
                        <input class="form-control" name="finish" type="date">
                    </div>
                    <div class="col-md-3 mb-10">
                        <label>Akun</label>
                        <select class="form-control" name="no_account">
                            <option value="">-- Semua Akun --</option>
                            @foreach ($coa as $item)
                                <option value="{{ $item->no_account }}">{{ $item->no_account }} - {{ $item->description }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-10 d-flex align-items-end">
                        <button class="btn btn-primary w-100" type="submit">Filter</button>
                    </div>
                </div>
            </form>
        </section>
        <section class="hk-sec-wrapper">
            <h5 class="hk-sec-title">Data Jurnal Umum</h5>
            <div class="table-wrap">
                <div class="table-responsive-md">
                    <table class="table mb-0 table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Tanggal</th>
                                <th>No. Referensi / Akun</th>
                                <th>Deskripsi</th>
                                <th>Debit</th>
                                <th>Kredit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                                <tr>
                                    <td>{{ $item->tgl }}</td>
                                    <td>{{ $item->code_perusahaan }}</td>
                                    <td>
                                        {{ collect($customers)->firstWhere('code_customer', $item->code_perusahaan)?->nama_perusahaan ??
                                            (collect($coa)->firstWhere('no_account', $item->code_perusahaan)?->description ?? '-') }}
                                    </td>

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
                                <tr>
                                    <td>{{ $item->tgl }}</td>
                                    <td>{{ $item->no_account }}</td>
                                    <td>{{ collect($coa)->firstWhere('no_account', $item->no_account)->description ?? '-' }}
                                    </td>
                                    <td>
                                        @if ($item->kategori === 'penjualan')
                                            @if (isset($penjualan_paid[$item->relational_id]))
                                                Rp. {{ number_format($item->kredit, 0, ',', '.') }}
                                            @elseif (!empty($item->debit))
                                                Rp. {{ number_format($item->debit, 0, ',', '.') }}
                                            @else
                                                -
                                            @endif
                                        @else
                                            @if (!empty($item->debit))
                                                Rp. {{ number_format($item->debit, 0, ',', '.') }}
                                            @else
                                                -
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->kategori === 'penjualan')
                                            @if (isset($penjualan_paid[$item->relational_id]))
                                                -
                                            @elseif (!empty($item->kredit))
                                                Rp. {{ number_format($item->kredit, 0, ',', '.') }}
                                            @else
                                                -
                                            @endif
                                        @else
                                            @if ($item->kategori === 'biaya' && !empty($item->debit))
                                                Rp. {{ number_format($item->debit, 0, ',', '.') }}
                                            @elseif (!empty($item->kredit))
                                                Rp. {{ number_format($item->kredit, 0, ',', '.') }}
                                            @else
                                                -
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                                @if ($item->kategori === 'penjualan' && isset($penjualan_paid[$item->relational_id]))
                                    @php
                                        $penjualan = $penjualan_paid[$item->relational_id];
                                    @endphp
                                    <tr style="background-color: #f0f8ff;">
                                        <td>{{ $item->tgl }}</td>
                                        <td>{{ $item->no_account }}</td>
                                        {{-- <td>{{ $penjualan->nama_bank ?? '-' }}</td> --}}
                                        <td>Bank Mega</td>
                                        <td>-</td>
                                        <td>Rp. {{ number_format($item->kredit, 0, ',', '.') }}</td>
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data jurnal ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

@endsection
