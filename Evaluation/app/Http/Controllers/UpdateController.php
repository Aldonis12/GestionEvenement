<?php

namespace App\Http\Controllers;

use App\Models\Artiste;
use App\Models\AutreDepense;
use App\Models\CategorieLieu;
use App\Models\Element;
use App\Models\Lieu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    public function PageModifierArtiste($id)
    {
        $artiste = Artiste::find($id);
        $url = "ConfirmeModifierArtiste";
        $titre = "artiste";
        return view('Admin.Update.update', compact('artiste', 'url', 'titre'));
    }

    public function ModifierArtiste(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nom' => 'required',
            'tarif' => 'required',
        ]);

        $Artiste = Artiste::find($request->id);
        $Artiste->nom = $request->nom;
        $Artiste->tarif = $request->tarif;
        $Artiste->update();

        $controller = new ListController;
        return $controller->ListeArtiste();
    }

    public function PageModifierLieu($id)
    {
        $url = "ConfirmeModifierLieu";
        $lieu = Lieu::find($id);
        $typeslieu = DB::select('Select * from typelieu');
        $categlieu = CategorieLieu::where('idlieu', $id)->get();
        $titre = "lieu";
        return view('Admin.Update.update', compact('lieu', 'url', 'titre', 'typeslieu', 'categlieu'));
    }

    public function ModifierLieu(Request $request)
    {

        foreach ($request->input() as $key => $value) {
            if (strpos($key, 'categorie_') === 0) {
                $categorieId = substr($key, strlen('categorie_'));
                $place = $request->input('place_' . $categorieId);

                $categlieu = CategorieLieu::where('idlieu', $request->id)
                    ->where('idcategorie', $categorieId)
                    ->first();

                if ($categlieu) {
                    $categlieu->place = $place;
                    $categlieu->save();
                }
            }
        }

        $lieu = Lieu::find($request->id);
        $lieu->nom = $request->nom;
        $lieu->place = $request->place;
        $lieu->idtypelieu = $request->idtypelieu;
        $lieu->update();

        $controller = new ListController;
        return $controller->ListeLieu();
    }

    public function PageModifierAutreDepense($id)
    {
        $autredepense = AutreDepense::find($id);
        $url = "ConfirmeModifierAutreDepense";
        $titre = "autre depense";
        return view('Admin.Update.update', compact('autredepense', 'url', 'titre'));
    }

    public function ModifierAutreDepense(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nom' => 'required',
        ]);

        $autreDepense = AutreDepense::find($request->id);
        $autreDepense->nom = $request->nom;
        $autreDepense->update();

        $controller = new ListController;
        return $controller->ListeAutreDepense();
    }

    public function PageModifierElement($id)
    {
        $element = Element::find($id);
        $url = "ConfirmeModifierElement";
        $titre = "element";
        return view('Admin.Update.update', compact('element', 'url', 'titre'));
    }

    public function ModifierElement(Request $request)
    {
        $element = Element::find($request->id);
        $element->nom = $request->nom;
        $element->tarif = $request->tarif;
        $element->idtypes = $request->idtypes;
        $element->idqualite = $request->idqualite;
        $element->update();

        $controller = new ListController;
        return $controller->ListeElement($request->idtypes);
    }
}
