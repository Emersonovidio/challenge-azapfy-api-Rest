<?php

namespace App\Models\Invoice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;



class Invoices extends Model
{

    use HasFactory, Notifiable;

    protected $table = 'invoices';

    protected $fillable = [
        'id',
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
