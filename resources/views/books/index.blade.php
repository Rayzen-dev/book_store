@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Index des livres</div>

                <div class="panel-body">
                    @if (!empty($books))
                    <ul>
                        @foreach ($books as $book)
                        @if($book->inventory > 0)
                        <li>{{ $book->name }} (<b>{{ $book->author }}</b>) x{{ $book->inventory }} - <a href='{{ url("book/delete/$book->id") }}'>Supprimer</a> / <a href='{{ url("book/update/$book->id") }}'>Modifier</a></li>
                        @endif
                        @endforeach
                    </ul>
                    @else
                    <p>Pas de livres pour le moment</p>
                    @endif
                </div>
            </div>
            <a href='{{ url("/book/create") }}' class="btn btn-info">Ajouter</a>
        </div>
    </div>
</div>
@endsection