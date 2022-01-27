<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\order;
use App\Models\User;
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
        $points = User::where('id', Auth::id())->get()->first()->pizzapunten;
        $spendpoints = null;
        $orders = order::where('klant_id', Auth::id())->get();
        if (!$orders->isEmpty()) {
            return redirect('/winkelmandje');
        } else {
            $points -= intval($request->input('aantalPunten'));
            //dump($points);
            $spendpoints = intval($request->input('aantalPunten'));
            $bestellen = new order();
            $bestellen->id =  null;
            $bestellen->klant_id = Auth::id();
            $bestellen->created_at = date("Y-m-d H:i:s");
            $bestellen->updated_at = date("Y-m-d H:i:s");
            $bestellen->totaalprijs = strval(doubleval($request->input('price')) - ($spendpoints / 10));

            $bestellen->save();

            $order = order::find($bestellen->id);
            $length = winkelmandje::where('user_id', Auth::id())->where('hidden', '==', 0)->get();
            foreach ($length as $i) {
                $id = $i->id;
                $order->winkelmandjes()->attach($id);
                $points += 10 * $i->stuks;
            }

            winkelmandje::where('user_id', Auth::id())
                ->update(['hidden' => 1]);
            if($points <= 90){
                User::where('id', Auth::id())->update(['pizzapunten' => $points]);
            }
            else{
                User::where('id', Auth::id())->update(['pizzapunten' => 90]);
            }
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
