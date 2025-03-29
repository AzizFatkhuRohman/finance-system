@extends('partials.app')
@section('content')
<!-- Container -->
<div class="container-fluid">
    <!-- Title -->
    <div class="hk-pg-header mb-10">
        <div>
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="book"></i></span></span>Quotation</h4>
        </div>

    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper hk-invoice-wrap pa-35">
                <div class="invoice-from-wrap">
                    <div class="row">
                        <div class="col-md-7 mb-20">
                            <img class="img-fluid invoice-brand-img d-block mb-20" src="{{ asset('dist/img/logo_dwi.png') }}" alt="brand" />
                            <h6 class="mb-5">PT. Dwi Lestari Utama</h6>
                            <address>

                                    <span class="d-block">Pasir Jengkol, Tj. Pura</span>
                                    <span class="d-block">admin@dwilestasi.com</span>
                                    <span class="d-block">001, Karawang</span>
                                </address>
                        </div>
                        <div class="col-md-5 mb-20">
                            <h4 class="mb-35 font-weight-600">Quotation</h4>
                            <span class="d-block">Date:<span class="pl-10 text-dark">Nov 17,2017 11:23 AM</span></span>
                            <span class="d-block">Quotation No #<span class="pl-10 text-dark">21321434</span></span>
                            <span class="d-block">Customer #<span class="pl-10 text-dark">321434</span></span>
                        </div>
                    </div>
                </div>
                <hr class="mt-0">
                <div class="invoice-to-wrap pb-20">
                    <div class="row">
                        <div class="col-md-7 mb-30">
                            <span class="d-block text-uppercase mb-5 font-13">billing to</span>
                            <h6 class="mb-5">PT. H3Codeverse Inc</h6>
                            <address>
                                    <span class="d-block">Adiarsa Pusaka</span>
                                    <span class="d-block">Karawang Barat</span>
                                    <span class="d-block">admin@H3codeverse.com</span>
                                    <span class="d-block">No : 12345</span>
                                </address>
                        </div>
                        <div class="col-md-5 mb-30">
                            <span class="d-block text-uppercase mb-5 font-13">Payment info</span>
                            <span class="d-block">Akhri</span>
                            <span class="d-block">Bank Rek : 2011234</span>
                            <span class="d-block">Customer #<span class="text-dark">324148</span></span>
                            <span class="d-block text-uppercase mt-20 mb-5 font-13">amount due</span>
                            <span class="d-block text-dark font-18 font-weight-600">Rp. 1.650.000</span>
                        </div>
                    </div>
                </div>
                <h5>Items</h5>
                <hr>
                <div class="invoice-details">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table class="table table-striped table-border mb-0">
                                <thead>
                                    <tr>
                                        <th class="w-70">Items</th>
                                        <th class="text-right">Number</th>
                                        <th class="text-right">Unit Cost</th>
                                        <th class="text-right">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="w-70">Pallete Besar</td>
                                        <td class="text-right">3</td>
                                        <td class="text-right">Rp. 500.000</td>
                                        <td class="text-right">Rp. 1.500.000</td>
                                    </tr>
                                    <tr>
                                        <td class="w-70">Pallete Kecil</td>
                                        <td class="text-right">2</td>
                                        <td class="text-right">Rp. 200.000</td>
                                        <td class="text-right">Rp. 400.000</td>
                                    </tr>

                                    <tr class="bg-transparent">
                                        <td colspan="3" class="text-right text-light">Subtotals</td>
                                        <td class="text-right">Rp. 1.500.000</td>
                                    </tr>
                                    <tr class="bg-transparent">
                                        <td colspan="3" class="text-right text-light border-top-0">Tax</td>
                                        <td class="text-right border-top-0">10%</td>
                                    </tr>
                                    <tr class="bg-transparent">
                                        <td colspan="3" class="text-right text-light border-top-0">Discount</td>
                                        <td class="text-right border-top-0">-</td>
                                    </tr>
                                </tbody>
                                <tfoot class="border-bottom border-1">
                                    <tr>
                                        <th colspan="3" class="text-right font-weight-600">total</th>
                                        <th class="text-right font-weight-600">Rp. 1.650.000</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="invoice-sign-wrap text-right py-60">
                        <img class="img-fluid d-inline-block" src="{{ asset('dist/img/signature.png') }}" alt="sign" />
                        <span class="d-block text-light font-14">Akhri</span>
                    </div>
                </div>
                <hr>
                <ul class="invoice-terms-wrap font-14 list-ul">
                    <li>Pembeli harus melunasi rekeningnya dalam waktu 30 hari sejak tanggal yang tercantum pada Quotation.</li>
                    <li>Kondisi di mana penjual akan menyelesaikan penjualan. Biasanya, persyaratan ini menentukan jangka waktu yang diperbolehkan bagi pembeli untuk melunasi jumlah yang harus dibayar.</li>
                </ul>
            </section>
        </div>
    </div>
    <!-- /Row -->
</div>
<!-- /Container -->
@endsection
