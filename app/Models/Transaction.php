<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;
    // Cette contante liste les differents statuts possible pour une transaction (demande)
    public const STATUTS = ['ACCEPTE','REJETE','ATTENTE'];
    public const TYPES = ['ENTREE','SORTIE'];
    protected $guarded = [];

    public function user (): BelongsTo
    { return $this->belongsTo(User::class, 'created_by'); }
}
