<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User;

class Invoice extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'invoices';

    protected $fillable = [
        'id',
        'user_id',
        'amount',
        'issuance_date',
        'cnpj_sender',
        'name_sender',
        'cnpj_carrier',
        'name_carrier'
    ];

    protected $casts = [
        'cnpj_sender',
        'cnpj_carrier',
    ];

    /**
     * Relationships
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
