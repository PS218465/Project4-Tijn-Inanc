<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\order;
use App\Models\User;
use App\Models\winkelmandje;
use DateTime;
use Illuminate\Support\Facades\Log;
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
        $points = User::where('id', Auth::id())->get()->first()->pizzapunten;
        $spendpoints = null;
        $orders = order::where('klant_id', Auth::id())->get();
        // check als er al besteld is (een klant mag niet twee bestellingen tegelijk orderen)
        if (!$orders->isEmpty()) {
            return redirect('/winkelmandje');
        } else {
            // reken punten uit
            $points -= intval($request->input('aantalPunten'));
            $spendpoints = intval($request->input('aantalPunten'));

            // voeg toe aan Database
            $bestellen = new order();
            $bestellen->id =  null;
            $bestellen->klant_id = Auth::id();
            $bestellen->created_at = date("Y-m-d H:i:s");
            $bestellen->updated_at = date("Y-m-d H:i:s");
            $bestellen->totaalprijs = strval(doubleval($request->input('price')) - ($spendpoints / 10));
            // log de totaal prijs
            $priceLog = strval(doubleval($request->input('price')) - ($spendpoints / 10)); 
            $bestellen->save();

            // zoek id voor koppel tabel Winkemandje_order
            $order = order::find($bestellen->id);
            // get Winkelmandje item niet op hidden zodat hij de goede bestelling koppelt
            $length = winkelmandje::where('user_id', Auth::id())->where('hidden', '==', 0)->get();
            // voeg alle toe aan de koppel tabel Winkelmandje_order
            foreach ($length as $i) {
                $id = $i->id;
                $order->winkelmandjes()->attach($id);
                $points += 10 * $i->stuks;
            }
            // zet Winkelmandje item op hidden zodat hij niet meer displayed op de website. (omdat hij is besteld)
            winkelmandje::where('user_id', Auth::id())
                ->update(['hidden' => 1]);
            // points update
            if($points <= 90){ // points mag niet hoger dan 90 
                User::where('id', Auth::id())->update(['pizzapunten' => $points]);
            }
            else{
                User::where('id', Auth::id())->update(['pizzapunten' => 90]);
            }
            // logging
            $userid = Auth::id();
            Log::channel('bestellingen')->debug("User => {$userid}: Heeft besteld voor {$priceLog}!");
            // return naar home pagina zodat je je bestelling kunt volgen
            return redirect('/');
        }
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
