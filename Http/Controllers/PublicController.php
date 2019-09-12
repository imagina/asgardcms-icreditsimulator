<?php

namespace Modules\Icreditsimulator\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Core\Http\Controllers\BasePublicController;
use DB;
use Modules\Setting\Contracts\Setting;

class PublicController extends BasePublicController
{
  private $setting;
  public function __construct(Setting $setting)
  {
    parent::__construct();
    $this->setting = $setting;
  }

  public function index($capital,$days){
    if($capital<=0)
    abort(404);
    if($days<=0)
    abort(404);
    $settings=[
      'amortization'=>$this->setting->get('icreditsimulator::amortization'),
      'usePlataform'=>$this->setting->get('icreditsimulator::use_plataform'),
      'iva'=>$this->setting->get('icreditsimulator::iva'),
      'warranty'=>$this->setting->get('icreditsimulator::warranty')
    ];
    $data=icreditsimulator__calculateTotalToPay($capital,$days,$settings);
    $user=\Auth::user();
    return view("icreditsimulator::frontend.index",["user"=>$user,"capital"=>$capital,"days"=>$days,"data"=>$data]);
  }//

  public function test(){
    //Recibe $requestedAmount y $termInDays
    $requestedAmount=1500000;//Capital - monto solicitado
    $termInDays=32;//Plazo en días
    $settings=[
      'amortization'=>$this->setting->get('icreditsimulator::amortization'),
      'usePlataform'=>$this->setting->get('icreditsimulator::use_plataform'),
      'iva'=>$this->setting->get('icreditsimulator::iva'),
      'warranty'=>$this->setting->get('icreditsimulator::warranty')
    ];
    $data=icreditsimulator__calculateTotalToPay($requestedAmount,$termInDays,$settings);
    dd($data);

  }

  public function calculateInterest($capital=0,$days=1){
    $settings=[
      'amortization'=>$this->setting->get('icreditsimulator::amortization'),
      'usePlataform'=>$this->setting->get('icreditsimulator::use_plataform'),
      'iva'=>$this->setting->get('icreditsimulator::iva'),
      'warranty'=>$this->setting->get('icreditsimulator::warranty')
    ];
    $data=icreditsimulator__calculateTotalToPay($capital,$days,$settings);
    return view("icreditsimulator::frontend.");
    dd($data);
  }

}
