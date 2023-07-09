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

        @include('Header.HeaderAdmin')

        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="page-title">Ajout @php echo($titre) @endphp</h2>
                        <p class="text-muted"></p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <form action="/@php echo($url) @endphp" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            @php
                                            if($titre == "artiste") {
                                            @endphp
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Nom</label>
                                                    <input type="text" name="nom" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Prix par heure</label>
                                                    <input type="number" step="any" name="tarif" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Image</label>
                                                    <input type="file" name="file" class="form-control" required>
                                                </div>
                                            </div>
                                        @php
                                        }
                                        @endphp
    
                                        @php
                                        if($titre == "autre depense") {
                                        @endphp
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Nom</label>
                                                    <input type="text" name="nom" class="form-control" required>
                                                </div>
                                            </div>
                                        @php
                                        }
                                        @endphp

                                        @php
                                        if($titre == "element") {
                                        @endphp
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Nom</label>
                                                    <input type="text" name="nom" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Tarif</label>
                                                    <input type="number" step="any" name="tarif" class="form-control" required>
                                                </div>
                                            </div>
                                            <input type="hidden" name="idtypes" value="{{$i}}">
                                            <div class="form-group mb-3">
                                                <label for="custom-select1">Type qualité</label>
                                                <select class="custom-select" name="idqualite" id="custom-select1">

                                                    @foreach ($Qualites as $Qualite)
                                                    <option value="{{ $Qualite->id }}">{{ $Qualite->qualite }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @php
                                        }
                                        @endphp


                                        @php
                                        if($titre == "lieu") {
                                        @endphp
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Nom</label>
                                                <input type="text" name="nom" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Place be</label>
                                                @for ($i = 0; $i < count($categories); $i++)
                                                <p>{{ $categories[$i]->nom }} <input type="number" name="place_{{ $i }}" class="form-control" required></p>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Total place</label>
                                                <input type="number" step="any" id="totalPlace" readonly name="place" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="custom-select2">Lieu</label>
                                            <select class="custom-select" name="idtypelieu" id="custom-select2">
                                                @foreach ($typeslieu as $typeslieux)
                                                <option value="{{ $typeslieux->nom }}">{{ $typeslieux->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Image</label>
                                                <input type="file" name="file" class="form-control" required>
                                            </div>
                                        </div>
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