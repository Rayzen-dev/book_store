@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Index des emprunts</div>

                <div class="panel-body">
                    @if (!empty($loans))
                    <p>Nombre d'emprunt(s) en cours: {{ count($loans) }}</p>
                    <ul>
                        @foreach ($loans as $loan)
                        <li>{{ $loan->customer_name }} {{ $loan->customer_firstname }} - {{ $loan->book_name }} (<b>{{ $loan->book_author }}</b>) - <a href='{{ url("loan/delete/$loan->customer_id/$loan->book_id") }}'>Rendre</a></li>
                        @endforeach
                    </ul>
                    @else
                    <p>Aucun prêt enregistré</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection