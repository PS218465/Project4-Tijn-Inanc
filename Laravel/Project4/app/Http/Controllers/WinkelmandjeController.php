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
        $totaalprijs = 0;
        $id = winkelmandje::all()->where('user_id', Auth::id())->where('hidden','==',0);
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

        $orders= order::where('klant_id',Auth::id())->get()->first();
        if($orders != null){
            return view('betalen/winkelwagen',['items'=>$id, 'prijs'=>round($totaalprijs, 2),'orders'=>$orders]);
        }
        else{
            return view('betalen/winkelwagen',['items'=>$id, 'prijs'=>round($totaalprijs, 2)]);
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
        $request->validate([
            'hoeveelheid'=>['required'],
            'size'=>['required']
        ]);

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
        //$vlees = ['Bacon', 'Chicken', 'Ham', 'Pepperoni','Gehakt','Shoarma','Doner','Salami'];
        $vlees = [];
        //$groente = ['Ananas','Broccoli','Champignon','Maïs','Olijven','Ui','Paprika','Sla','Tomaat'];
        $groente = [];
       // $kaas = ['Mozzarella','Gorgonzola','Parmazaanse','Cheddar'];
        $kaas = [];
       // $swirl = ['Tomatensaus','Sriracha','SweetChili','Knoglook','BBQ','Pesto','Truffel','Teriyaki'];
        $swirl = [];
       // $vis = ['Tonijn'];
        $vis = [];
        $winkelmandje = winkelmandje::find($id);
        $inhoud= explode(",", $winkelmandje->ingredienten);
        $all = ingredient::all();
        foreach($all as $i){
            if($i->soort == 'Vlees'){
                array_push($vlees,$i->naam);
            }
            else if($i->soort == 'Groente'){
                array_push($groente,$i->naam);
            }
            else if($i->soort == 'Kaas'){
                array_push($kaas,$i->naam);
            }
            else if($i->soort == 'Swirl'){
                array_push($swirl,$i->naam);
            }
            else if($i->soort == 'Vis'){
                array_push($vis,$i->naam);
            }
        }

        return view('betalen/winkelwagenshow',['ingredienten' => $inhoud,'Name'=>$winkelmandje,'vlees'=>$vlees,'groente'=>$groente,'kaas'=>$kaas,'swirl'=>$swirl,'vis'=>$vis]);
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
        //variables voor het uitrekenen van de ingredienten
        $ingr = "";
        //$ingredienten = ['Tonijn','Bacon','Mozzarella','Gorgonzola','Parmazaanse','Cheddar', 'Chicken', 'Ham', 'Pepperoni','Gehakt','Shoarma','Doner','Salami','Ananas','Broccoli','Champignon','Maïs','Olijven','Ui','Paprika','Sla','Tomaat','Tomatensaus','Sriracha','SweetChili','Knoflook','BBQ','Pesto','Truffel','Teriyaki'];
        $ingredienten = [];
        $all = ingredient::all();
        foreach($all as $i){
            array_push($ingredienten, $i->naam);
        }
        $first = 1;

        //variables voor het uitrekenen van de prijs
        $kost = [];
        $kosten = winkelmandje::find($id)->kosten;
        $default = intval($request->input('Default'));


        // tellen welke ingredienten er zijn bijgekomen
        for($i = 0; $i < count($ingredienten); $i++){
            if($request->input($ingredienten[$i])=='1'){
                array_push($kost, $ingredienten[$i]);
                if($first==1)
                {
                    $ingr .= $ingredienten[$i];
                    $first++;
                }
                else{
                    $ingr .= ',';
                    $ingr .= $ingredienten[$i];
                }
            }
            elseif(intval($request->input($ingredienten[$i]))>1){
                for($l = 0; $l < intval($request->input($ingredienten[$i])); $l++){
                    array_push($kost, $ingredienten[$i]);
                    if($first==1)
                    {
                        $ingr .= $ingredienten[$i];
                        $first++;
                    }
                    else{ 
                        $ingr .=',';
                        $ingr .=$ingredienten[$i];
                    }
                }
            }
        }


        // prijs goed uitrekenen
        $l = explode("€", winkelmandje::find($id)->kosten);
        $prijs = floatval($l[0]);
        $teller = 0 - $default;
        foreach($kost as $items){
                $teller++;
        }
        if($teller >= 0){
            $prijs += $teller;
        }
       
        //€ toevoegen
        $prize= strval($prijs);
        $prize .= "€";
        
        // update de database
        winkelmandje::where('id',$id)
            ->update(['ingredienten'=>$ingr,'kosten'=>$prize]);
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
        winkelmandje::destroy($id);
        return redirect('/winkelmandje');
    }
}
