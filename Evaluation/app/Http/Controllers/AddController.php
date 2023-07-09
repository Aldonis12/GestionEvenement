<?php

namespace App\Http\Controllers;

use App\Models\Artiste;
use App\Models\AutreDepense;
use App\Models\Element;
use App\Models\Lieu;
use App\Models\Qualite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddController extends Controller
{

    public function PageAjoutArtiste(){
        $url = "ConfirmeAjoutArtiste";
        $titre = "artiste";
        return view('Admin.Add.ajout',compact('url','titre')); 
    }

    public function AjoutArtiste(Request $request){

        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $file->storeAs('public/images', $filename);

        $Artiste = new Artiste();
        $Artiste->nom = $request->nom;
        $Artiste->tarif = $request->tarif;
        $Artiste->image = $filename;
        $Artiste->save();

        return $this->PageAjoutArtiste();
    }


    public function PageAjoutAutreDepense(){
        $url = "ConfirmeAjoutAutreDepense";
        $titre = "autre depense";
        return view('Admin.Add.ajout',compact('url','titre')); 
    }

    public function AjoutAutreDepense(Request $request){

        $autreD = new AutreDepense();
        $autreD->nom = $request->nom;
        $autreD->save();

        return $this->PageAjoutAutreDepense();
    }

    public function PageAjoutElement($i){
        $url = "ConfirmeAjoutElement";
        $Qualites = Qualite::all();
        $titre = "element";
        return view('Admin.Add.ajout',compact('url','titre','Qualites','i')); 
    }

    public function AjoutElement(Request $request){

        $Element = new Element();
        $Element->nom = $request->nom;
        $Element->idtypes = $request->idtypes;
        $Element->idqualite = $request->idqualite;
        $Element->tarif = $request->tarif;
        $Element->save();

        return $this->PageAjoutElement($request->i);
    }

    public function PageAjoutLieu(){
        $url = "ConfirmeAjoutLieu";
        $typeslieu = DB::select('Select * from typelieu');
        $categories = DB::select('Select * from categorie');
        $titre = "lieu";
        return view('Admin.Add.ajout',compact('url','titre','typeslieu','categories')); 
    }

    public function AjoutLieu(Request $request){

        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $file->storeAs('public/images', $filename);

        $lieu = new Lieu();
        $lieu->nom = $request->nom;
        $lieu->place = $request->place;
        $lieu->image = $filename;
        $lieu->idtypelieu = $request->idtypelieu;
        $lieu->save();

        $lieuId = $lieu->id;

        $categories = $request->except('_token');
        foreach ($categories as $key => $value) {
            if (strpos($key, 'place_') === 0) {
                $categorieId = substr($key, strlen('place_'));
                $place = $value;
                DB::insert('INSERT INTO categorielieu (idlieu, idcategorie, place) VALUES (?,?,?)', [$lieuId,$categorieId+1,$place]);
            }
        }
        return $this->PageAjoutLieu();
    }

public function store(Request $request)
{
    $nom = $request->input('nom');
    $description = $request->input('description');

    DB::insert('INSERT INTO elements (nom, description) VALUES (?, ?)', [$nom, $description]);

    return redirect()->route('elements.index')->with('success', 'Élément ajouté avec succès.');
}

public function Login(Request $request)
{
    $mail = $request->input('mail');
    $mdp = $request->input('mdp');

    $idadmin = DB::select('SELECT idadmin FROM Admin WHERE nom = ? and mdp = ?', [$mail, $mdp]);
    $iduser = DB::select('SELECT id FROM Employe WHERE email = ? and mdp = ?', [$mail, $mdp]);

    if(count($idadmin) != 0 && count($iduser) == 0){
        session()->put('idadmin', $idadmin);
        return $this->PageAjoutArtiste();
    }
    else if(count($idadmin) == 0 && count($iduser) != 0){
        $controller = new EventController;
        return $controller->PageAjoutEvent()->with('iduser', $iduser);
    } else if(count($idadmin) == 0 && count($iduser) == 0){
        return view('login')->with('error', 'error');
    }
}

}
