<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

    <script defer src="https://use.fontawesome.com/releases/v5.0.2/js/all.js"></script>    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    {{-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1zZzMiGCO1tIPeuMuMshBeLGqtNczNcY&libraries=places"></script> --}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Football Online') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/matches.js') }}" defer></script>
    <script src="{{ asset('js/league.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
    <link href="{{ asset('css/club_page.css') }}" rel="stylesheet">
    <link href="{{ asset('css/clubs_all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/league_matches.css') }}" rel="stylesheet">
    <link href="{{ asset('css/league_page.css') }}" rel="stylesheet">
    <link href="{{ asset('css/leagues_all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/left_sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/matches.css') }}" rel="stylesheet">
    <link href="{{ asset('css/player_info.css') }}" rel="stylesheet">
    <link href="{{ asset('css/table_standings.css') }}" rel="stylesheet">
    <link href="{{ asset('css/map.css') }}" rel="stylesheet">

</head>

<body>

    <div id="app">  {{-- OVO NEKA OSTANE ZBOG VUE.JS --}}
       
        @include('partials.header')

        <div class="off-canvas-content">

            @include('partials.navigation')

            <main>

                <div class="main">
                    
                    @include('partials.left-sidebar')
                    @include('partials.main-content')
                    @include('partials.right-sidebar')
                    
                </div>
                
            </main>

            @include('partials.footer')

        </div>

    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
