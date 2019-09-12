<div class="box-body row">
  <div class="col-md-12 text-center">
    <h2>Información del crédito</h2>
  </div>

  <div class="col-md-12 text-center">
    <hr>
    <h3>Datos Personales</h3>
  </div>

  <div class="col-md-3">
    <label>Nombre completo</label>
    <input class="form-control" type="text" readonly value="{{$user->first_name}} {{$user->last_name}}">
  </div>

  <div class="col-md-3">
    <label>Correo electrónico</label>
    <input class="form-control" type="text" readonly value="{{$user->email}}">
  </div>

  <div class="col-md-3">
    <label>Sexo</label>
    <input class="form-control" type="text" readonly value="{{$user->gender}}">
  </div>

  <div class="col-md-3">
    <label>Documento de identidad</label>
    <input class="form-control" type="text" readonly value="{{$user->typeDocument}} {{$user->identification}}">
  </div>

  <div class="col-md-3">
    <label>Fecha de nacimiento</label>
    <input class="form-control" type="text" readonly value="{{$user->dateBirthday}}">
  </div>

  <div class="col-md-3">
    <label>Estado civil</label>
    <input class="form-control" type="text" readonly value="{{$user->civilStatus}}">
  </div>

  <div class="col-md-3">
    <label>Celular</label>
    <input class="form-control" type="text" readonly value="{{$user->phone}}">
  </div>

  <div class="col-md-3">
    <label>Dirección</label>
    <input class="form-control" type="text" readonly value="{{$user->address}}">
  </div>

  <div class="col-md-3">
    <label>Ciudad</label>
    <input class="form-control" type="text" readonly value="{{$user->city}}">
  </div>

  <div class="col-md-3">
    <label>Tipo de casa</label>
    <input class="form-control" type="text" readonly value="{{$user->typeHousing}}">
  </div>

  <div class="col-md-3">
    <label>Número de hijos</label>
    <input class="form-control" type="text" readonly value="{{$user->numberChildrens}}">
  </div>

  <div class="col-md-3">
    <label>Personas a cargo</label>
    <input class="form-control" type="text" readonly value="{{$user->dependents}}">
  </div>

  <div class="col-md-3">
    <label>Nivel de estudio</label>
    <input class="form-control" type="text" readonly value="{{$user->levelStudy}}">
  </div>

  <div class="col-md-3">
    <label>Estado de estudio</label>
    <input class="form-control" type="text" readonly value="{{$user->stateStudy}}">
  </div>

  <div class="col-md-12 text-center">
    <hr>
    <h3>Datos laborales</h3>
  </div>

  <div class="col-md-3">
    <label>Empresa donde trabaja</label>
    <input class="form-control" type="text" readonly value="{{$clientcredit->company_work}}">
  </div>

  <div class="col-md-3">
    <label>Entidad Financiera</label>
    <input class="form-control" type="text" readonly value="{{icreditsimulator__getFinancialEntity()->get($clientcredit->financial_entity)}}">
  </div>

  <div class="col-md-3">
    <label>Tipo de trabajo</label>
    <input class="form-control" type="text" readonly value="{{icreditsimulator__getJobType()->get($clientcredit->job_type)}}">
  </div>

  <div class="col-md-3">
    <label>Antiguedad</label>
    <input class="form-control" type="text" readonly value="{{$clientcredit->seniority_employee}} {{icreditsimulator__getTypeAntiquity()->get($clientcredit->type_antiquity)}}">
  </div>

  <div class="col-md-3">
    <label>Total de ingresos mensuales</label>
    <input class="form-control" type="text" readonly value="{{$clientcredit->total_monthly_income}}">
  </div>

  <div class="col-md-3">
    <label>Total de egresos mensuales</label>
    <input class="form-control" type="text" readonly value="{{$clientcredit->total_monthly_expenses}}">
  </div>


  <div class="col-md-12 text-center">
    <hr>
    <h3>Referencia personal</h3>
  </div>

  <div class="col-md-3">
    <label>Nombre completo</label>
    <input class="form-control" type="text" readonly value="{{$clientcredit->personal_reference_full_name}}">
  </div>

  <div class="col-md-3">
    <label>Ciudad</label>
    <input class="form-control" type="text" readonly value="{{$clientcredit->personal_reference_city}}">
  </div>

  <div class="col-md-3">
    <label>Teléfono residencial</label>
    <input class="form-control" type="text" readonly value="{{$clientcredit->personal_reference_residence_phone}}">
  </div>

  <div class="col-md-3">
    <label>Celular</label>
    <input class="form-control" type="text" readonly value="{{$clientcredit->personal_reference_phone}}">
  </div>

  <div class="col-md-12 text-center">
    <hr>
    <h3>Datos del crédito</h3>
  </div>

  <div class="col-md-6">
    <label>Razón del crédito</label>
    <textarea name="name" disabled class="form-control" style="max-width:100%;height:110px;" rows="3" cols="30">
      {{$clientcredit->credit_reason}}
    </textarea>
  </div>

  <div class="col-md-6">
    <label>Número de cuenta donde desea el depósito</label>
    <input class="form-control" type="text" readonly value="{{$clientcredit->account_number}}">
  </div>

  <div class="col-md-12 table-responsive text-center">
    <br>
    <table class="table table-bordered table-shape">
      <thead>
        <tr>
          <td>
            <strong>
            Capital
          </strong>
          </td>
          <td>
            <strong>
            Plazo de Días
          </strong>
          </td>
          <td>
            <strong>
            Garantía
          </strong>
          </td>
          <td>
            <strong>
            Total intereses
          </strong>
          </td>
          <td>
            <strong>
            Costo por uso de plataforma
          </strong>
          </td>
          <td>
            <strong>
            IVA
          </strong>
          </td>
          <td>
            <strong>
            Total a pagar
          </strong>
          </td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{formatMoney($clientcredit->capital)}}</td>
          <td>{{$clientcredit->term_days}}</td>
          <td>{{formatMoney($clientcredit->warranty)}}</td>
          <td>{{formatMoney($clientcredit->total_interest)}}</td>
          <td>{{formatMoney($clientcredit->cost_use_plataform)}}</td>
          <td>{{formatMoney($clientcredit->iva)}}</td>
          <td>{{formatMoney($clientcredit->total_to_pay)}}</td>
        </tr>
      </tbody>
    </table>
  </div>




</div>
