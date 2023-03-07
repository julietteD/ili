<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>I LOVE IXELLES</title>
        <link rel="shortcut icon" href="{{ asset('/img/coeur.png') }}" type="image/x-icon">
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css"   href="{{ asset('/css/app.css?v=2') }}">
        <!-- Styles -->
    
      
    </head>
    <body class="@if($view=='list') listView  @else  mapView  @endif">
    <div id="grid">
      <ul>
    <script>  
        let total = 20
        var width = document.body.clientWidth;
        var height = screen.height;
      
        for (let pas = 0; pas <  total; pas++) {
            stepw = width/total;
            steph = height/total;
            document.write('<li style="left:'+stepw*pas+'px"></li><li style="top:'+stepw*pas+'px"></li>');
        }
        </script>
        
        
        </ul>
</div>
      <div id="mainContent"> 
        <header>
            <a href="{{ route('welcome') }}">I loooove Ixelles</a>
            <a class="instalink" href="instagram">Insta</a>
        </header>
     
        {{ $slot }}
    </div>
    <script src="{{ asset('js/main.js') }}"> </script>.  
</body>

</html>