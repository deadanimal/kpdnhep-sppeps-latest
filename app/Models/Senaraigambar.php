<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Arkibgambar;

class Senaraigambar extends Model
{
    use HasFactory;

    public function arkibgambars(){
        return $this->belongsTo(Arkibgambar::class);
    }
}
