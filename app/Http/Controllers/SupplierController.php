<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    protected $supplier;
    public function __construct(Supplier $supplier){
        $this->supplier=$supplier;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.data_supplier',[
            'data'=>$this->supplier->Index()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.form_supplier');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = $request->validate([
            'nama_perusahaan' => 'required|string|max:255|unique:your_table_name',
            'akronim' => 'required|string|max:20',
            'email' => 'required|email|max:50|unique:your_table_name',
            'alamat' => 'required|string|max:255',
            'province_id' => 'required|string|size:2|exists:provinces,id',
            'regency_id' => 'required|string|size:4|exists:regencies,id',
            'district_id' => 'required|string|size:7|exists:districts,id',
            'village_id' => 'required|string|size:10|exists:villages,id',
            'kode_pos' => 'nullable|string|size:5',
            'nomor_rekening' => 'required|string|max:30|unique:your_table_name',
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
            'akronim' => 'Akronim',
            'email' => 'Email',
            'alamat' => 'Alamat',
            'province_id' => 'Provinsi',
            'regency_id' => 'Kabupaten/Kota',
            'district_id' => 'Kecamatan',
            'village_id' => 'Desa/Kelurahan',
            'kode_pos' => 'Kode Pos',
            'nomor_rekening' => 'Nomor Rekening',
            'nama_bank' => 'Nama Bank',
            'nama_pemilik' => 'Nama Pemilik Rekening',
            'cabang' => 'Cabang Bank',
            'npwp' => 'NPWP',
        ]);
        $this->supplier->Store($val);
        return redirect('supplier')->with('success','Supplier berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('admin.data_supplier',[
            'data'=>$this->supplier->Show($id)
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $val = $request->validate([
            'nama_perusahaan' => 'required|string|max:255|unique:your_table_name',
            'akronim' => 'required|string|max:20',
            'email' => 'required|email|max:50|unique:your_table_name',
            'alamat' => 'required|string|max:255',
            'province_id' => 'required|string|size:2|exists:provinces,id',
            'regency_id' => 'required|string|size:4|exists:regencies,id',
            'district_id' => 'required|string|size:7|exists:districts,id',
            'village_id' => 'required|string|size:10|exists:villages,id',
            'kode_pos' => 'nullable|string|size:5',
            'nomor_rekening' => 'required|string|max:30|unique:your_table_name',
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
            'akronim' => 'Akronim',
            'email' => 'Email',
            'alamat' => 'Alamat',
            'province_id' => 'Provinsi',
            'regency_id' => 'Kabupaten/Kota',
            'district_id' => 'Kecamatan',
            'village_id' => 'Desa/Kelurahan',
            'kode_pos' => 'Kode Pos',
            'nomor_rekening' => 'Nomor Rekening',
            'nama_bank' => 'Nama Bank',
            'nama_pemilik' => 'Nama Pemilik Rekening',
            'cabang' => 'Cabang Bank',
            'npwp' => 'NPWP',
        ]);
        $this->supplier->Edit($id,$val);
        return redirect('supplier')->with('success','Supplier berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->supplier->Trash($id);
        return redirect('supplier')->with('success','Supplier berhasil di hapus');
    }
}
