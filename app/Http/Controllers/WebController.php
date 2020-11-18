<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tattoo;
use App\Models\Pintura;

class WebController extends Controller
{
    
    public function getTattoos(){

        $tattoos = DB::table('tattos')
            ->orderBy('id', 'desc')
            ->get();   

        return view('web.tattoos', array(
            'tattoos' => $tattoos
        ));
    }

    public function getPinturas(){
        $pinturas = DB::table('pinturas')
            ->orderBy('id', 'desc')
            ->get(); 

        return view('web.pinturas', array(
            'pinturas' => $pinturas
        ));
    } 

    public function cotizar(){
        return view('web.cotizar');
    }

    public function verTattoo($id){
        $tattoo = Tattoo::find($id);
        return view('web.verTattoo', array(
            'tattoo' => $tattoo
        ));
    }
    public function verPintura($id){
        $pintura = Pintura::find($id);

        return view('web.verPintura',array(
            'pintura' => $pintura
        ));
    }
    
}
