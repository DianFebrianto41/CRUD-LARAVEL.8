<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prodi;
use App\Models\fakultas;

class Fakultas extends Model
{
    use HasFactory;

    protected $table = 'Fakultas';

    public function Prodi(){
    	return $this->hasMany(Prodi::class);
    }
}
