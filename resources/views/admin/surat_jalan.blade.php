<!DOCTYPE html>
<html>

<head>
    <title>Surat Jalan</title>
    <style>
        @page {
            size: A5 landscape;
            margin: 10mm;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            background: #fff;
        }

        .container {
            width: 100%;
            max-width: 200mm;
            min-height: 140mm;
            margin: 0 auto;
            background: #fff;
            box-sizing: border-box;
        }

        .title {
            text-align: center;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .info {
            margin-bottom: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #444;
        }

        th,
        td {
            padding: 6px;
            text-align: left;
        }

        .footer {
            margin-top: 24px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title"><strong>SURAT JALAN</strong></div>
        <img src="{{ public_path('dist/img/logo_dwi.png') }}" width="120" alt="Logo"><br>
        <h5>PT. Dwi Lestari Utama Sinergi</h5>
        <div class="info">
            <strong>No Surat:</strong> {{ $penjualan->kode_transaksi }}<br>
            <strong>Tanggal:</strong> {{ $penjualan->tgl_transaksi }}<br>
            <strong>Penerima:</strong> {{ $penjualan->customer->code_customer }}
        </div>
        <div class="info">
            <p>
                {{ $penjualan->customer->nama_perusahaan }}<br>
                {{ $penjualan->customer->alamat }}
            </p>
        </div>
        <table>
            <thead>
                <tr>
                    <th style="width:5%;">No</th>
                    <th style="width:40%;">Nama Barang</th>
                    <th style="width:15%;">Qty</th>
                    <th style="width:15%;">Satuan</th>
                    <th style="width:25%;">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($detailPenjualan as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->product->nama_produk }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->product->satuan }}</td>
                        <td>{{ $item->total_harga }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="footer">
            <table width="100%" style="border:0;">
                <tr>
                    <td align="center" style="border:0;">
                        Pengirim<br><br><br><br>
                        (............................)
                    </td>
                    <td align="center" style="border:0;">
                        Penerima<br><br><br><br>
                        (............................)
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>