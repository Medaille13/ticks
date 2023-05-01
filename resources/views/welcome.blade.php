<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Tickets</title>
    
    <!-- Styles & Fonts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/StyleAccueil.css') }}" >
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">   
   
   <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
    <div class="container-first">
        <h1><span>Help </span><span>Desk </span></h1>
        <div class="container-btns">
            
            <button class="btn-first b1 " ><a href="{{ url('/login') }}" >Ticket Office</button>    
            </div>
        </div>    
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
        <script type="text/javascript" src="{{ asset('js/app2.js') }}"></script>
    </body>
    </html>
