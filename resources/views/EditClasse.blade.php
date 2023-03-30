<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <title>Document</title>
</head>
<body>
    <div class="input">
        <form class="form" method="post" action="{{ route('ClasseUpdate') }}">
            @csrf
            <div class="form-floating mb-3">
                <input type="hidden" class="form-control"  name="id" id="floatingInput" placeholder="ID" value="{{ $_GET['id'] }}">
                <label for="floatingInput">ID</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control"  name="Niveau" id="floatingPassword" placeholder="Nom" value="{{ $_GET['Niveau'] }}">
                <label for="floatingInput">NIVEAU</label>
            </div>
            <div class="form-floating mb-3">
                <input type="submit" value="MODIFIER"  class="btn btn-success" id="floatingPassword">
            </div>
        </form>
        <div class="msg">
            @if (session()->has('succes'))
                <div class="alert alert-success">
                    {{ session()->get('succes') }}
                </div>
            @endif
        </div>
        <a href="{{ route('classe') }}">Retour</a>
    </div>
</body>
</html>