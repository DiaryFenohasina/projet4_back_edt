@extends('layouts.header')

@section('contenu')
<div class="container">
    <div class="input">
        <form class="form" method="post" action="{{ route('EdtCreate') }}">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="idclasse" required id="floatingInput" placeholder="ID">
                <label for="floatingInput">ID Classe</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="idsalle" required id="floatingPassword" placeholder="Nom">
                <label for="floatingInput">ID Salle</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="idprof" required id="floatingPassword" placeholder="Prenom">
                <label for="floatingInput">ID Prof</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="cours" required id="floatingPassword" placeholder="Grade">
                <label for="floatingInput">Cours</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="date" required id="floatingPassword" placeholder="Grade">
                <label for="floatingInput">Date</label>
            </div>
            <div class="form-floating mb-3">
                <input type="submit" value="ENREGISTRER" class="btn btn-success" id="floatingPassword">
            </div>
        </form>
        <div class="msg">
            @if (session()->has('succes'))
                <div class="alert alert-success">
                    {{ session()->get('succes') }}
                </div>
            @endif
        </div>
    </div>
    <div class="tab">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Id Salle</th>
                    <th scope="col">Id Prof</th>
                    <th scope="col">Cours</th>
                    <th scope="col">Date</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($edt as $edt)
                <tr>
                    <th scope="row">{{ $edt->idclasse }}</th>
                    <td>{{ $edt->idsalle }}</td>
                    <td>{{ $edt->idprof }}</td>
                    <td>{{ $edt->cours }}</td>
                    <td>{{ $edt->date }}</td>
                    <td>
                        <form action="{{ route('editEdt') }}" method="get">
                            @csrf
                            <input type="hidden" name="id" value="{{ $edt->idclasse }}">
                            <input type="hidden" name="idsalle" value="{{ $edt->idsalle }}">
                            <input type="hidden" name="idprof" value="{{ $edt->idprof }}">
                            <input type="hidden" name="cours" value="{{ $edt->cours }}">
                            <input type="hidden" name="date" value="{{ $edt->date }}">
                            <button class="btn btn-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil"
                            viewBox="0 0 16 16">
                                <path
                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                            </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection