<?php

namespace App\Http\Controllers;

use App\Models\FileBiaya;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class FileBiayaController extends Controller
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
    public function show(FileBiaya $fileBiaya)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FileBiaya $fileBiaya)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FileBiaya $fileBiaya)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $file = FileBiaya::find($id);
        File::delete(public_path('upload_biaya'.$file->nama_file));
        FileBiaya::find($id)->delete();
    }
}
