<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class FileBiaya extends Model
{
    use HasUuids;
    protected $table = 'file_biaya';
    protected $guarded=[];
    public function biaya()
    {
        return $this->belongsTo(Penjualan::class, 'biaya_id');
    }
}
