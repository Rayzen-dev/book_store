@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Index des membres</div>

                <div class="panel-body">
                    @if (!empty($customers))
                    <ul>
                        @foreach ($customers as $customer)
                        <li>{{ $customer->name }} {{ $customer->firstname }} - <a href='{{ url("/customer/profile/$customer->id") }}'>Voir le profil</a> / <a href='{{ url("/customer/update/$customer->id") }}'>Éditer</a> / <a href='{{ url("/customer/delete/$customer->id") }}'>Supprimmer</a></li>
                        @endforeach
                    </ul>
                    @else
                    <p>Aucun membre enregistré</p>
                    @endif
                </div>
            </div>
            <a href='{{ url("/customer/create") }}' class="btn btn-info">Ajouter</a>
        </div>
    </div>
</div>
@endsection