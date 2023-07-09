<?php

use App\Http\Controllers\AddController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtisteController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\ElementController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LieuController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\UpdateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::post('/login', [AddController::class, 'Login']);


//liste
Route::get('/element/{id}', [ListController::class, 'ListeElement']);
Route::get('/artiste', [ListController::class, 'ListeArtiste']);
Route::get('/lieu', [ListController::class, 'ListeLieu']);
Route::get('/autredepense', [ListController::class, 'ListeAutreDepense']);

//Ajout
Route::get('/PageAjoutArtiste', [AddController::class, 'PageAjoutArtiste']);
Route::post('/ConfirmeAjoutArtiste', [AddController::class, 'AjoutArtiste']);

Route::get('/PageAjoutAutreDepense', [AddController::class, 'PageAjoutAutreDepense']);
Route::post('/ConfirmeAjoutAutreDepense', [AddController::class, 'AjoutAutreDepense']);

Route::get('/PageAjoutElement/{id}', [AddController::class, 'PageAjoutElement']);
Route::post('/ConfirmeAjoutElement', [AddController::class, 'AjoutElement']);

Route::get('/PageAjoutLieu', [AddController::class, 'PageAjoutLieu']);
Route::post('/ConfirmeAjoutLieu', [AddController::class, 'AjoutLieu']);

//Modification
Route::get('/PageModifierArtiste/{id}', [UpdateController::class, 'PageModifierArtiste']);
Route::post('/ConfirmeModifierArtiste', [UpdateController::class, 'ModifierArtiste']);

Route::get('/PageModifierLieu/{id}', [UpdateController::class, 'PageModifierLieu']);
Route::post('/ConfirmeModifierLieu', [UpdateController::class, 'ModifierLieu']);

Route::get('/PageModifierAutreDepense/{id}', [UpdateController::class, 'PageModifierAutreDepense']);
Route::post('/ConfirmeModifierAutreDepense', [UpdateController::class, 'ModifierAutreDepense']);

Route::get('/PageModifierElement/{id}', [UpdateController::class, 'PageModifierElement']);
Route::post('/ConfirmeModifierElement', [UpdateController::class, 'ModifierElement']);

//suppression
Route::get('/supprimerArtiste/{id}',[DeleteController::class, 'DeleteArtiste']);
Route::get('/supprimerAutreDepense/{id}',[DeleteController::class, 'DeleteAutreDepense']);
Route::get('/supprimerElement/{id}',[DeleteController::class, 'DeleteElement']);
Route::get('/supprimerLieu/{id}',[DeleteController::class, 'DeleteLieu']);


// Evenement - Ajout
Route::get('/PageAjoutEvent', [EventController::class, 'PageAjoutEvent']);
Route::post('/ConfirmeAjoutEvent', [EventController::class, 'AjoutEvent']);

// Evenement - Liste
Route::get('/event', [EventController::class, 'ListeEvent']);

// Evenement - Details
Route::get('/PageAjoutEventArtiste/{id}', [EventController::class, 'PageAjoutEventArtiste']);
Route::post('/ConfirmeAjoutEventArtiste', [EventController::class, 'AjoutEventArtiste']);

Route::get('/PageAjoutEventSonorisation/{id}', [EventController::class, 'PageAjoutEventSonorisation']);
Route::post('/ConfirmeAjoutEventSonorisation', [EventController::class, 'AjoutEventSonorisation']);

Route::get('/PageAjoutEventAutreDepense/{id}', [EventController::class, 'PageAjoutEventAutreDepense']);
Route::post('/ConfirmeAjoutEventAutreDepense', [EventController::class, 'AjoutEventAutreDepense']);

Route::get('/PageAjoutEventPlace/{id}', [EventController::class, 'PageAjoutEventPlace']);
Route::post('/ConfirmeAjoutEventPlace', [EventController::class, 'AjoutEventPlace']);

Route::get('/EventDetails/{id}', [EventController::class, 'EventDetails']);
Route::get('/EventDetailsArtiste/{id}', [EventController::class, 'EventDetailsArtiste']);
Route::get('/EventDetailsSono/{id}', [EventController::class, 'EventDetailsSono']);
Route::get('/EventDetailsDepense/{id}', [EventController::class, 'EventDetailsDepense']);
Route::get('/EventDetailsPlace/{id}', [EventController::class, 'EventDetailsPlace']);
Route::get('/EventTotal/{id}', [EventController::class, 'EventTotal']);
Route::get('/Statistique/{id}', [EventController::class, 'Statistique']);
Route::get('/Diagramme/{id}', [EventController::class, 'Diagramme']);
Route::get('/GeneratePDF/{id}', [EventController::class, 'GeneratePDF']);
Route::get('/VoirPDF/{id}', [EventController::class, 'VoirPDF']);

Route::get('/PageAjoutEventPlaceVendu/{id}', [EventController::class, 'PageAjoutEventPlaceVendu']);
Route::post('/ConfirmeAjoutEventPlaceVendu', [EventController::class, 'AjoutEventPlaceVendu']);