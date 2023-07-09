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
                                <h2 class="h4 mb-1">TOTAL </h2>
                                <div class="card shadow">
                                    <div class="card-body">
                                        <a href=""><button type="button" class="btn mb-5 btn-secondary"><span class="fe fe-download fe-1"> Exporter au format pdf </span></button></a>
                                        <h6><strong>Artiste</strong></h6>
                                        <table class="table table-borderless table-hover">
                                            <thead>
                                            <tr>
                                                <th>Artiste</th>
                                                <th>Duree</th>
                                                <th>Tarif Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            
                                                @php
                                                $totalTarifArtiste = 0;
                                                @endphp
                                            
                                            @foreach ($eventArtiste as $eventArtistes)
                                            <tr>
                                                <td>{{ $eventArtistes->artiste->nom }}</td>
                                                <td>{{ $eventArtistes->dureheure }}</td>
                                                <td>{{ $eventArtistes->tariftotal }}</td>
                                            </tr>
    
                                            @php
                                            $totalTarifArtiste += $eventArtistes->tariftotal;
                                            @endphp
    
                                            @endforeach
                                        </tbody>
                                        </table>

                                        <br>
                                        <h6><strong>Logistique</strong></h6>
                                        <table class="table table-bordered table-hover mb-0">
                                            <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Tarif</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>{{$nom[0]->nom}}</td>
                                                <td>{{$tarif[0]->tarif}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <br>

                                        <h6><strong>Sonorisation</strong></h6>
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
                                                $totalTarifSono = 0;
                                                @endphp
                                            
                                            @foreach ($eventSono as $eventSonos)
                                            <tr>
                                                <td>{{ $eventSonos->sonorisation->nom }}</td>
                                                <td>{{ $eventSonos->dureheure }}</td>
                                                <td>{{ $eventSonos->nombre }}</td>
                                                <td>{{ $eventSonos->tariftotal }}</td>
                                            </tr>
                                            
                                            @php
                                            $totalTarifSono += $eventSonos->tariftotal;
                                            @endphp
                                            
                                            @endforeach
                                            </tbody>
                                            </table>
                                        <br>
                                        <h6><strong>Autre depense</strong></h6>
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
                                                $totalTarifDepense = 0;
                                                @endphp
                                            
                                            @foreach ($eventDepense as $eventDepenses)
                                            <tr>
                                                <td>{{ $eventDepenses->autredepense->nom }}</td>
                                                <td>{{ $eventDepenses->tarif }}</td>
                                            </tr>
                                            
                                            @php
                                            $totalTarifDepense += $eventDepenses->tarif;
                                            @endphp
                                            
                                            @endforeach
                                            
                                            </tbody>
                                            </table>
                                        <br>
                                        <h6><strong>Place</strong></h6>
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
                                                $totalTarifPlace = 0;
                                                @endphp
                                            
                                            @foreach ($eventPlace as $eventPlaces)
                                            <tr>
                                                <td>{{ $eventPlaces->types->nom }}</td>
                                                <td>{{ $eventPlaces->place }}</td>
                                                <td>{{ $eventPlaces->prix }}</td>
                                            </tr>
                                            
                                            @php
                                            $totalTarifPlace += $eventPlaces->prix*$eventPlaces->place;
                                            @endphp
                                            
                                            @endforeach
                                            </tbody>
                                            </table>
                                        <br>

                                        <p>Les depenses au totale est de : <strong>
                                            @php
                                            $total = $totalTarifArtiste+$totalTarifSono+$totalTarifDepense+$tarif[0]->tarif;
                                            @endphp
                                            {{$total}}
                                            ARIARY </strong></p>

                                        <br>
                                        <p>La somme des places est de : <strong>
                                            {{$totalTarifPlace}}
                                            ARIARY </strong></p>
                                        <br>
                                        @php
                                        $benefice = $totalTarifPlace - $total;
                                        @endphp
    
                                        <p>BENEFICE :
                                            @php if ($benefice>0){ @endphp
                                            <strong style="color: #1c8b37">{{$benefice}} ARIARY </strong>
                                            @php } else if ($benefice < 0) { @endphp
                                            <strong style="color: #721c24">{{$benefice}} ARIARY </strong>
                                            @php } @endphp
                                        </p>
    
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