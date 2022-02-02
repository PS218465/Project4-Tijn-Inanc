<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\winkelmandje;
use App\Models\ingredient;
use App\Models\order;
use App\Models\pizza;
use App\Models\User;
use Facade\Ignition\DumpRecorder\Dump;
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
        // zoek de ingelogde user
        $userId = User::find(Auth::id());
        $totaalprijs = 0;
        // zoek items die gedisplayed moeten worden (de items die op hidden staan mogen niet gedisplayed worden omdat die al besteld zijn)
        $id = winkelmandje::all()->where('user_id', Auth::id())->where('hidden','==',0);
        foreach($id as $i){
                // reken prijs uit
                $tijdelijkprijs = 0;
                $l = explode("€", $i->kosten);
                $tijdelijkprijs += floatval($l[0]);
                if($i->size == "large"){ // bij large prijs x 1.2
                    $totaalprijs += ($tijdelijkprijs * 1.2) * $i->stuks;
                }
                elseif($i->size == "small"){ // bij small prijs x 0.8
                    $totaalprijs += ($tijdelijkprijs * 0.8) * $i->stuks;
                }
                else{
                    $totaalprijs += ($tijdelijkprijs * 1) * $i->stuks;
                }
        }
        // check of user heeft besteld
        $orders= order::where('klant_id',Auth::id())->get()->first();
        if($orders != null){
            return view('betalen/winkelwagen',['items'=>$id, 'prijs'=>round($totaalprijs, 2),'orders'=>$orders,'pizzapunten'=>$userId->pizzapunten]);
        }
        else{
            return view('betalen/winkelwagen',['items'=>$id, 'prijs'=>round($totaalprijs, 2),'pizzapunten'=>$userId->pizzapunten]);
        }
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
        // bestel validatie check of user aantal en grootte van de pizza in heeft gevuld
        $request->validate([
            'hoeveelheid'=>['required'],
            'size'=>['required']
        ]);

        // voeg toe aan Winkelmandje table
        $winkelmandje = new winkelmandje();
        $winkelmandje->id =  null;
        $winkelmandje->user_id = Auth::id();
        $winkelmandje->pizza_id = $request->input('pizzaid');
        $winkelmandje->stuks =  $request->input('hoeveelheid');
        $winkelmandje->size =  $request->input('size');
        $winkelmandje->kosten =  $request->input('kosten');
        $winkelmandje->naam =  $request->input('naam');
        $winkelmandje->hidden =  0;
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
        $Data = winkelmandje::find($id);
        return view('betalen/winkelwagenshow', ["Data"=>$Data]);
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
        //check als de gebruiker alles heeft ingevuld
        $request->validate([
            'size'=>['required'],
            'hoeveelheid'=>['required'],
        ]);
        winkelmandje::where('id',$id)
            ->update(['stuks'=>$request->input('hoeveelheid'),'size'=>$request->input('size')]);
        return redirect('/winkelmandje');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // verwijderen van item in winkelmandje
        winkelmandje::destroy($id);
        return redirect('/winkelmandje');
    }
}
