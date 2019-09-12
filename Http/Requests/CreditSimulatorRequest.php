<?php

namespace Modules\Icreditsimulator\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreditSimulatorRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
          "capital"=>'required',
          "days"=>'required',
        ];
    }

    public function translationRules()
    {
        return [];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [];
    }

    public function translationMessages()
    {
        return [];
    }
}
