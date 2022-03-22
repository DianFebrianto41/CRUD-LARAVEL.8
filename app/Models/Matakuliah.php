<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tahunakademik;
use Illuminate\Support\Facades\DB;

class Matakuliah extends Model
{
    use HasFactory;

    protected $table ='Matakuliah';

    public function Prodi(){
    	return $this->belongsTo(Prodi::class);
    }

    
    public function allMatkul($id){

        return DB::table('matakuliah')
        ->where('prodi_id', $id)
        ->orderBy('smt', 'asc')
        ->get();
    }

    public function Tahunakademik(){
        return $this->belongsTo(Tahunakademik::class);
    }
}
