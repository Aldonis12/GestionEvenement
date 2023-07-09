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
                        
                            @php
                            $totalTarifArtiste = 0;
                            @endphp
                            @foreach ($eventArtiste as $eventArtistes)
                            @php
                            $totalTarifArtiste += $eventArtistes->tariftotal;
                            @endphp
                            @endforeach

                            @php
                            $totalTarifSono = 0;
                            @endphp
                            @foreach ($eventSono as $eventSonos)
                            @php
                            $totalTarifSono += $eventSonos->tariftotal;
                            @endphp
                            @endforeach

                            @php
                            $totalTarifDepense = 0;
                            @endphp
                            @foreach ($eventDepense as $eventDepenses)
                            @php
                            $totalTarifDepense += $eventDepenses->tarif;
                            @endphp
                            @endforeach


                            @php
                                if($titre == "statistique") {
                            @endphp
                            
                            <div class="col-md-12 my-4">
                                <h2 class="h4 mb-1">STATISTIQUE </h2>
                                <div class="card shadow">
                                    <div class="card-body">
                                        @php
                                        $totalTarifPlace = 0;
                                        @endphp
                                        @foreach ($AftereventPlace as $eventPlaces)
                                        @php
                                        $totalTarifPlace += $eventPlaces->prix*$eventPlaces->vendu;
                                        @endphp
                                        @endforeach

                                        <p>La somme totale est de : <strong>{{$totalTarifArtiste+$tarif[0]->tarif+$totalTarifSono+$totalTarifDepense}} ARIARY </strong></p>
                                        <br>
                                        <p>La somme des places est de : <strong>{{$totalTarifPlace}} ARIARY </strong></p>
                                        <br>

                                        @php
                                        $benefice = $totalTarifPlace - $totalTarifArtiste+$tarif[0]->tarif+$totalTarifSono+$totalTarifDepense;
                                        $depense = $totalTarifArtiste+$tarif[0]->tarif+$totalTarifSono+$totalTarifDepense;
                                        @endphp

                                        <h6><strong>Statistique</strong></h6>
                                        <table class="table table-bordered table-hover mb-0">
                                            <thead>
                                            <tr>
                                                <th>Montant recette</th>
                                                <th>Montant depense</th>
                                                <th>Montant depense avec taxe</th>
                                                <th>Taxe</th>
                                                <th>Benefice</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <td>{{$totalTarifPlace}}</td>
                                            <td>{{$depense}}</td>
                                            <td>{{$depense*($pourcentage/100)}}</td>
                                            <td>{{$pourcentage}}</td>
                                            <td>{{$benefice}}</td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            @php
                            }
                            @endphp

                            @php
                            if($titre == "diagramme") {
                            @endphp

                            <div class="col-md-6 my-4">
                                <h2 class="h4 mb-1">Diagramme</h2>
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <canvas id="ex"></canvas>
                                        </div>
                                    </div>
                            </div>

                            <div class="col-md-6 my-4">
                                <h2 class="h4 mb-1">Valeur</h2>
                                <div class="card shadow">
                                    <div class="card-body">
                                        <p>Artiste : {{$totalTarifArtiste}} AR <br><br>
                                            Sonorisation : {{$totalTarifSono}} AR <br><br>
                                            Autre depense : {{$totalTarifDepense}} AR <br><br>
                                            Logistique : {{$tarif[0]->tarif}} AR
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                            <script>
                            const ctx = document.getElementById("ex");
                            var title = 'Statistique';
                            var dataset = 100;
                            console.log(dataset);

                            new Chart(ctx, {
                                type: 'doughnut',
                                data:{
                                    labels : [
                                        'Artiste','Sonorisation','Autre Depense','Logistique'
                                    ],
                                    datasets: [{
                                        label:title,
                                        data: [
                                            {{$totalTarifArtiste}},{{$totalTarifSono}},{{$totalTarifDepense}},{{$tarif[0]->tarif}}
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                option: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }

                            });
                            </script>

                            @php
                            }
                            @endphp

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