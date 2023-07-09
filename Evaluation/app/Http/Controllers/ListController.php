<?php

namespace App\Http\Controllers;

use App\Models\Artiste;
use App\Models\AutreDepense;
use App\Models\Element;
use App\Models\Lieu;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function ListeArtiste()
    {
       $artistes = Artiste::all();
       $var = "artiste";
       return view('Admin.List.liste',compact('artistes','var')); 
    }

    public function ListeElement($i)
    {
        $elements = Element::with('typemess', 'qualites')
                    ->where('idtypes', $i)
                    ->get();
        $var = "element";
        return view('Admin.List.liste',compact('elements','var'));
    }

    public function ListeLieu()
    {
        $lieux = Lieu::all();
        $var = "lieu";
        return view('Admin.List.liste',compact('lieux','var')); 
    }

    public function ListeAutreDepense()
    {
        $Autredepenses = AutreDepense::all();
        $var = "autre depense";
        return view('Admin.List.liste',compact('Autredepenses','var')); 
    }
}
