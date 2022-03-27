<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{

    public function create(): Factory|View|Application
    {
        return view('transactions.ajouter');
    }

    public function store(Request $request): RedirectResponse
    {
        $attrs = $request->except('_token');
        $attrs['created_by'] = $request->user()->id;

        $user = Transaction::query()->create($attrs);
        $user->save();
        Session::flash('created');
        return back();
    }

    public function update(Request $request): RedirectResponse
    {

        $rules = [
            'status' => 'required|in:ACCEPTE,REJETE',
            'transaction_id' => 'required|exists:transactions,id'
        ];

        $this->validate($request, $rules);

        $status = $request->status;

        $transaction = Transaction::find($request->transaction_id);

        $transaction->update([
            'statut' => $status
        ]);

        Session::flash('updated');
        return back();
    
    }
}
