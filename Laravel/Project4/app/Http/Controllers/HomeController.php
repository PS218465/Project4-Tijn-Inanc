<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\order;
use App\Models\winkelmandje;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $orders= order::where('klant_id',Auth::id())->get()->first();
        if($orders != null){
            return view('home',['orders'=>$orders]);
        }
        else{
            return view('home');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $orders=order::where('klant_id',$id)->get(); 
        $table = [];
        $count = [];
        foreach($orders as $order){
            //dump($order->id);
            //dump($order->winkelmandjes()->get());
            array_push($count,count($order->winkelmandjes()->get()));
            foreach($order->winkelmandjes()->get() as $i){
                // dump($i);
                array_push($table,$i);
            }
        }
        // $teller = 0;
        // foreach($table as $inf){
        //     if($table[$teller] <count($table)){
        //         dump($inf->naam);
        //     }
        //     $teller++;
        // }
        return view('status',['orders'=>$orders, "info"=>$table, "count"=>$count]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $order = order::find($id);
        foreach($order->winkelmandjes()->get() as $test){
            winkelmandje::destroy($test->id);
        }
        order::destroy($id);
        return redirect('/');
    }
}
