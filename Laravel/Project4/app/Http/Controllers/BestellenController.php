<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\order;
use App\Models\winkelmandje;
use DateTime;
use Illuminate\Http\Request;

class BestellenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $bestelling ="";
        $lengte = intval($request->input('lengte'));
        for($i=1;$i < intval($request->input('lengte'))+1;$i++){
            $bestelling .= strval($request->input("naam".+strval($i)));
            $bestelling .= ":";
            $bestelling .= $request->input('ingredienten'.+strval($i));
            $bestelling .= "/";
            $bestelling .= $request->input('stuks'.+strval($i));
            $bestelling .= ";";
        }
        
        $bestelling .= $request->input('price');
        $bestelling .= ">";
        $bestellen = new order();
        $bestellen->id =  null;
        $bestellen->klant_id = Auth::id();
        $bestellen->bestelling =  $bestelling;
        $bestellen->created_at = date("Y-m-d H:i:s");
        $bestellen->updated_at = date("Y-m-d H:i:s");
        
        $bestellen->save();
        winkelmandje::where("user_id",Auth::id())->delete();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
