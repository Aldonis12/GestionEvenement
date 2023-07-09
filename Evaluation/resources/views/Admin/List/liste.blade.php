<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Liste {{$var}}</title>
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

        @include('Header.HeaderAdmin')

        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="row">

                            <div class="col-md-12 my-4">
                                <h2 class="h4 mb-1">Liste {{$var}}</h2>
                                <div class="card shadow">
                                    <div class="card-body">

                                        @php
                                            if($var == "artiste") {
                                        @endphp
                                                <table class="table table-borderless table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Tarif</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($artistes as $artiste)
                                                    <tr>
                                                        <td>{{ $artiste->nom }}</td>
                                                        <td>{{ $artiste->tarif }} Ar / h</td>
                                                        <td><div class="col-auto">
                                                            <a href="/PageModifierArtiste/{{ $artiste->id }}">
                                                                <span class="circle circle-sm bg-light" title="Modifier">
                                                                    <i class="fe fe-edit"></i>
                                                                </span>
                                                            </a>
                                                            <a href="/supprimerArtiste/{{ $artiste->id }}">
                                                                <span class="circle circle-sm bg-light" title="Supprimer">
                                                                    <i class="fe fe-delete"></i>
                                                                </span>
                                                            </a>
                                                        </div></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        @php
                                        }
                                        @endphp


                                        @php
                                        if($var == "lieu") {
                                        @endphp
                                            <table class="table table-borderless table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Place</th>
                                                <th>Lieu</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($lieux as $lieu)
                                                <tr>
                                                    <td>{{ $lieu->nom }}</td>
                                                    <td>{{ $lieu->place }}</td>
                                                    <td>{{ $lieu->idtypelieu }}</td>
                                                    <td><div class="col-auto">
                                                            <a href="/PageModifierLieu/{{ $lieu->id }}">
                                                                <span class="circle circle-sm bg-light" title="Modifier">
                                                                    <i class="fe fe-edit"></i>
                                                                </span>
                                                            </a>
                                                            <a href="/supprimerLieu/{{ $lieu->id }}">
                                                                <span class="circle circle-sm bg-light" title="Supprimer">
                                                                    <i class="fe fe-delete"></i>
                                                                </span>
                                                            </a>
                                                        </div></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        </table>

                                        @php
                                        }
                                        @endphp

                                        @php
                                        if($var == "element") {
                                        @endphp
                                            <table class="table table-borderless table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Qualite</th>
                                                <th>Tarif</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($elements as $element)
                                                <tr>
                                                    <td>{{ $element->nom }}</td>
                                                    <td>{{ $element->qualites->qualite }}</td>
                                                    <td>{{ $element->tarif }}</td>
                                                    <td><div class="col-auto">
                                                            <a href="/PageModifierElement/{{ $element->id }}">
                                                                <span class="circle circle-sm bg-light" title="Modifier">
                                                                    <i class="fe fe-edit"></i>
                                                                </span>
                                                            </a>
                                                            <a href="/supprimerElement/{{ $element->id }}">
                                                                <span class="circle circle-sm bg-light" title="Supprimer">
                                                                    <i class="fe fe-delete"></i>
                                                                </span>
                                                            </a>
                                                        </div></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        </table>

                                        @php
                                        }
                                        @endphp

                                        @php
                                        if($var == "autre depense") {
                                        @endphp
                                            <table class="table table-borderless table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($Autredepenses as $Autredepense)
                                                <tr>
                                                    <td>{{ $Autredepense->nom }}</td>
                                                    <td><div class="col-auto">
                                                            <a href="/PageModifierAutreDepense/{{ $Autredepense->id }}">
                                                                <span class="circle circle-sm bg-light" title="Modifier">
                                                                    <i class="fe fe-edit"></i>
                                                                </span>
                                                            </a>
                                                            <a href="/supprimerAutreDepense/{{ $Autredepense->id }}">
                                                                <span class="circle circle-sm bg-light" title="Supprimer">
                                                                    <i class="fe fe-delete"></i>
                                                                </span>
                                                            </a>
                                                        </div></td>
                                                </tr>
                                            @endforeach
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