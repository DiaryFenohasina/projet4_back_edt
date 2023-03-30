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
        <form class="form" method="post" action="{{ route('EdtUpdate') }}">
            @csrf
            <div class="form-floating mb-3">
                <input type="hidden" class="form-control"  name="id" id="floatingInput" placeholder="ID" value="{{ $_GET['id'] }}">
                <label for="floatingInput">ID</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control"  name="idsalle" id="floatingPassword" placeholder="Nom" value="{{ $_GET['idsalle'] }}">
                <label for="floatingInput">IDSALLE</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control"  name="idprof" id="floatingPassword" placeholder="Nom" value="{{ $_GET['idprof'] }}">
                <label for="floatingInput">IDPROF</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control"  name="cours" id="floatingPassword" placeholder="Nom" value="{{ $_GET['cours'] }}">
                <label for="floatingInput">COURS</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control"  name="date" id="floatingPassword" placeholder="Nom" value="{{ $_GET['date'] }}">
                <label for="floatingInput">DATE</label>
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
        <a href="{{ route('edt') }}">Retour</a>
    </div>
</body>
</html>