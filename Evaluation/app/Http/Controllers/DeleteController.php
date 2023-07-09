<?php

namespace App\Http\Controllers;

use App\Models\Artiste;
use App\Models\AutreDepense;
use App\Models\Element;
use App\Models\Lieu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    public function DeleteArtiste($id){
        $artiste = Artiste::find($id);
        $artiste->delete();

        $controller = new ListController;
        return $controller->ListeArtiste(); 
    }

    public function DeleteAutreDepense($id){
        $autreDepense = AutreDepense::find($id);
        $autreDepense->delete();
        
        $controller = new ListController;
        return $controller->ListeAutreDepense(); 
    }

    public function DeleteLieu($id){
        $Lieu = Lieu::find($id);
        $Lieu->delete();
        
        $controller = new ListController;
        return $controller->ListeLieu(); 
    }

    public function DeleteElement($id){

        $results = DB::select('SELECT idtypes FROM element WHERE id =' . $id);
        $i = $results[0]->idtypes;

        $element = Element::find($id);
        $element->delete();
        
        $controller = new ListController;
        return $controller->ListeElement($i); 
    }

}
