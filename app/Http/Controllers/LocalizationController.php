<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class LocalizationController extends Controller
{
    // public function index($locale){
    //     App::setlocale($locale);
    //     session()->put('locale',$locale);
    //     return redirect()->back();
    // }

    public function change_ms(){
        App::setlocale('ms');
        session()->put('locale','ms');
        return redirect()->back();
    }

    public function change_en(){
        App::setlocale('en');
        session()->put('locale','en');
        return redirect()->back();
    }

    //theme color
    public function color_default(){
        session()->put('color','normal');
        return redirect()->back();
    }

    public function color_blue(){
        session()->put('color','blue');
        return redirect()->back();
    }

    public function color_black(){
        session()->put('color','black');
        return redirect()->back();
    }

    public function color_brown(){
        session()->put('color','brown');
        return redirect()->back();
    }

    //font color
    public function color_font_default(){
        session()->put('font_color','normal');
        return redirect()->back();
    }

    public function color_font_blue(){
        session()->put('font_color','blue');
        return redirect()->back();
    }

    public function color_font_brown(){
        session()->put('font_color','brown');
        return redirect()->back();
    }

    public function color_font_green(){
        session()->put('font_color','green');
        return redirect()->back();
    }
}
