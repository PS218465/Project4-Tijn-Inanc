<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\winkelmandje;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class WinkelmandjeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totaalprijs = 0;
        $id = winkelmandje::all()->where('user_id', Auth::id());
        foreach($id as $i){
            $tijdelijkprijs = 0;
            $l = explode("€", $i->kosten);
            $tijdelijkprijs += floatval($l[0]);
            if($i->size == "large"){
                $totaalprijs += ($tijdelijkprijs * 1.2) * $i->stuks;
            }
            elseif($i->size == "small"){
                $totaalprijs += ($tijdelijkprijs * 0.8) * $i->stuks;
            }
            else{
                $totaalprijs += ($tijdelijkprijs * 1) * $i->stuks;
            }
        }
        return view('betalen/winkelwagen',['items'=>$id, 'prijs'=>round($totaalprijs, 2)]);
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
        $winkelmandje = new winkelmandje();
        $winkelmandje->id =  null;
        $winkelmandje->user_id = Auth::id();
        $winkelmandje->naam =  $request->input('naam');
        $winkelmandje->ingredienten =  $request->input('ingredienten');
        $winkelmandje->stuks =  $request->input('hoeveelheid');
        $winkelmandje->size =  $request->input('size');
        $winkelmandje->kosten =  $request->input('kosten');
        $winkelmandje->save();
        return redirect('/menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $winkelmandje = winkelmandje::find($id);
        $inhoud= explode(",", $winkelmandje->ingredienten);
        return view('betalen/winkelwagenshow',['ingredienten' => $inhoud,'Name'=>$winkelmandje]);
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
        winkelmandje::destroy($id);
        return redirect('/winkelmandje');
    }
}
