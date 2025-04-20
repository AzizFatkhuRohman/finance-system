<?php

namespace App\Http\Controllers;

use App\Models\FilePenjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FilePenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(FilePenjualan $filePenjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FilePenjualan $filePenjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FilePenjualan $filePenjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $file = FilePenjualan::find($id);
        File::delete(public_path('upload_penjualan/'.$file->nama_file));
        FilePenjualan::find($id)->delete();
    }
}
