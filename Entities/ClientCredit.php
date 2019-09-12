<?php

namespace Modules\Icreditsimulator\Entities;

use Illuminate\Database\Eloquent\Model;

class ClientCredit extends Model
{

    protected $table = 'icreditsimulator__clientcredits';
    protected $fillable = [
      "credit_reason",//En que usara el credito,
      "personal_reference_full_name",
      "personal_reference_city",
      "personal_reference_residence_phone",
      "personal_reference_phone",
      "capital",//capital
      "term_days",//plazo en dias
      "interest_rate",//Tasa  de interes
      "warranty",//garantia
      "total_interest",//total intereses
      "cost_use_plataform",//Costo por uso de plataforma
      "iva",//iva
      "total_to_pay",//total a pagar

      "financial_entity",
      "account_number",
      "total_monthly_income",//total ingresos mensuales
      "total_monthly_expenses",//total egresos mensuales
      "job_type",
      "seniority_employee",//Antiguedad como empleado
      "type_antiquity",//Tipo de antiguedad Años o meses (Year-Months)
      "company_work",//Empresa donde trabaja

      "client_id"
    ];

    public function user()
    {
      return $this->belongsTo("Modules\User\Entities\Sentinel\User",'client_id');
    }
}
