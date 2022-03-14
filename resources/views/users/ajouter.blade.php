@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Ajouter un utilisateur</div>
        <div class="card-body">
            <form>
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
            </form>
        </div>
    </div>
@endsection
