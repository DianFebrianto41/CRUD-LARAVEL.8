<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matakuliah;
class Tahunakademik extends Model
{
    use HasFactory;

    protected $table = 'tahunakademik';

    public function Matakuliah(){
        return $this->hasMany(Matakuliah::class);
    }
}
