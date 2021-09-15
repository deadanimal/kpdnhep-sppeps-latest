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


    //grayscale
    public function set_grayscale(){
        session()->put('grayscale','true');
        return redirect()->back();
    }

    public function remove_grayscale(){
        session()->put('grayscale','false');
        return redirect()->back();
    }

    //negative color
    public function set_negative(){
        session()->put('negative','true');
        return redirect()->back();
    }

    public function remove_negative(){
        session()->put('negative','false');
        return redirect()->back();
    }


    //font size
    public function font_size_normal(){
        session()->put('size','normal');
        return redirect()->back();
    }

    public function font_size_0_9(){
        session()->put('size','0.9');
        return redirect()->back();
    }

    public function font_size_1(){
        session()->put('size','1');
        return redirect()->back();
    }

    public function font_size_1_1(){
        session()->put('size','1.1');
        return redirect()->back();
    }

    public function font_size_1_2(){
        session()->put('size','1.2');
        return redirect()->back();
    }

    public function font_size_1_3(){
        session()->put('size','1.3');
        return redirect()->back();
    }

    public function set_readable(){
        session()->put('readable',true);
        return redirect()->back();
    }

    public function remove_readable(){
        session()->put('readable',false);
        return redirect()->back();
    }

    public function reset_font_and_theme(){
        session()->put('size','normal');
        session()->put('font_color','normal');
        session()->put('color','normal');
        session()->put('readable',false);
        session()->put('grayscale','false');
        session()->put('negative','false');
        return redirect()->back();
    }
}
