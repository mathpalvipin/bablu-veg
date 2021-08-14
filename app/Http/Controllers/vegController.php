<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VEG;
use App\fruit;
use App\order;

class vegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function veg()
    { 
        $veg = VEG::get();
        return $veg;

        //
    }
    
    public function fruit(){
        $fruit =fruit::get();
        return $fruit;
    }
    public function fruitadd(){
    
      
 $order = new fruit();
 $order->id=1
 $order->name="tomato";
 $order->price=50;
 $order->stock=100;
 
$order->save();
return $order;
    }

    public function order(Request $response){
    
      $D=date("Y-m-d");
      $T=date("H-i-s");
      $id= $D.'-'.$T.'-'.$response->phone;
 $order = new order();
 $order->id=$id;
 $order->name=$response->name;
 $order->phone=$response->phone;
 $order->address=$response->address;
 $order->items=$response->items;
$order->save();
return $order;
    }
}
  
