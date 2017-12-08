@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Choisir le livre</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action='{{ url("customer/profile/$customers->id/loan") }}'>
                        {{ csrf_field() }}

                        <label>Choisir le livre:</label>
                        <select name="title">
                            <option value="null">-- Choisir le livre --</option>
                            @foreach($books as $value)
                                @if($value->inventory > 0)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endif
                            @endforeach
                        </select>
                         <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection