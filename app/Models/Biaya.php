<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Biaya extends Model
{
    use HasUuids;
    protected $table = 'biaya';
    protected $guarded = [];
    public function detailBiaya()
    {
        return $this->hasMany(DetailBiaya::class);
    }
    public function fileBiaya()
    {
        return $this->hasMany(FilePenjualan::class, 'biaya_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function Index()
    {
        return $this->with('supplier', 'user')->latest()->get();
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
