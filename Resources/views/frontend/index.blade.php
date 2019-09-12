@extends('layouts.master')
@section('content')
{{--@include('partials.header')--}}

<div class="page" id="content_index_credit_simulator">

  <section class="general-block1 service-index p-5" data-blocksrc="general.block1">

    <div class="container pt-5 pb-5">

      <div class="row">
        <h1 class="text-white">SIMULADOR DE CRÉDITO</h1>
      </div>
      <div class="mt-3" style="width: 80px;height: 4px; background-color:white;"></div>
    </div>

  </section>

  <div class="container py-5">


    <div class="row" v-if="step==1">

      <div class="col-12 text-left mb-4 ">
        <span class="h4 text-primary">
          Resultado del simulador
        </span>
        <p>A continuación le presentamos el detalle de tu crédito</p>
      </div>

      <div class="col-12 text-center ">
        <div class="table-responsive">
          <table class="table">
            <thead class="thead-light bg-light text-primary font-weight-bold">
              <tr>
                <td>DÍAS</td>
                <td>CAPITAL INICIAL</td>
                <td>INTERÉS</td>
                <td>CAPITAL FINAL</td>
                <td>INTERESES ACUMULADOS</td>
              </tr>
            </thead>
            <tbody>
              <tr v-for="interest in simulator.listInterest">
                <td>@{{interest.day}}</td>
                <td>@{{interest.initialCapital | numberFormat}}</td>
                <td>@{{interest.interest | numberFormat}}</td>
                <td>@{{interest.finalCapital | numberFormat}}</td>
                <th>@{{interest.accruedInterest | numberFormat}}</th>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-12 mt-3 text-left">
        <button class="btn btn-primary rounded-0" @click="step++" type="button" name="button">
          Solicitar crédito
        </button>
      </div>

    </div>

    @include('icreditsimulator::frontend.partials.step2')
    @include('icreditsimulator::frontend.partials.step3')
    @include('icreditsimulator::frontend.partials.step4')
  </div>

</div>

@include('partials.banners-contact')

@endsection

@section('scripts')
@parent
<script type="text/javascript">
/* =========== VUE ========== */
const vue_index_credit_simulator = new Vue({
  el: '#content_index_credit_simulator',
  data: {
    step:1,
    simulator:{
      capital:0,
      interest:0,
      interestRate:0,
      listInterest:[],
      warranty:0,
      usePlataform:0,
      iva:0,
      totalPay:0
    },
    email:"",
    password:"",
    user:{
      name:"",
      lastName:"",
      // fullName:"",
      gender:"Masculino",
      typeDocument:"CC",
      identification:"",
      dateBirthday:"",
      civilStatus:"",
      email:"{{isset($_REQUEST['email']) ? $_REQUEST['email'] : ''}}",
      emailConfirm:"",
      city:"",
      address:"",
      password:"",
      phone:"",
      typeHousing:"Casa",
      numberChildrens:"0",
      dependents:"0",
      levelStudy:"Primaria",
      stateStudy:"Culminado",
    },
    laborInformation:{
      financialEntity:"",
      accountNumber:"",
      seniorityEmployee:"",
      typeAntiquity:"0",
      jobType:"",
      totalMonthlyIncome:"",
      totalMonthlyExpenses:"",
      companyWork:"",
    },
    credit:{
      creditReason:"",
      personalReferenceFullName:"",
      personalReferenceCity:"",
      personalReferenceResidencePhone:"",
      personalReferencePhone:"",
    },
    days: "{{$days}}",
    capital: "{{$capital}}",
    preloader: true,
    user_id:null
  },
  mounted: function () {
    this.calculateCredit();
    var now = new Date();
    var month = (now.getMonth() + 1);
    var day = now.getDate();
    if (month < 10)
    month = "0" + month;
    if (day < 10)
    day = "0" + day;
    var today = now.getFullYear() + '-' + month + '-' + day;
    $('#dateBirthday').val(today);
    this.user.dateBirthday=today;
  },
  filters: {
    numberFormat: function (value) {
      return parseFloat(value).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
    }
  },
  methods: {
    randomPassword(){

      return "123456";
    },
    validateStep3(){
      if(this.laborInformation.financialEntity==""){
        toastr.error("Debes seleccionar una entidad financiera");
      }else if(this.laborInformation.accountNumber==""){
        toastr.error("Debes ingresar tu número de tu cuenta");
      }else if(this.laborInformation.totalMonthlyIncome==""){
        toastr.error("Debes ingresar el total de ingresos mensuales");
      }else if(this.laborInformation.totalMonthlyExpenses==""){
        toastr.error("Debes ingresar el total de egresos mensuales");
      }else if(this.laborInformation.jobType==""){
        toastr.error("Debes ingresar el tipo de empleo");
      }else if(this.laborInformation.seniorityEmployee==""){
        toastr.error("Debes seleccionar tu antiguedad como empleado o independiente");
      }else if(this.laborInformation.companyWork==""){
        toastr.error("Debes específicar la empresa donde laboras");
      }else if(this.credit.creditReason==""){
        toastr.error("Debes específicar la razón de solicitud de crédito");
      }else{
        this.step++;
      }
    },
    validateStep2(){
      if(this.user_id){
        this.step++;
      }else{
        if(this.user.name==""){
          toastr.error("Debes ingresar tus nombres");
        }else if(this.user.lastName==""){
          toastr.error("Debes ingresar tus apellidos");
        }else if(this.user.identification==""){
          toastr.error("Debes ingresar tu número de identificación");
        }else if(this.user.dateBirthday==""){
          toastr.error("Debes ingresar tu fecha de nacimiento");
        }else if(this.user.email==""){
          toastr.error("Debes ingresar tu correo electrónico");
        }else if(this.user.emailConfirm==""){
          toastr.error("Debes ingresar tu correo electrónico de confirmación");
        }else if(this.user.email!=this.user.emailConfirm){
          toastr.error("El correo electrónico de confirmación no coincide");
        }else if(this.user.password==""){
          toastr.error("Debes ingresar una contraseña");
        }else if(this.user.city==""){
          toastr.error("Debes ingresar la ciudad donde vives");
        }else if(this.user.address==""){
          toastr.error("Debes ingresar tu dirección");
        }else if(this.user.phone==""){
          toastr.error("Debes ingresar tu número de celular");
        }else{
          //var password=this.randomPassword();
          axios.post("{{url('/')}}"+"/api/profile/v1/users/register", {
            attributes:{
              first_name:this.user.name,
              last_name:this.user.lastName,
              email:this.user.email,
              password:this.user.password,
              password_confirmation:this.user.password,
              fields:[
                {
                  name:"gender",
                  value:this.user.gender
                },
                {
                  name:"typeDocument",
                  value:this.user.typeDocument
                },
                {
                  name:"identification",
                  value:this.user.identification
                },
                {
                  name:"dateBirthday",
                  value:this.user.dateBirthday
                },
                {
                  name:"civilStatus",
                  value:this.user.civilStatus
                },
                {
                  name:"city",
                  value:this.user.city
                },
                {
                  name:"address",
                  value:this.user.address
                },
                {
                  name:"phone",
                  value:this.user.phone
                },
                {
                  name:"typeHousing",
                  value:this.user.typeHousing
                },
                {
                  name:"numberChildrens",
                  value:this.user.numberChildrens
                },
                {
                  name:"dependents",
                  value:this.user.dependents
                },
                {
                  name:"levelStudy",
                  value:this.user.levelStudy
                },
                {
                  name:"stateStudy",
                  value:this.user.stateStudy
                }
              ]
            }}).then(response=> {
              this.user_id=response.data.user_id;
              toastr.success('Ahora puedes iniciar sesión para continuar con la solicitud del crédito')
              this.user.name="";
              this.user.lastName="";
              this.email=this.user.email;
              this.user.email="";
              this.user.password="";
              this.user.stateStudy="";
              this.user.levelStudy="";
              this.user.typeHousing="";
              this.user.phone="";
              this.user.address="";
              this.user.city="";
              this.user.civilStatus="";
              this.user.identification="";
              this.user.gender="";
            }).catch(function (error) {
              var errors=JSON.parse(error.response.data.errors);
              if("email" in errors){
                toastr.error(errors.email[0]);
              }
            });
          }
        }

      },
      createCredit(){
        if(this.credit.personalReferenceFullName==""){
          toastr.error("Debe escribir el nombre completo de su referencia personal");
        }else if(this.credit.personalReferenceCity==""){
          toastr.error("Debe escribir la ciudad donde vive su referencia personal");
        }else if(this.credit.personalReferenceResidencePhone==""){
          toastr.error("Debe escribir el teléfono residencial de su referencia personal");
        }else if(this.credit.personalReferencePhone==""){
          toastr.error("Debe escribir el número celular de su referencia personal");
        }else{
          axios.post("{{route('api.icreditsimulator.client.credits.store')}}", {
            attributes:{
              credit_reason:this.credit.creditReason,
              personal_reference_full_name:this.credit.personalReferenceFullName,
              personal_reference_city:this.credit.personalReferenceCity,
              personal_reference_residence_phone:this.credit.personalReferenceResidencePhone,
              personal_reference_phone:this.credit.personalReferencePhone,
              capital:this.capital,
              term_days:this.days,
              term_days:this.days,
              interest_rate:this.simulator.interestRate,
              warranty:this.simulator.warranty,
              total_interest:this.simulator.interest,
              cost_use_plataform:this.simulator.usePlataform,
              iva:this.simulator.iva,
              total_to_pay:this.simulator.totalPay,
              financial_entity:this.laborInformation.financialEntity,
              account_number:this.laborInformation.accountNumber,
              seniority_employee:this.laborInformation.seniorityEmployee,
              type_antiquity:this.laborInformation.typeAntiquity,
              company_work:this.laborInformation.companyWork,
              job_type:this.laborInformation.jobType,
              total_monthly_income:this.laborInformation.totalMonthlyIncome,
              total_monthly_expenses:this.laborInformation.totalMonthlyExpenses,
              client_id:this.user_id
            }
          }).then(response=> {
            toastr.success("Crédito registrado exitosamente.");
            window.setTimeout(function(){location.reload()},4000)
          })
          .catch(function (error) {
            console.log(error);
          });
        }

      },
      login(){
        axios.post("{{url('/')}}"+"/api/profile/v1/auth/login", {
          username:this.email,
          password:this.password,
        }).then(response=> {
          this.user_id=response.data.data.userData.id;
          this.step++;
        }).catch(function (error) {
          var errors=error.response.data.errors;
          if(errors=="User or Password invalid"){
            toastr.error("Correo electrónico o contraseña inválida");
          }
        });
      },
      calculateCredit(){
        axios({
          method: 'Get',
          responseType: 'json',
          url: "{{ url('/') }}"+"/api/icreditsimulator/calculate/"+this.capital+"/"+this.days,
          params: {

          }
        }).then(response=> {
          this.simulator.capital=this.capital;
          this.simulator.interest=response.data.data.interest.totalInterest;
          this.simulator.interestRate=response.data.data.interestRate;
          this.simulator.listInterest=response.data.data.interest.list;
          this.simulator.warranty=response.data.data.warranty;
          this.simulator.iva=response.data.data.iva;
          this.simulator.usePlataform=response.data.data.usePlataform;
          this.simulator.totalPay=response.data.data.totalToPay;
          var includeWarranty="{{isset($_REQUEST['warranty']) ? $_REQUEST['warranty'] : true}}";
          var includeUsePlataform="{{isset($_REQUEST['usePlataform']) ? $_REQUEST['usePlataform'] : true}}";
          if(includeWarranty=="false"){
            this.simulator.totalPay=this.simulator.totalPay-this.simulator.warranty;
            this.simulator.warranty=0;
          }
          if(includeUsePlataform=="false"){
            this.simulator.totalPay=this.simulator.totalPay-this.simulator.usePlataform;
            this.simulator.usePlataform=0;
          }





        });
      }//calculateCredit()

    }
  });
</script>
@endsection
