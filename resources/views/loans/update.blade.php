@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ajouter un membre</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ url('customer/update/'.$customers->id) }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nom</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control" name="name" value="{{ $customers->name }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="firstname" class="col-md-4 control-label">Prénom</label>

                            <div class="col-md-6">
                                <input id="firstname" type="firstname" class="form-control" name="firstname" value="{{ $customers->firstname }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mail" class="col-md-4 control-label">E-mail</label>

                            <div class="col-md-6">
                                <input id="mail" type="mail" class="form-control" name="mail" value="{{ $customers->mail }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Éditer
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