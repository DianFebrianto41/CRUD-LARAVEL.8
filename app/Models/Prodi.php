<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prodi;
use App\Models\Fakultas;
use App\Models\Matakuliah;
use Illuminate\Support\Facades\DB;
class Prodi extends Model
{
    use HasFactory;

    protected $table = 'prodi';

    public function Fakultas(){
    	return $this->belongsTo(Fakultas::class);
    }

    public function Matakuliah(){
    	return $this->hasMany(Matakuliah::class);
    }

    
    public function detailData($id){
        return DB::table('prodi')
        ->leftjoin('fakultas', 'fakultas.id', '=' , 'prodi.fakultas_id' )
        ->where('prodi.id', $id)
        ->first();
    }
}
