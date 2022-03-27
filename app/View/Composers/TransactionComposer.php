<?php
 
namespace App\View\Composers;

use App\Models\Transaction;
use App\Repositories\UserRepository;
use Illuminate\View\View;
 
class TransactionComposer
{

 
    /**
     * Create a new profile composer.
     *
     * @return void
     */
    public function __construct()
    {
        // Dependencies are automatically resolved by the service container...
    }
 
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('countTransactions', Transaction::where('statut', 'ATTENTE')->count());
    }
}