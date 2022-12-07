<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BangTinController extends Controller
{
    public function getbantin(){
        
        
        return view('bangtin.bangtinmoi');
    }
}
