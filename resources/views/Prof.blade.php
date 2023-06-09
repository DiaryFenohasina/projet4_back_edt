@extends('layouts.header')

@section('contenu')
<div class="container">
    <div class="input">
        <form class="form" method="post" action="{{ route('ProfCreate') }}">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" required name="idprof" id="floatingInput" placeholder="ID">
                <label for="floatingInput">ID</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" required name="Nom" id="floatingPassword" placeholder="Nom">
                <label for="floatingInput">NOM</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" required name="Prénoms" id="floatingPassword" placeholder="Prenom">
                <label for="floatingInput">PRENOM</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" required name="Grade" id="floatingPassword" placeholder="Grade">
                <label for="floatingInput">GRADE</label>
            </div>
            <div class="form-floating mb-3">
                <input type="submit" value="ENREGISTRER" required class="btn btn-success" id="floatingPassword">
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
        <table class="table" >
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Grade</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($utilisateur as $professeurs)
                    <tr>
                        <th scope="row">{{ $professeurs->idprof }}</th>
                        <td>{{ $professeurs->Nom }}</td>
                        <td>{{ $professeurs->Prénoms }}</td>
                        <td>{{ $professeurs->Grade }}</td>
                        <td>
                            <form action="{{ route('editProf') }}" method="get">
                                @csrf
                                <input type="hidden" name="id" value="{{ $professeurs->idprof }}">
                                <input type="hidden" name="Nom" value="{{ $professeurs->Nom }}">
                                <input type="hidden" name="Prénoms" value="{{ $professeurs->Prénoms }}">
                                <input type="hidden" name="Grade" value="{{ $professeurs->Grade }}">
                                <button class="btn btn-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil"
                                viewBox="0 0 16 16">
                                    <path
                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                </svg>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('ProfDelete') }}" method="get">
                                @csrf
                                <input type="hidden" name="id" value="{{ $professeurs->idprof }}">
                                <button class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette ligne ?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3"
                                viewBox="0 0 16 16">
                                    <path
                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
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