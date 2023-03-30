<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <title>Document</title>
    <style>
        nav{
            display: flex;
            gap: 5cm;
            justify-content: center;
            padding: 1cm;
            font-style: oblique;
            font-weight: bold;
        }
        a{
            font-size: 0.7cm;
            text-decoration: none;
            color: #42b983;
        }
        .container .input{
            width: 10cm;
            padding: 1.2cm;
            border: #42b983 solid;
            border-radius: 0.2cm;
            box-shadow: 10px 10px 10px darkgray;
        }
        .tab{
            width: 32cm;
            padding: 1.2cm;
            border: #42b983 solid;
            border-radius: 0.2cm;
            box-shadow: 10px 10px 10px darkgray;
        }
        .container{
            display: flex;
            gap: 2cm;
        }
    </style>
</head>
<body>
    <div class="SideBar">
        <nav>
            <a href="{{ route('professeurs') }}">Professeurs</a>
            <a href="{{ route('classe') }}">Classes</a>
            <a href="{{ route('salle') }}">Salles</a>
            <a href="{{ route('edt') }}">Emploi du temps</a>
            <a href="{{ route('acceuil') }}">Acceuil</a>
        </nav>
    </div>
    <div class=" mt-5">
        @yield('contenu')
    </div>
</body>
</html>