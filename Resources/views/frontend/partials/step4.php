<div class="row justify-content-center" v-if="step==4">

    <div class="col-12">
        <h2 class="h4 text-primary bg-light py-3 px-4 mb-5">
            Referencia Personal
        </h2>
    </div>

    <div class="col-md-10 pb-5">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        Nombre Completo
                    </label>
                    <input type="text" class="form-control" v-model="credit.personalReferenceFullName">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        Ciudad de Residencia
                    </label>
                    <input type="text" class="form-control" v-model="credit.personalReferenceCity">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        Teléfono de Residencia
                    </label>
                    <input type="text" class="form-control" v-model="credit.personalReferenceResidencePhone">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        Celular
                    </label>
                    <input type="text" class="form-control" v-model="credit.personalReferencePhone">
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-10 py-5 text-center">
        <p class="text-primary my-4">
            * Acepto de forma expresa e irrevicable, que Dynamic Capital S.A.S. consulte y reporte
            mi información a centrales de riesgo en las condiciones estipuladas en los
            Términos y Condiciones y Políticas de Privacidad.
        </p>
    </div>

    <div class="col-12 pb-5 text-center">
        <button type="button" @click="createCredit()" class="btn btn-primary text-white rounded-0" name="button">
            Finalizar
        </button>
    </div>

</div>
