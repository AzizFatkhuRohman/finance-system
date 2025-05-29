<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Quotation</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        h3,
        h5,
        h6 {
            margin: 5px 0;
        }

        .container {
            width: 100%;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-6 {
            width: 50%;
        }

        .text-right {
            text-align: right;
        }

        .text-left {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .table th,
        .table td {
            border: 1px solid #333;
            padding: 6px;
            text-align: left;
            border: none;
        }

        .invoice-header {
            margin-bottom: 20px;
        }

        .signature {
            margin-top: 40px;
            text-align: right;
        }

        .terms {
            margin-top: 20px;
            font-size: 11px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="invoice-header row">
            <table class="table">
                <th width="50%"><img src="{{ public_path('dist/img/logo_dwi.png') }}" width="150" alt="Logo"></br>
                    <h5>PT. Dwi Lestari Utama Sinergi</h5>
                </th>
                <th width="50%" style="text-align: right;">
                    <h1>Quotation</h1>
                </th>
            </table>
            <table class="table">
                <th width="50%">
                    <p>
                        Jl. Raya Galuh Mas No. 1, Blok A1 No. 1, Desa Galuh Mas Indah, RT.001/RW.001<br>
                        Kec. Telukjambe Timur, Kabupaten Karawang, Jawa Barat 41361<br>
                        001, Karawang
                    </p>
                </th>
                <th width="50%" style="text-align: right;">
                    <p>Date: {{ $penjualan->tgl_transaksi }}</br>
                        Quotation No: {{ $penjualan->kode_transaksi }}</br>
                        Customer #: {{ $penjualan->customer->code_customer }}</p>
                </th>
            </table>
        </div>

        <div class="invoice-header row">
            <table class="table">
                <th width="50%">
                    <h5>Billing To</h5>
                    <p>{{ $penjualan->customer->nama_perusahaan }}</br>
                    {{ $penjualan->customer->alamat }}</p>
                </th>
                <th width="50%" style="text-align: right;">
                    <h5>Payment Info</h5>
                    <p>PT Dwi Lestari Utama</br>
                        Bank Rek: 123456789</br>
                        Bank ABC</br>
                        Total: Rp. {{ $penjualan->total_harga }}</p>
                </th>
            </table>
        </div>

        <table class="table">
            <thead>
                <tr style="border-top: 1px solid #333; border-bottom: 1px solid #333; background-color: #98c8e7;">
                    <th>No</th>
                    <th>Item</th>
                    <th style="text-align: right;">Qty</th>
                    <th style="text-align: right;">Unit Cost</th>
                    <th style="text-align: right;">Amount</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach($detailPenjualan as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->product->nama_produk }}</td>
                        <td style="text-align: right;">{{ $item->qty }} {{ $item->product->satuan }}</td>
                        <td style="text-align: right;">Rp. {{ $item->product->harga }}</td>
                        <td style="text-align: right;">Rp. {{ $item->total_harga }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4" style="text-align: right;">Pajak</td>
                    <td style="text-align: right;">{{ $penjualan->pajak }}%</td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: right;">Diskon</td>
                    <td style="text-align: right;">{{ $penjualan->diskon }}%</td>
                </tr>
                <tr style="border-bottom: 1px solid #333; border-top: 1px solid #333;">
                    <th colspan="4" style="text-align: right;">Total</th>
                    <th style="text-align: right;">Rp. {{ $penjualan->total_harga }}</th>
                </tr>
            </tbody>
        </table>

        <div class="signature">
            <p>Best Regards</p>
            <img src="{{ public_path('dist/img/signature.png') }}" width="100" alt="signature">
            <p>PT. Dwi Lestari Utama Sinergi</p>
        </div>

        <div class="terms">
            <ul>
                <li>Pembeli harus melunasi rekeningnya dalam waktu 30 hari sejak tanggal yang tercantum pada Quotation.
                </li>
                <li>Persyaratan menentukan jangka waktu pelunasan yang diperbolehkan bagi pembeli.</li>
            </ul>
        </div>
    </div>
</body>

</html>
