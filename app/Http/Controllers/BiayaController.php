<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use App\Models\ChartOfAccount;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BiayaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.biaya');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $monthYear = Carbon::now()->format('Y/m');

        // Cari transaksi terakhir yang dibuat pada bulan dan tahun yang sama
        $lastTransaction = Biaya::whereDate('tgl_transaksi', 'like', Carbon::now()->format('Y-m') . '%')
            ->orderBy('tgl_transaksi', 'desc')
            ->first();

        // Tentukan nomor urut berdasarkan transaksi terakhir
        $lastNumber = 1; // Default jika tidak ada transaksi bulan ini

        if ($lastTransaction) {
            // Ambil nomor urut dari kode_transaksi terakhir dan extract nomor urutnya
            preg_match('/(\d{4})$/', $lastTransaction->kode_transaksi, $matches);
            if (isset($matches[1])) {
                $lastNumber = (int) $matches[1] + 1; // Increment nomor urut
            }
        }

        // Buat kode transaksi dengan format TR-Y/m/nomor_urut
        $kodeTransaksi = 'EX-' . $monthYear . '/' . str_pad($lastNumber, 4, '0', STR_PAD_LEFT);
        return view('admin.form_biaya',[
            'supplier'=>Supplier::all(),
            'kode_akun'=>ChartOfAccount::all(),
            'kodeTransaksi'=>$kodeTransaksi
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Biaya $biaya)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Biaya $biaya)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Biaya $biaya)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Biaya $biaya)
    {
        //
    }

    public function pembayaran()
    {
        return view('admin.form_pembayaran_biaya');
    }
}