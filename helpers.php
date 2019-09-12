<?php
use Modules\Icreditsimulator\Entities\StaticClasses\FinancialEntity;
use Modules\Icreditsimulator\Entities\StaticClasses\JobType;
use Modules\Icreditsimulator\Entities\StaticClasses\TypeAntiquity;
if (!function_exists('icreditsimulator__getFinancialEntity')) {

    function icreditsimulator__getFinancialEntity()
    {
        $entity = new FinancialEntity();
        return $entity;
    }
}
if (!function_exists('icreditsimulator__getJobType')) {

    function icreditsimulator__getJobType()
    {
        $entity = new JobType();
        return $entity;
    }
}
if (!function_exists('icreditsimulator__getTypeAntiquity')) {

    function icreditsimulator__getTypeAntiquity()
    {
        $entity = new TypeAntiquity();
        return $entity;
    }
}

if (!function_exists('icreditsimulator__calculateTotalToPay')) {

    function icreditsimulator__calculateTotalToPay($requestedAmount=0,$termInDays=1,$settings=null)
    {
      /*
        Structure to receive params:
        $requestedAmount=1500000;
        $termInDays=32;
        $settings=[
          'amortization'=>$this->setting->get('icreditsimulator::amortization'),
          'usePlataform'=>$this->setting->get('icreditsimulator::use_plataform'),
          'iva'=>$this->setting->get('icreditsimulator::iva'),
          'warranty'=>$this->setting->get('icreditsimulator::warranty')
        ];
      */
      if($settings==null){
        \Log::error("Error in icreditsimulator__calculateTotalToPay not received settings data");
        return 0;
      }
      if(is_array($settings))
        $settings=(object)$settings;
      $amortization = $settings->amortization;
      $usePlataform = $settings->usePlataform;
      $usePlataform = $usePlataform*$termInDays;
      $iva = $settings->iva;
      $iva=$usePlataform*0.19;//$usePlataform * 19% = iva
      $warranty = $settings->warranty;
      $warranty=$requestedAmount*0.12;//requestedAmount * 12%
      $nominalRate=0.242;//Nominal rate value, the percent (24,2) / 100
      $nPery=365;
      $i=$nominalRate/$nPery;
      $simpleInterest=(pow(1+$i,$nPery))-1;
      $interestRate=($simpleInterest*100)/$nPery;
      $interestRate=round($interestRate * 10000) / 10000;//Round to 4 decimals
      $interest=icreditsimulator__interestCalculation($requestedAmount,$termInDays,$interestRate);
      $totalToPay=$interest->totalInterest+$warranty+$usePlataform+$iva+$requestedAmount;
      $data=(object)[
        "amortization"=>$amortization,
        "usePlataform"=>$usePlataform,
        "iva"=>$iva,
        "warranty"=>$warranty,
        "nominalRate"=>$nominalRate,
        "nPery"=>$nPery,
        "i"=>$i,
        "simpeInterest"=>$simpleInterest,
        "interestRate"=>$interestRate,
        "interest"=>$interest,
        "totalToPay"=>$totalToPay
      ];
      return $data;
    }
}
if (!function_exists('icreditsimulator__interestCalculation')) {

    function icreditsimulator__interestCalculation($capital,$days,$interestRate)
    {
      $interest=0;
      $list=(object)[
        "totalInterest"=>$interest,
        "list"=>[]
      ];
      for($i=1;$i<=$days;$i++){
        $newInterest=(($capital+$interest)*$interestRate)/100;
        $list->list[]=[
          "day"=>$i,
          "initialCapital"=>$capital+$interest,
          "finalCapital"=>$capital+$interest+$newInterest,
          "accruedInterest"=>$interest+$newInterest,
          "interest"=>$newInterest
        ];
        $interest+=$newInterest;
        // echo "<br> Día ".$i." interest ".$interest."<br>";
      }
      $list->totalInterest=$interest;
      return $list;
    }
}

if (!function_exists('formatMoney')) {

    function formatMoney($value)
    {
        return number_format($value, 2,".", ",");

    }

}
