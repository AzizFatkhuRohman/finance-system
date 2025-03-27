<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    protected $supplier;
    public function __construct(Supplier $supplier)
    {
        $this->supplier = $supplier;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.data_supplier', [
            'data' => $this->supplier->Index()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.form_supplier', [
            'provinsi' => Province::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = $request->validate([
            'nama_perusahaan' => 'required|string|max:255|unique:suppliers',
            // 'akronim' => 'required|string|max:20',
            'email' => 'required|email|max:50|unique:suppliers',
            'alamat' => 'required|string|max:255',
            // 'province' => 'required|string|size:2|exists:provinces,id',
            // 'regency' => 'required|string|size:4|exists:regencies,id',
            // 'district' => 'required|string|size:7|exists:districts,id',
            // 'village' => 'required|string|size:10|exists:villages,id',
            // 'kode_pos' => 'nullable|string|size:5',
            'nomor_rekening' => 'required|string|max:30|unique:suppliers',
            'nama_bank' => 'required|string|max:255',
            'nama_pemilik' => 'required|string|max:255',
            'cabang' => 'required|string|max:255',
            'npwp' => 'required|string|size:16',
        ], [
            'required' => ':attribute wajib diisi.',
            'string' => ':attribute harus berupa teks.',
            'max' => ':attribute tidak boleh lebih dari :max karakter.',
            'size' => ':attribute harus :size karakter.',
            'unique' => ':attribute sudah digunakan, silakan gunakan yang lain.',
            'email' => ':attribute harus berupa alamat email yang valid.',
            'exists' => ':attribute tidak valid.',
        ], [
            'nama_perusahaan' => 'Nama Perusahaan',
            // 'akronim' => 'Akronim',
            'email' => 'Email',
            'alamat' => 'Alamat',
            // 'province' => 'Provinsi',
            // 'regency' => 'Kabupaten/Kota',
            // 'district' => 'Kecamatan',
            // 'village' => 'Desa/Kelurahan',
            // 'kode_pos' => 'Kode Pos',
            'nomor_rekening' => 'Nomor Rekening',
            'nama_bank' => 'Nama Bank',
            'nama_pemilik' => 'Nama Pemilik Rekening',
            'cabang' => 'Cabang Bank',
            'npwp' => 'NPWP',
        ]);
        $tahun = date('Y');
        $nama = strtoupper($request->nama_perusahaan);
        $huruf_depan = substr($nama, 0, 1);
        $customerCount = Supplier::whereYear('created_at', $tahun)->count();
        $nomor_urut = $customerCount + 1;
        $code = "SD" . $huruf_depan . $tahun . str_pad($nomor_urut, 3, '0', STR_PAD_LEFT);
        $this->supplier->Store([
            'nama_perusahaan' => $request->input('nama_perusahaan'),
            // 'akronim' => $request->input('akronim'),
            'code_supplier'=>$code,
            'email' => $request->input('email'),
            'alamat' => $request->input('alamat'),
            // 'province_id' => $request->input('province'),
            // 'regency_id' => $request->input('regency'),
            // 'district_id' => $request->input('district'),
            // 'village_id' => $request->input('village'),
            // 'kode_pos' => $request->input('kode_pos'),
            'nomor_rekening' => $request->input('nomor_rekening'),
            'nama_bank' => $request->input('nama_bank'),
            'nama_pemilik' => $request->input('nama_pemilik'),
            'cabang' => $request->input('cabang'),
            'npwp' => $request->input('npwp')
        ]);
        return redirect('suplier')->with('success', 'Supplier berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('admin.edit_suplier', [
            'data' => $this->supplier->Show($id),
            'provinsi' => Province::all()
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $val = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            // 'akronim' => 'required|string|max:20',
            'email' => 'required|email|max:50',
            'alamat' => 'required|string|max:255',
            // 'province' => 'required|string|size:2|exists:provinces,id',
            // 'regency' => 'required|string|size:4|exists:regencies,id',
            // 'district' => 'required|string|size:7|exists:districts,id',
            // 'village' => 'required|string|size:10|exists:villages,id',
            // 'kode_pos' => 'nullable|string|size:5',
            'nomor_rekening' => 'required|string|max:30',
            'nama_bank' => 'required|string|max:255',
            'nama_pemilik' => 'required|string|max:255',
            'cabang' => 'required|string|max:255',
            'npwp' => 'required|string|size:16',
        ], [
            'required' => ':attribute wajib diisi.',
            'string' => ':attribute harus berupa teks.',
            'max' => ':attribute tidak boleh lebih dari :max karakter.',
            'size' => ':attribute harus :size karakter.',
            'email' => ':attribute harus berupa alamat email yang valid.',
            'exists' => ':attribute tidak valid.',
        ], [
            'nama_perusahaan' => 'Nama Perusahaan',
            // 'akronim' => 'Akronim',
            'email' => 'Email',
            'alamat' => 'Alamat',
            // 'province' => 'Provinsi',
            // 'regency' => 'Kabupaten/Kota',
            // 'district' => 'Kecamatan',
            // 'village' => 'Desa/Kelurahan',
            // 'kode_pos' => 'Kode Pos',
            'nomor_rekening' => 'Nomor Rekening',
            'nama_bank' => 'Nama Bank',
            'nama_pemilik' => 'Nama Pemilik Rekening',
            'cabang' => 'Cabang Bank',
            'npwp' => 'NPWP',
        ]);
        $this->supplier->Edit($id, [
            'nama_perusahaan' => $request->input('nama_perusahaan'),
            // 'akronim' => $request->input('akronim'),
            'email' => $request->input('email'),
            'alamat' => $request->input('alamat'),
            // 'province_id' => $request->input('province'),
            // 'regency_id' => $request->input('regency'),
            // 'district_id' => $request->input('district'),
            // 'village_id' => $request->input('village'),
            // 'kode_pos' => $request->input('kode_pos'),
            'nomor_rekening' => $request->input('nomor_rekening'),
            'nama_bank' => $request->input('nama_bank'),
            'nama_pemilik' => $request->input('nama_pemilik'),
            'cabang' => $request->input('cabang'),
            'npwp' => $request->input('npwp')
        ]);
        return redirect('suplier')->with('success', 'Supplier berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->supplier->Trash($id);
        return redirect('suplier')->with('success', 'Supplier berhasil di hapus');
    }
}
