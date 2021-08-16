<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Senaraigambar;

class Arkibgambar extends Model
{
    use HasFactory;

    public function senaraigambars(){
        return $this->hasMany(Senaraigambar::class);
    }
}
