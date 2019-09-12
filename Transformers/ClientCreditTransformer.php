<?php

namespace Modules\Icreditsimulator\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ClientCreditTransformer extends Resource
{
    public function toArray($request)
    {

        $data = [
          'id' => $this->id,
          'totalToPay' => $this->when($this->total_to_pay, $this->total_to_pay),
          'iva' => $this->when($this->iva, $this->iva),
          'creditReason' => $this->when($this->credit_reason, $this->credit_reason),
          'capital' => $this->when($this->capital, $this->capital),
          'dependents' => $this->when($this->dependents, $this->dependents),
          'createdAt' => $this->when($this->created_at, $this->created_at),
          'updatedAt' => $this->when($this->updated_at, $this->updated_at),
        ];

        return $data;
    }
}
