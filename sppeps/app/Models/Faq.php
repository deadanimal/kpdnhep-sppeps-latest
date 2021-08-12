<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategorifaq;

class Faq extends Model
{
    use HasFactory;

    public function kategorifaqs(){
        return $this->belongsTo(Kategorifaq::class);
    }
}
