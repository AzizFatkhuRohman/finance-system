<!DOCTYPE html>
<html>

<head>
    <title>Surat Jalan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .title {
            text-align: center;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .info {
            margin-bottom: 20px;
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
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="title"><strong>SURAT JALAN</strong></div>

    <div class="info">
        <strong>No Surat:</strong> {{ $penjualan->kode_transaksi }}<br>
        <strong>Tanggal:</strong> {{ $penjualan->tgl_transaksi }}<br>
        <strong>Penerima:</strong> {{ $penjualan->customer->code_customer }}
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Qty</th>
                <th>Satuan</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($detailPenjualan as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->product->nama_produk }}</td>
                    <td>{{ $item->qty }} </td>
                    <td>{{ $item->product->satuan }}</td>
                    <td>{{ $item->total_harga }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <table width="100%">
            <tr>
                <td align="center">
                    Pengirim<br><br><br><br>
                    (............................)
                </td>
                <td align="center">
                    Penerima<br><br><br><br>
                    (............................)
                </td>
            </tr>
        </table>
    </div>
</body>

</html>