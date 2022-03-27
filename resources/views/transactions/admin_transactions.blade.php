@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Administration des demandes</div>

        <div class="card-body">
            @include('partials.table_transaction')
        </div>
    </div>
@endsection
