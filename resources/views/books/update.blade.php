@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ajouter un membre</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ url('book/update/'.$books->id) }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="title" class="col-md-4 control-label">Titre</label>

                            <div class="col-md-6">
                                <input id="title" type="title" class="form-control" name="title" value="{{ $books->name }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="author" class="col-md-4 control-label">Auteur</label>

                            <div class="col-md-6">
                                <input id="author" type="author" class="form-control" name="author" value="{{ $books->author }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Ajouter
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection