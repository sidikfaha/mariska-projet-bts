@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Ajouter un utilisateur</div>
        <div class="card-body">
            @if(session('created'))
                <div class="py-3">
                    <div class="alert alert-success">L'utilisateur a bien été créé !</div>
                </div>
            @endif
            <form method="POST" action="{{ route('users.create') }}">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Adresse email</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" id="role" class="form-select">
                        <option value="ADMIN">Administrateur</option>
                        <option value="COMPTABLE">Comptable</option>
                        <option value="RH">Ressource humaine</option>
                        <option value="EMPLOYE">Employé</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group d-flex justify-content-end">
                    <button class="btn btn-primary btn-lg">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
@endsection
