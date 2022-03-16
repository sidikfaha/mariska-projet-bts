@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Nouvelle demande</div>
        <div class="card-body">
            @if(session('created'))
                <div class="py-3">
                    <div class="alert alert-success">La demande a été soumise!</div>
                </div>
            @endif
            <form method="POST" action="{{ route('trans.create') }}">
                @csrf

                <div class="form-group">
                    <label for="libelle" class="form-label">Libelle</label>
                    <input type="text" class="form-control" id="libelle" name="libelle">
                </div>
                <div class="form-group">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="type" class="form-label">Type de transaction</label>
                    <select name="type" id="type" class="form-select">
                        <option value="ENTREE">Entrée</option>
                        <option value="SORTIE">Sortie</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="montant" class="form-label">Montant</label>
                    <input min="500" type="number" class="form-control" id="montant" name="montant">
                </div>
                <div class="form-group d-flex justify-content-end">
                    <button class="btn btn-primary btn-lg">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
@endsection
