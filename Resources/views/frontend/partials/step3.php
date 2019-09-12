<div class="row justify-content-center" v-if="step==3">

    <div class="col-12">
        <h2 class="h4 text-primary bg-light py-3 px-4 mb-5">
            Información Financiera y Laboral
        </h2>
    </div>

    <div class="col-md-10 pb-5">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        Entidad Financiera
                    </label>
                    <select class="form-control" v-model="laborInformation.financialEntity">
                        <option value="">Seleccione una entidad financiera</option>
                        <option value="0">Comercial</option>
                        <option value="1">De Inversión</option>
                        <option value="2">Corporativo</option>
                        <option value="3">Hipotecario</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        Número de cuenta
                    </label>
                    <input type="text" class="form-control" v-model="laborInformation.accountNumber">
                    <small class="form-text text-success">(Cuenta propia a depositar el dinero)</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        Total de ingresos mensuales
                    </label>
                    <input type="number" style="text-align:center;" class="form-control" v-model="laborInformation.totalMonthlyIncome" step="0.01" min="1">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        Total de egresos mensuales
                    </label>
                    <input type="number" style="text-align:center;" class="form-control" v-model="laborInformation.totalMonthlyExpenses" step="0.01" min="1">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        Tipo de empleo
                    </label>
                    <select class="form-control" v-model="laborInformation.jobType">
                        <option value="">Seleccione un tipo de empleo</option>
                        <option value="0">Formal Asalariado</option>
                        <option value="1">Informal</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        Antiguedad como empleado o independiente
                    </label>
                    <select class="form-control" v-model="laborInformation.seniorityEmployee">
                        <option value="">Seleccione antiguedad</option>
                        <option value="1">1</option>
                    </select>

                    <div class="float-right mt-2">

                        <div class="custom-control custom-checkbox d-inline-block pr-3">
                            <input type="radio" id="years" name="typeAntiquity" value="0" v-model="laborInformation.typeAntiquity" class="custom-control-input">
                            <label class="custom-control-label" for="years">Años</label>
                        </div>
                        <div class="custom-control custom-checkbox d-inline-block">
                            <input type="radio" id="months" name="typeAntiquity" value="1" v-model="laborInformation.typeAntiquity" class="custom-control-input">
                            <label class="custom-control-label" for="months">Meses</label>
                        </div>

                    </div>


                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        Empresa donde labora
                    </label>
                    <input type="text" class="form-control" v-model="laborInformation.companyWork">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label>
                        ¿En que usará el crédito?
                    </label>
                    <input type="text" class="form-control" v-model="credit.creditReason">
                </div>
            </div>
        </div>
    </div>


    <div class="col-12 pb-5 text-center">
        <button type="button" @click="validateStep3()" class="btn btn-primary text-white rounded-0" name="button">
            Continuar
        </button>
    </div>

</div>
