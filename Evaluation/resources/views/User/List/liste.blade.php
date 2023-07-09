<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Liste Evenement</title>
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
                        <div class="row">
    
                            <div class="col-md-12 my-4">
                                <h2 class="h4 mb-1">Liste {{$titre}} </h2>
                                <div class="card shadow">
                                    <div class="card-body">

                                        @php
                                            if($titre == "event") {
                                        @endphp
    
                                        <table class="table table-borderless table-hover">
                                            <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Evenement</th>
                                                <th>Lieu</th>
                                                <th>Date</th>
                                                <th>Temps</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($Event as $event)
                                            <tr>
                                                <td>{{ $event->nom }}</td>
                                                <td>{{ $event->idtypesevent }}</td>
                                                <td>{{ $event->lieu->nom }}</td>
                                                <td>{{ $event->datedebut }}</td>
                                                <td>{{ $event->heure }}</td>
                                                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted sr-only">Action</span>
                                                </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="/PageAjoutEventArtiste/{{ $event->id }}">Ajout artiste</a>
                                                        <a class="dropdown-item" href="/PageAjoutEventSonorisation/{{ $event->id }}">Ajout sonorisation</a>
                                                        <a class="dropdown-item" href="/PageAjoutEventAutreDepense/{{ $event->id }}">Ajout autre depense</a>
                                                        <a class="dropdown-item" href="/PageAjoutEventPlace/{{ $event->id }}">Ajout des places</a>
                                                        <a class="dropdown-item" href="/EventDetails/{{ $event->id }}">Voir détails</a>
                                                        <a class="dropdown-item" href="/GeneratePDF/{{ $event->id }}">Voir PDF</a>
                                                        <a class="dropdown-item" href="/EventTotal/{{ $event->id }}">Voir TOTAL</a>
                                                        <a class="dropdown-item" href="/PageAjoutEventPlaceVendu/{{ $event->id }}">Ajout place Vendu</a>
                                                        <a class="dropdown-item" href="/Statistique/{{ $event->id }}">Statistique</a>
                                                        <a class="dropdown-item" href="/Diagramme/{{ $event->id }}">Diagramme</a>
                                                        <a class="dropdown-item" href="<%=request.getContextPath()%>/Doublement?id=<%=p.getId()%>">Bis</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                        @php
                                        }
                                        @endphp

                                        @php
                                        if($titre == "eventArtiste") {
                                        @endphp

                                        <table class="table table-borderless table-hover">
                                        <thead>
                                        <tr>
                                            <th>Artiste</th>
                                            <th>Duree</th>
                                            <th>Tarif Total</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        
                                            @php
                                            $totalTarif = 0;
                                            @endphp
                                        
                                        @foreach ($eventArtiste as $eventArtistes)
                                        <tr>
                                            <td>{{ $eventArtistes->artiste->nom }}</td>
                                            <td>{{ $eventArtistes->dureheure }}</td>
                                            <td>{{ $eventArtistes->tariftotal }}</td>
                                            <td><div class="col-auto">
                                                <a href="">
                                                      <span class="circle circle-sm bg-light" title="Modifier">
                                                        <i class="fe fe-edit"></i>
                                                      </span>
                                                </a>
                                                <a href="">
                                                      <span class="circle circle-sm bg-light" title="Supprimer">
                                                        <i class="fe fe-delete"></i>
                                                      </span>
                                                </a>
                                            </div></td>
                                        </tr>

                                        @php
                                        $totalTarif += $eventArtistes->tariftotal;
                                        @endphp

                                        @endforeach
                                        
                                        <tr>
                                            <td colspan="2">Somme des tarifs : {{ $totalTarif }} Ar</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                        @php
                                        }
                                        @endphp


@php
if($titre == "eventSono") {
@endphp

<table class="table table-borderless table-hover">
<thead>
<tr>
    <th>Sonorisation</th>
    <th>Duree</th>
    <th>Nombre</th>
    <th>Tarif Total</th>
    <th></th>
</tr>
</thead>
<tbody>

    @php
    $totalTarif = 0;
    @endphp

@foreach ($eventSono as $eventSonos)
<tr>
    <td>{{ $eventSonos->sonorisation->nom }}</td>
    <td>{{ $eventSonos->dureheure }}</td>
    <td>{{ $eventSonos->nombre }}</td>
    <td>{{ $eventSonos->tariftotal }}</td>
    <td><div class="col-auto">
        <a href="">
              <span class="circle circle-sm bg-light" title="Modifier">
                <i class="fe fe-edit"></i>
              </span>
        </a>
        <a href="">
              <span class="circle circle-sm bg-light" title="Supprimer">
                <i class="fe fe-delete"></i>
              </span>
        </a>
    </div></td>
</tr>

@php
$totalTarif += $eventSonos->tariftotal;
@endphp

@endforeach

<tr>
    <td colspan="2">Somme des tarifs : {{ $totalTarif }} Ar</td>
</tr>
</tbody>
</table>

@php
}
@endphp


@php
if($titre == "eventDepense") {
@endphp

<table class="table table-borderless table-hover">
<thead>
<tr>
    <th>Autre depense</th>
    <th>Tarif Total</th>
    <th></th>
</tr>
</thead>
<tbody>

    @php
    $totalTarif = 0;
    @endphp

@foreach ($eventDepense as $eventDepenses)
<tr>
    <td>{{ $eventDepenses->autredepense->nom }}</td>
    <td>{{ $eventDepenses->tarif }}</td>
    <td><div class="col-auto">
        <a href="">
              <span class="circle circle-sm bg-light" title="Modifier">
                <i class="fe fe-edit"></i>
              </span>
        </a>
        <a href="">
              <span class="circle circle-sm bg-light" title="Supprimer">
                <i class="fe fe-delete"></i>
              </span>
        </a>
    </div></td>
</tr>

@php
$totalTarif += $eventDepenses->tarif;
@endphp

@endforeach

<tr>
    <td colspan="2">Somme des tarifs : {{ $totalTarif }} Ar</td>
</tr>
</tbody>
</table>

@php
}
@endphp


@php
if($titre == "eventPlace") {
@endphp

<table class="table table-borderless table-hover">
<thead>
<tr>
    <th>Types</th>
    <th>Place</th>
    <th>Prix</th>
</tr>
</thead>
<tbody>

    @php
    $totalTarif = 0;
    @endphp

@foreach ($eventPlace as $eventPlaces)
<tr>
    <td>{{ $eventPlaces->types->nom }}</td>
    <td>{{ $eventPlaces->place }}</td>
    <td>{{ $eventPlaces->prix }}</td>
    <td><div class="col-auto">
        <a href="">
              <span class="circle circle-sm bg-light" title="Modifier">
                <i class="fe fe-edit"></i>
              </span>
        </a>
        <a href="">
              <span class="circle circle-sm bg-light" title="Supprimer">
                <i class="fe fe-delete"></i>
              </span>
        </a>
    </div></td>
</tr>

@php
$totalTarif += $eventPlaces->prix*$eventPlaces->place;
@endphp

@endforeach

<tr>
    <td colspan="2">Somme des tarifs : {{ $totalTarif }} Ar</td>
</tr>
</tbody>
</table>

@php
}
@endphp


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