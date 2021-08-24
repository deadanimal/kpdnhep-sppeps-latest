<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Faq;

class Kategorifaq extends Model
{
    use HasFactory;

    public function faqs(){
        return $this->hasMany(Faq::class);
    }
}
