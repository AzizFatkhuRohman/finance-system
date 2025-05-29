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
            <div class="col-6">
                <img src="{{ public_path('dist/img/logo_dwi.png') }}" width="150" alt="Logo">
                <h5>PT. Dwi Lestari Utama Sinergi</h5>
                <p>
                    Pasir Jengkol, Tj. Pura<br>
                    admin@dwilestari.com<br>
                    001, Karawang
                </p>
            </div>
            <div class="col-6 text-right">
                <h3>Quotation</h3>
                <p>Date: {{ $penjualan->tgl_transaksi }}</p>
                <p>Quotation No: {{ $penjualan->kode_transaksi }}</p>
                <p>Customer #: {{ $penjualan->customer->code_customer }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <h5>Billing To</h5>
                <p>{{ $penjualan->customer->nama_perusahaan }}</p>
                <p>{{ $penjualan->customer->alamat }}</p>
            </div>
            <div class="col-6 text-right">
                <h5>Payment Info</h5>
                <p>PT Dwi Lestari Utama</p>
                <p>Bank Rek: 123456789</p>
                <p>Bank ABC</p>
                <p><strong>Total: Rp. {{ $penjualan->total_harga }}</strong></p>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Item</th>
                    <th class="text-right">Qty</th>
                    <th class="text-right">Unit Cost</th>
                    <th class="text-right">Amount</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach($detailPenjualan as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->product->nama_produk }}</td>
                        <td class="text-right">{{ $item->qty }} {{ $item->product->satuan }}</td>
                        <td class="text-right">Rp. {{ $item->product->harga }}</td>
                        <td class="text-right">Rp. {{ $item->total_harga }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4" class="text-right">Pajak</td>
                    <td class="text-right">{{ $penjualan->pajak }}%</td>
                </tr>
                <tr>
                    <td colspan="4" class="text-right">Diskon</td>
                    <td class="text-right">{{ $penjualan->diskon }}%</td>
                </tr>
                <tr>
                    <th colspan="4" class="text-right">Total</th>
                    <th class="text-right">Rp. {{ $penjualan->total_harga }}</th>
                </tr>
            </tbody>
        </table>

        <div class="signature">
            <img src="{{ public_path('dist/img/signature.png') }}" width="100" alt="signature">
            <p>{{ $penjualan->customer->nama_perusahaan }}</p>
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