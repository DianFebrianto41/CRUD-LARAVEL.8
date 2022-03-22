<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ruangan;
use App\Models\Gedung;
class Gedung extends Model
{
    use HasFactory;

    protected $table = 'gedung';

    
    public function Ruangan(){
    	return $this->hasMany(Ruangan::class);
    }
}
