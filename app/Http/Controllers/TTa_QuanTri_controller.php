<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TTa_QuanTri_controller extends Controller
{
    public function ttaLogin(){
        return view('TTAlogin.tta-login');
    }
     public function ttaLoginsubmit(){
        return view('TTAlogin.tta-login-submit');
    }

}
