@extends('layouts.header')

@section('contenu')
    <div class="container">
        <div class="input">
            <form action="{{ route('SalleLibre') }}" method="get">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" required name="heure" placeholder="Design" value="0">
                    <label for="floatingInput">HEURE</label>
                </div>
                <div class="form-floating">
                    <input type="submit" value="RECHERCHER" class="btn btn-success" id="floatingPassword">
                </div>
            </form>
        </div>
        <div class="tab">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">IdSalle</th>
                        <th scope="col">Design</th>
                        <th scope="col">Occupation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($occupé as $occupé)
                        <tr>
                            <th>{{$occupé->idsalle}}</th>
                            <td>{{$occupé->design}}</td>
                            <th>{{$occupé->occupation}}</th>
                        </tr>            
                    @endforeach    
                </tbody>
            </table>
        </div>
    </div>
@endsection