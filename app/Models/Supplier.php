<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasUuids;
    protected $guarded = [];
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    // Relasi ke Regency (Kabupaten/Kota)
    public function regency()
    {
        return $this->belongsTo(Regency::class, 'regency_id', 'id');
    }

    // Relasi ke District (Kecamatan)
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    // Relasi ke Village (Kelurahan/Desa)
    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id', 'id');
    }
    public function biaya()
    {
        return $this->hasMany(Biaya::class);
    }
    public function Index()
    {
        return $this->with('regency')->latest()->get();
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
