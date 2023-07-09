<?php
namespace App\Http\Controllers;

use App\Models\CategorieLieu;
use App\Models\Event;
use App\Models\EventArtiste;
use App\Models\EventDepense;
use App\Models\EventPlace;
use App\Models\EventSono;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class EventController extends Controller
{
    public function PageAjoutEvent(){

        $typeEvent = DB::select('Select * from typeevent');
        $lieu = DB::select('Select * from lieu');
        $logistique = DB::select('select * from element where idtypes = 2');

        $url = "ConfirmeAjoutEvent";
        $titre = "Evenement";
        return view('User.Add.ajout',compact('typeEvent','lieu','logistique','url','titre')); 
    }

    public function AjoutEvent(Request $request){

        $event = new Event();
        $event->nom = $request->nom;
        $event->idtypesevent = $request->typesevent;
        $event->idlieu = $request->lieu;
        $event->datedebut = $request->datedebut;
        $event->heure = $request->heure;
        $event->logistique = $request->logistique;
        $event->save();

        return $this->PageAjoutEvent();
    }

    public function ListeEvent()
    {
       $Event = Event::all();
       $titre = 'event';
       return view('User.List.liste',compact('Event','titre')); 
    }

    public function PageAjoutEventArtiste($i){
        $artistes = DB::select('select * from artiste where id NOT IN (select idartiste from eventartiste where idevent='.$i.')');
        $url = "ConfirmeAjoutEventArtiste";
        $titre = "Evenement Artiste";
        return view('User.Add.ajout',compact('artistes','url','titre','i'));
    }

    public function AjoutEventArtiste(Request $request){

        $prixtotal = DB::select('select tarif from artiste where id='.$request->idArtiste);
        DB::insert("insert into EventArtiste (idEvent, idArtiste, dureheure, tarifTotal) values (".$request->id.",".$request->idArtiste.",".$request->duree.",". ($prixtotal[0]->tarif*$request->duree).")");

        return $this->PageAjoutEventArtiste($request->id);
    }

    public function PageAjoutEventSonorisation($i){
        $element = DB::select('select * from element where idtypes=1 and id NOT IN (Select idsono from eventsono where idevent='.$i.')');
        $url = "ConfirmeAjoutEventSonorisation";
        $titre = "Evenement Sonorisation";
        return view('User.Add.ajout',compact('element','url','titre','i'));
    }

    public function AjoutEventSonorisation(Request $request){

        $prixtotal = DB::select('select tarif from element where id='.$request->idElement);
        DB::insert("insert into EventSono (idEvent, idSono, dureheure, nombre, tariftotal) values (".$request->id.",".$request->idElement.",".$request->duree.",".$request->nombre.",". ($prixtotal[0]->tarif*$request->duree*$request->nombre).")");

        return $this->PageAjoutEventSonorisation($request->id);
    }

    public function PageAjoutEventAutreDepense($i){
        $autreDepense = DB::select('select * from autredepense where id NOT IN (select idautredepense from eventdepense where idevent='.$i.')');
        $url = "ConfirmeAjoutEventAutreDepense";
        $titre = "Evenement Autre depense";
        return view('User.Add.ajout',compact('autreDepense','url','titre','i'));
    }

    public function AjoutEventAutreDepense(Request $request){

        DB::insert("insert into EventDepense (idEvent, idAutreDepense, tarif) values (".$request->id.",".$request->idDepense.",".$request->tarif.")");

        return $this->PageAjoutEventAutreDepense($request->id);
    }

    public function PageAjoutEventPlace($i){
        $lieu = DB::select('select idlieu from event where id='.$i);
        $listeCategLieu = CategorieLieu::where('idlieu', $lieu[0]->idlieu)->get();
        $url = "ConfirmeAjoutEventPlace";
        $titre = "prix pour les places d'evenement";
        return view('User.Add.ajout',compact('lieu','listeCategLieu','url','titre','i'));
    }

    public function AjoutEventplace(Request $request){
        $i = 0;

        while ($request->has('types_'.$i)) {
        $types = $request->input('types_'.$i);
        $places = $request->input('place_'.$i);
        $prix = $request->input('prix_'.$i);
        DB::insert("INSERT INTO eventplace (idevent, idlieu, idtype, place, prix) VALUES (?, ?, ?, ?, ?)", [$request->id, $request->idlieu, $types, $places, $prix]);

        $i++;
    }
        return $this->PageAjoutEventplace($request->id);
    }

    public function EventDetails($id){
        return view('User.List.choix',compact('id'));
    }

    public function EventDetailsArtiste($id){
        $titre = 'eventArtiste';
        $eventArtiste = EventArtiste::where('idevent',$id)->get();
        return view('User.List.liste',compact('eventArtiste','titre','id'));
    }

    public function EventDetailsSono($id){
        $titre = 'eventSono';
        $eventSono = EventSono::where('idevent',$id)->get();
        return view('User.List.liste',compact('eventSono','titre','id'));
    }

    public function EventDetailsDepense($id){
        $titre = 'eventDepense';
        $eventDepense = EventDepense::where('idevent',$id)->get();
        return view('User.List.liste',compact('eventDepense','titre','id'));
    }

    public function EventDetailsPlace($id){
        $titre = 'eventPlace';
        $eventPlace = EventPlace::where('idevent',$id)->get();
        return view('User.List.liste',compact('eventPlace','titre','id'));
    }

    public function EventTotal($id){
        $eventArtiste = EventArtiste::where('idevent',$id)->get();
        $eventDepense = EventDepense::where('idevent',$id)->get();
        $eventSono = EventSono::where('idevent',$id)->get();
        $eventPlace = EventPlace::where('idevent',$id)->get();
        $logistique = DB::select('select logistique from event where id='.$id);
        $tarif = DB::select('select tarif from element where id='.$logistique[0]->logistique);
        $nom = DB::select('select nom from element where id='.$logistique[0]->logistique);
        return view('User.List.eventTotal',compact('nom','tarif','eventArtiste','eventDepense','eventSono','eventPlace','id'));
    }

    public function PageAjoutEventPlaceVendu($i){
        $lieu = DB::select('select idlieu from event where id='.$i);
        $listeCategLieu = CategorieLieu::where('idlieu', $lieu[0]->idlieu)->get();
        $url = "ConfirmeAjoutEventPlaceVendu";
        $titre = "Nombre de place vendu";
        return view('User.Add.ajout',compact('lieu','listeCategLieu','url','titre','i'));
    }

    public function AjoutEventplaceVendu(Request $request){
        $i = 0;

        while ($request->has('types_'.$i)) {
        $types = $request->input('types_'.$i);
        $places = $request->input('place_'.$i);
        $placevendu = $request->input('placevendu_'.$i);
        DB::insert("INSERT INTO AfterEventPlace (idevent, idlieu, idtype, place, vendu) VALUES (?, ?, ?, ?, ?)", [$request->id, $request->idlieu, $types, $places, $placevendu]);

        $i++;
    }
        return $this->PageAjoutEventPlaceVendu($request->id);
    }

    public function Statistique($id){
        $titre = "statistique";
        $eventArtiste = EventArtiste::where('idevent',$id)->get();
        $eventDepense = EventDepense::where('idevent',$id)->get();
        $eventSono = EventSono::where('idevent',$id)->get();

        $AftereventPlace = DB::select('Select * from aftereventplaceprix where idevent='.$id);

        $pourcentage = DB::select('select pourcentage from EventTaxeBenefice where idevent='.$id);
        $pourcentage = $pourcentage[0]->pourcentage;
        $logistique = DB::select('select logistique from event where id='.$id);
        $tarif = DB::select('select tarif from element where id='.$logistique[0]->logistique);
        return view('User.List.statistique',compact('titre','pourcentage','tarif','eventArtiste','eventDepense','eventSono','AftereventPlace','id'));
    }

    public function Diagramme($id){
        $titre = "diagramme";
        $eventArtiste = EventArtiste::where('idevent',$id)->get();
        $eventDepense = EventDepense::where('idevent',$id)->get();
        $eventSono = EventSono::where('idevent',$id)->get();

        $AftereventPlace = DB::select('Select * from aftereventplaceprix where idevent='.$id);

        $pourcentage = DB::select('select pourcentage from EventTaxeBenefice where idevent='.$id);
        $pourcentage = $pourcentage[0]->pourcentage;
        $logistique = DB::select('select logistique from event where id='.$id);
        $tarif = DB::select('select tarif from element where id='.$logistique[0]->logistique);
        return view('User.List.statistique',compact('titre','pourcentage','tarif','eventArtiste','eventDepense','eventSono','AftereventPlace','id'));
    }

    public function GeneratePDF($id){
        $eventArtiste = EventArtiste::where('idevent',$id)->get();
        $eventPlace = EventPlace::where('idevent',$id)->get();
        $event = Event::where('id', $id)->first();
        //return view('User.List.pdf',compact('event','eventArtiste','eventPlace'));
        $pdf = PDF::loadView('User.List.pdf', compact('event', 'eventArtiste', 'eventPlace'))
        ->setPaper('A4', 'paysage')
        ->setOptions(['isHtml5ParserEnabled' => true]);
        return $pdf->download('Event.pdf');
    }

    public function VoirPDF($id){
        $eventArtiste = EventArtiste::where('idevent',$id)->get();
        $eventPlace = EventPlace::where('idevent',$id)->get();
        $event = Event::where('id', $id)->first();
        return view('User.List.pdf',compact('event','eventArtiste','eventPlace'));
    }
}