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
    public function add(Request $response){
    if($response->add=="fruit"){
      
 $order = new fruit();
 $order->id=$response->id;
 $order->name=$response->name;
 $order->price=$response->price;
 $order->stock=$response->stock;
 $order->link=$response->imagelink;
    
 
$order->save();
}
else{

    $order = new veg();
 $order->id=$response->id;
 $order->name=$response->name;
 $order->price=$response->price;
 $order->stock=$response->stock;
$order->link=$response->imagelink;
$order->save();
}

return $order;
    }

     public function upload(Request $request){
      $addto=$request->addto;
   

 $filename=$request->file('file')->getClientoriginalName();


$filenamefinal=$filename;
$path=$request->file('file')->storeAs('public/'.$addto,$filenamefinal);
    
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
  
