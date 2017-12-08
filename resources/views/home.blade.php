@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Accueil</div>

                <div class="panel-body">
                <p>Bienvenue sur l'interface de my_book_store. Mode d'emploi:</p>
                    <ul>
                        <li>Livres</li>
                            <ul>
                                <li>Liste tous les livres</li>
                                <li>Possibilité de modifier/ajouter/supprimer un livre</li>
                                <li>Affichage du nombre de livres disponible dans l'inventaire</li>
                            </ul>
                        <li>Clients</li>
                            <ul>
                                <li>Possibilité de modifier/ajouter/supprimer un client (save de l'historique)</li>
                                <li>Ajouter/rendre un livre via son profil</li>
                            </ul>
                        <li>Emprunts</li>
                            <ul>
                                <li>Liste des livres non rendus</li>
                                <li>Possibilité de supprimer les entrées depuis ce panel</li>
                            </ul>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
