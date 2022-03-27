<table class="table table-striped table-responsive">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>libelle</th>
                    <th>Montant</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Status</th>
                    @if($is_admin)
                    <th>Actions</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @if(count($trans) === 0)
                    <tr>
                        <td colspan="{{$is_admin ? '7' : '6'}}">
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
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->toDateTimeString()   }}</td>
                            <td>{{ $item->type  }}</td>
                            <td>
                                @switch($item->statut)

                                   @case('ATTENTE')
                                   <span class="badge bg-warning">En attende </span>
                                    @break
                                  @case('ACCEPTE')
                                   <span class="badge bg-success">Acceptée </span>
                                    @break
                                @case('REJETE')
                                   <span class="badge bg-danger">Rejettée </span>
                                    @break
                                @endswitch
                            
                            </td>
                            @if ($is_admin )
                              <td>
                                @if($item->statut === 'ATTENTE')
                                <form method="POST" action="{{ route('trans.update') }}">
                                 @csrf

                                 <input type="hidden" name="transaction_id" value="{{$item->id}}">
                                 <input type="hidden" name="status" value="ACCEPTE">

                                <button class="btn btn-sm btn-success" type="submit">Valider</button>
                                </form>

                                <form method="POST" action="{{ route('trans.update') }}">
                                 @csrf

                                 <input type="hidden" name="transaction_id" value="{{$item->id}}">
                                 <input type="hidden" name="status" value="REJETE">

                                <button class="btn btn-sm btn-danger" type="submit">Rejetter</button>
                                </form>
                                @endif
                              </td>
                            @endif
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>