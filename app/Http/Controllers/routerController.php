<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class routerConroller extends Controller
{
    //

    public function vegpage(){
    	return view('vegpage');

    }
        public function fruitpage(){
    	return view('fruitpage');

    }
}
