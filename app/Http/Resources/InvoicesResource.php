<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoicesResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'uuid' => $this->id,
            'amount' => $this->amount,
            'issuance_date' => $this->issuance_date,
            'cnpj_sender' => $this->cnpj_sender,
            'name_sender' => $this->name_sender,
            'cnpj_carrier' => $this->cnpj_carrier,
            'name_carrier'=> $this->name_carrier
        ];
    }
}
