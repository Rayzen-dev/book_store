@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $customers->firstname }} {{ $customers->name }}</div>

                <div class="panel-body">
                    <p>Livres empruntés :</p>
                    @if (!empty($history))
                        <ul>
                        @foreach($history as $_history)
                            <li>{{$_history->name}} (<b>{{$_history->author}}</b>) | rendu : 
                            @if($_history->bring_back == 1)
                                oui
                            @else
                                non &nbsp;<a href='{{ url("loan/delete/$customers->id/$_history->id") }}'>Rendre ?</a>
                            @endif
                            </li>
                        @endforeach
                        </ul>
                    @else
                        <p>Aucun livre</p>
                    @endif
                </div>
            </div>
            <a href='{{ url("/customer/profile/$customers->id/loan") }}' class="btn btn-default">Emprunt</a>
            <a href='{{ url("/customer/update/$customers->id") }}' class="btn btn-info">Modifier</a>
            <a href='{{ url("/customer/delete/$customers->id") }}' class="btn btn-danger">Supprimer</a>
        </div>
    </div>
</div>
@endsection