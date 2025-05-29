<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class JurnalUmum extends Model
{
    use HasUuids;
    protected $table = 'jurnal_umum';
    protected $guarded=[];
    public function Index(){
        return $this->latest()->get();
    }
    public function Store($data){
        return $this->create($data);
    }
    public function Edit($id,$data){
        return $this->where('relational_id',$id)->update($data);
    }
}
