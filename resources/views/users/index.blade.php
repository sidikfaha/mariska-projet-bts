@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Gestion des utilisateurs</div>

        <div class="card-body">
            <div class="py-3 d-flex justify-content-end">
                <a role="button" href="{{ route('users.add')  }}" class="btn btn-success btn-sm">
                    <i class="bi-plus"></i>
                    Ajouter
                </a>
            </div>
            <table class="table table-striped table-responsive">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>email</th>
                    <th>Role</th>
                </tr>
                </thead>
                <tbody>
                @if(count($users) === 0)
                    <tr>
                        <td colspan="4">
                            <div class="text-center text-muted">
                                Aucun utilisateur pour le moment
                            </div>
                        </td>
                    </tr>
                @else
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id  }}</td>
                            <td>{{ $user->name  }}</td>
                            <td>{{ $user->email  }}</td>
                            <td>{{ $user->role  }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
