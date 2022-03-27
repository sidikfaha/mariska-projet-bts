@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Gestion des demandes</div>

        <div class="card-body">
            <div class="py-3 d-flex justify-content-end">
                <div>
                <a role="button" href="{{ route('trans.add')  }}" class="btn btn-sm btn-success">
                    <i class="bi-plus"></i>
                    Ajouter
                </a>
                </div>
                
            </div>
            @include('partials.table_transaction')
        </div>
    </div>
@endsection
