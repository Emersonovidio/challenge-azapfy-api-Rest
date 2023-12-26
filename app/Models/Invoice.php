<?php

namespace App\Models\Invoice;

use App\Traits\Actived\ActiveTrait;
use Illuminate\Database\Eloquent\Model;
use YourAppRocks\EloquentUuid\Traits\HasUuid;
use App\Models\User\User;

use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableInterface;

class Invoices extends Model
{

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
