<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Ajout</title>
        <link rel="stylesheet" href="{{ asset('assets/css/simplebar.css') }}">
        <link
            href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/css/feather.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/app-light.css') }}" id="lightTheme" disabled>
        <link rel="stylesheet" href="{{ asset('assets/css/app-dark.css') }}" id="darkTheme">
    </head>
<body class="dark ">
<div class="wrapper vh-100">
    <div class="row align-items-center h-100">
        <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" action="/login" method="post">
            @csrf
            <svg version="1.1" id="logo" class="navbar-brand-img brand-md" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
              <g>
                  <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                  <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                  <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
              </g>
            </svg>
            <h1 class="h6 mb-3">Se connecter</h1>
            <div class="form-group">
                <label class="sr-only">Email</label>
                <input type="texte" name="mail" class="form-control form-control-lg" placeholder="Email">
            </div>
            <div class="form-group">
                <label class="sr-only">Mot de passe</label>
                <input type="password" name="mdp" class="form-control form-control-lg" placeholder="Mot de passe">
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Valider</button>

            @if (session('error'))
            <br>
            <p>Email ou mot de passe invalide.</p>
            @endif

            <p class="mt-5 mb-3 text-muted">© <script>document.write(new Date().getFullYear())</script> - Aldonis</p>
        </form>
    </div>
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
</body>
</html>