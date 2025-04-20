<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasUuids;
    protected $table = 'penjualan';
    protected $guarded = [];
    public function detailProdukPenjualan()
    {
        return $this->hasMany(DetailProdukPenjualan::class);
    }
    public function filePenjualan()
    {
        return $this->hasMany(FilePenjualan::class, 'penjualan_id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function Index()
    {
        return $this->with('customer', 'user')->latest()->get();
    }
    public function Show($id)
    {
        return $this->find($id);
    }
    public function Store($data)
    {
        return $this->create($data);
    }
    public function Edit($id, $data)
    {
        return $this->find($id)->update($data);
    }
    public function Trash($id)
    {
        return $this->find($id)->delete();
    }
}
