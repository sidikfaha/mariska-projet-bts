@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Gestion des demandes</div>

        <div class="card-body">
            <div class="py-3 d-flex justify-content-end">
                <a role="button" href="{{ route('trans.add')  }}" class="btn btn-success btn-lg">
                    <i class="bi-plus"></i>
                    Ajouter
                </a>
            </div>
            <table class="table table-striped table-responsive">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>libelle</th>
                    <th>Montant</th>
                    <th>Type</th>
                </tr>
                </thead>
                <tbody>
                @if(count($trans) === 0)
                    <tr>
                        <td colspan="4">
                            <div class="text-center">
                                <div class="alert alert-info">Aucune demande pour le moment.</div>
                            </div>
                        </td>
                    </tr>
                @else
                    @foreach($trans as $item)
                        <tr>
                            <td>{{ $item->id  }}</td>
                            <td>{{ $item->libelle  }}</td>
                            <td>{{ $item->montant  }}</td>
                            <td>{{ $item->type  }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
