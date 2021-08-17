<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Arkibdokumen;

class Senaraidokumen extends Model
{
    use HasFactory;

    public function arkibdokumens(){
        return $this->belongsTo(Arkibdokumen::class);
    }
}
