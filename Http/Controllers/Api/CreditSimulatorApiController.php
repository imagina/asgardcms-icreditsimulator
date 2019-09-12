<?php

namespace Modules\Icreditsimulator\Http\Controllers\Api;

// Requests & Response
use Modules\Icreditsimulator\Http\Requests\CreditSimulatorRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Setting\Contracts\Setting;

// Base Api
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

class CreditSimulatorApiController extends BaseApiController
{
  private $setting;

  public function __construct(Setting $setting)
  {
    $this->setting = $setting;
  }

  /**
   * Get all data interest
   * @return Response
   */
  public function calculate($capital,$days)
  {
    try {
      $settings=[
        'amortization'=>$this->setting->get('icreditsimulator::amortization'),
        'usePlataform'=>$this->setting->get('icreditsimulator::use_plataform'),
        'iva'=>$this->setting->get('icreditsimulator::iva'),
        'warranty'=>$this->setting->get('icreditsimulator::warranty')
      ];
      $data=icreditsimulator__calculateTotalToPay($capital,$days,$settings);
    } catch (\Exception $e) {
      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
    }
    //Return response
    return response()->json($response ?? ["data" => $data], $status ?? 200);
  }
}
