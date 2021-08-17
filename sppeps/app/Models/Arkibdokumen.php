<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Senaraidokumen;

class Arkibdokumen extends Model
{
    use HasFactory;
    public function senaraidokumens(){
        return $this->hasMany(Senaraidokumen::class);
    }
}
