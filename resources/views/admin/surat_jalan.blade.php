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
            font-family: 'Segoe UI', Arial, sans-serif;
            font-size: 11px;
            margin: 0;
            background: #f8f9fa;
        }

        .container {
            width: 190mm;
            height: 128mm;
            margin: 0 auto;
            background: #fff;
            box-sizing: border-box;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            padding: 0;
        }

        .title {
            text-align: center;
            font-size: 18px;
            margin-bottom: 4px;
            letter-spacing: 2px;
            color: #1a237e;
            font-weight: bold;
        }

        .company-header {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            margin-bottom: 4px;
        }

        .company-logo {
            width: 80px;
            height: auto;
        }

        .company-info {
            text-align: left;
        }

        .company-name {
            font-size: 15px;
            font-weight: bold;
            color: #263238;
            margin: 0 0 2px 0;
        }

        .company-address {
            font-size: 10px;
            color: #555;
            margin: 0;
        }

        .info {
            margin-bottom: 8px;
            background: #e3eafc;
            padding: 6px 10px;
            border-radius: 4px;
            border-left: 3px solid #1976d2;
        }

        .info strong {
            color: #0d47a1;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 4px;
        }

        table,
        th,
        td {
            border: 1px solid #90caf9;
        }

        th {
            background: #1976d2;
            color: #fff;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1px;
        }

        th,
        td {
            padding: 5px 6px;
            text-align: left;
        }

        tbody tr:nth-child(even) {
            background: #f1f8ff;
        }

        .footer {
            margin-top: 10px;
        }

        .footer-sign {
            height: 35px;
        }

        .signature-title {
            font-size: 11px;
            color: #1976d2;
            font-weight: 600;
        }

        .signature-line {
            margin-top: 24px;
            border-top: 1px dashed #1976d2;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title">SURAT JALAN</div>
        <div class="company-header">
            <img src="{{ public_path('dist/img/logo_dwi.png') }}" class="company-logo" alt="Logo">
            <div class="company-info">
                <div class="company-name">PT. Dwi Lestari Utama Sinergi</div>
                <div class="company-address">
                    Jl. Contoh Alamat No. 123, Jakarta<br>
                    Telp: (021) 12345678 | Email: info@dwilestari.co.id
                </div>
            </div>
        </div>
        <div class="info">
            <strong>No Surat:</strong> {{ $penjualan->kode_transaksi }}<br>
            <strong>Tanggal:</strong> {{ $penjualan->tgl_transaksi }}<br>
            <strong>Penerima:</strong> {{ $penjualan->customer->code_customer }}
        </div>
        <div class="info" style="background:#fffbe7;border-left:3px solid #fbc02d;">
            <p style="margin:0;">
                <strong>{{ $penjualan->customer->nama_perusahaan }}</strong><br>
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
                        <span class="signature-title">Pengirim</span><br><br>
                        <div class="footer-sign"></div>
                        <div class="signature-line"></div>
                    </td>
                    <td align="center" style="border:0;">
                        <span class="signature-title">Penerima</span><br><br>
                        <div class="footer-sign"></div>
                        <div class="signature-line"></div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>