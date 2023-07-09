<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ajout {{$titre}}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/simplebar.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app-light.css') }}" id="lightTheme" disabled>
    <link rel="stylesheet" href="{{ asset('assets/css/app-dark.css') }}" id="darkTheme">
</head>
<body class="vertical dark ">
    <div class="wrapper">

        @include('Header.HeaderUser')

        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="page-title">Ajout @php echo($titre) @endphp / <a href="/event">Revenir</a></h2>
                        <p class="text-muted"></p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <form action="/@php echo($url) @endphp" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            @php
                                            if($titre == "Evenement") {
                                                $date = date('Y-m-d');
                                            @endphp
                                        <div class="form-row">
                                          <div class="form-group col-md-6">
                                            <label>Nom</label>
                                            <input type="text" name="nom" class="form-control" required>
                                          </div>
                                        </div>

                                        <div class="form-group mb-3">
                                          <label for="custom-select">Type evenement</label>
                                          <select class="custom-select" name="typesevent" id="custom-select">
                                            @foreach ($typeEvent as $typeEvents)
                                            <option value="{{ $typeEvents->nom }}">{{ $typeEvents->nom }}</option>
                                            @endforeach
                                          </select>
                                        </div>

                                        <div class="form-group mb-3">
                                          <label for="custom-select1">Lieu</label>
                                          <select class="custom-select" name="lieu" id="custom-select1">

                                            @foreach ($lieu as $lieux)
                                            <option value="{{ $lieux->id }}">{{ $lieux->nom }}</option>
                                            @endforeach
                                          </select>
                                        </div>

                                        <div class="form-row">
                                          <div class="form-group col-md-6">
                                            <label>Date debut</label>
                                            <input type="date" name="datedebut" min="{{$date}}" class="form-control" required>
                                          </div>
                                        </div>

                                        <div class="form-row">
                                          <div class="form-group col-md-6">
                                            <label>Heure debut</label>
                                            <input type="time" step="1" name="heure" class="form-control" required>
                                          </div>
                                        </div>

                                        <div class="form-group mb-3">
                                          <label for="custom-select2">Logistique</label>
                                          <select class="custom-select" name="logistique" id="custom-select2">
                                            @foreach ($logistique as $logistiques)
                                            <option value="{{ $logistiques->id }}">{{ $logistiques->nom }}</option>
                                            @endforeach
                                          </select>
                                        </div>

                                        @php
                                        }
                                        @endphp


                                        @php
                                        if($titre == "Evenement Artiste") {
                                        @endphp
                                        <input type="hidden" name="id" class="form-control" value="{{$i}}">
                                        <div class="form-group mb-3">
                                            <label for="custom-select1">Artiste</label>
                                            <select class="custom-select" name="idArtiste" id="custom-select1">
                                              @foreach ($artistes as $artiste)
                                                <option value="{{ $artiste->id }}">{{ $artiste->nom }}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Durée</label>
                                            <input type="number" name="duree" class="form-control" value="0">
                                        </div>

                                        @php
                                        }
                                        @endphp

                                        @php
                                        if($titre == "Evenement Sonorisation") {
                                        @endphp
                                        <input type="hidden" name="id" class="form-control" value="{{$i}}">
                                        <div class="form-group mb-3">
                                            <label for="custom-select2">Sonorisation</label>
                                            <select class="custom-select" name="idElement" id="custom-select2">
                                              @foreach ($element as $elements)
                                                <option value="{{ $elements->id }}">{{ $elements->nom }}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Duree</label>
                                            <input type="number" name="duree" class="form-control" value="0">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Nombre</label>
                                            <input type="number" name="nombre" class="form-control" value="0">
                                        </div>

                                        @php
                                        }
                                        @endphp

                                        @php
                                        if($titre == "Evenement Autre depense") {
                                        @endphp
                                        <input type="hidden" name="id" class="form-control" value="{{$i}}">
                                        <div class="form-group mb-3">
                                            <label for="custom-select3">Autre depense</label>
                                            <select class="custom-select" name="idDepense" id="custom-select3">
                                              @foreach ($autreDepense as $autreDepenses)
                                                <option value="{{ $autreDepenses->id }}">{{ $autreDepenses->nom }}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Tarif</label>
                                            <input type="number" step="any" name="tarif" value="0" class="form-control">
                                        </div>

                                        @php
                                        }
                                        @endphp

                                        @php
                                        if($titre == "prix pour les places d'evenement") {
                                        @endphp
                                        <input type="hidden" name="id" class="form-control" value="{{$i}}">
                                        <input type="hidden" name="idlieu" value="{{$lieu[0]->idlieu}}">
                                        @for ($i = 0; $i < count($listeCategLieu); $i++)
                                        <div class="form-group col-md-6">
                                            <label>{{ $listeCategLieu[$i]->categorie->nom }} ( {{ $listeCategLieu[$i]->place }} places )</label>
                                            <input type="hidden" name="types_{{ $i }}" value="{{ $listeCategLieu[$i]->categorie->id }}" class="form-control">
                                            <input type="hidden" name="place_{{ $i }}" value="{{ $listeCategLieu[$i]->place }}" class="form-control">
                                            <input type="number" step="any" name="prix_{{ $i }}" value="0.0" class="form-control">
                                        </div>
                                        @endfor

                                        @php
                                        }
                                        @endphp

                                        @php
                                        if($titre == "Nombre de place vendu") {
                                        @endphp
                                        <input type="hidden" name="id" class="form-control" value="{{$i}}">
                                        <input type="hidden" name="idlieu" value="{{$lieu[0]->idlieu}}">
                                        @for ($i = 0; $i < count($listeCategLieu); $i++)
                                        <div class="form-group col-md-6">
                                            <label>{{ $listeCategLieu[$i]->categorie->nom }} ( {{ $listeCategLieu[$i]->place }} places )</label>
                                            <input type="hidden" name="types_{{ $i }}" value="{{ $listeCategLieu[$i]->categorie->id }}" class="form-control">
                                            <input type="hidden" name="place_{{ $i }}" value="{{ $listeCategLieu[$i]->place }}" class="form-control">
                                            <input type="number" name="placevendu_{{ $i }}" value="0" max="{{ $listeCategLieu[$i]->place }}"  class="form-control">
                                        </div>
                                        @endfor

                                        @php
                                        }
                                        @endphp

                                            <button type="submit" class="btn btn-primary">Ajouter</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.stickOnScroll.js') }}"></script>
    <script src="{{ asset('assets/js/tinycolor-min.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="{{ asset('assets/js/apps.js') }}"></script>

    <script>
        var inputsCategorie = document.querySelectorAll('[name^="place_"]');
        inputsCategorie.forEach(function(input) {
            input.addEventListener('change', calculerSomme);
        });
        function calculerSomme() {
            var somme = 0;
            inputsCategorie.forEach(function(input) {
                somme += parseFloat(input.value) || 0;
            });
            var inputPlace = document.getElementById('totalPlace');
            inputPlace.value = somme;
        }
    </script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-56159088-1');
    </script>
</body>
</html>