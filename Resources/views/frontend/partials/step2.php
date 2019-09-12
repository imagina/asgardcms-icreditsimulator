<div class="row justify-content-center" v-if="step==2">

    <div class="col-12">
        <h2 class="h4 text-primary bg-light py-3 px-4 mb-4">
            Información básica
        </h2>

        <p class="mb-5 text-center font-weight-bold">¿Ya posees una cuenta? Inicia sesión</p>
    </div>

    <div class="col-md-10">
        <div class="row justify-content-center align-items-end">
            <div class="col-md-5">
                <label>
                    Correo electrónico
                </label>
                <input type="text" class="form-control" v-model="email">
            </div>
            <div class="col-md-5">
                <label>
                    Contraseña
                </label>
                <input type="password" class="form-control" v-model="password">
            </div>
            <div class="col-md-2">
                <button @click="login" type="button" name="button" class="btn btn-success">Iniciar Sesión</button>
            </div>
        </div>
    </div>

    <div class="col-12 mt-5 mb-4 text-center">
        <p class="font-weight-bold">sino continúa llenando tus datos</p>
    </div>

    <div class="col-md-10 pb-5">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        <span class="text-primary">*</span>
                        Nombres
                    </label>
                    <input type="text" class="form-control" v-model="user.name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        <span class="text-primary">*</span>
                        Apellidos
                    </label>
                    <input type="text" class="form-control" v-model="user.lastName">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        <span class="text-primary">*</span>
                        Género
                    </label>
                    <select class="form-control" v-model="user.gender">
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        <span class="text-primary">*</span>
                        Tipo de Documento
                    </label>
                    <select class="form-control" v-model="user.typeDocument">
                        <option value="CC">Cédula de Ciudadanía</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        <span class="text-primary">*</span>
                        Número de Documento
                    </label>
                    <input type="text" class="form-control" v-model="user.identification">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        <span class="text-primary">*</span>
                        Fecha de nacimiento
                    </label>
                    <input type="date" class="form-control" id="dateBirthday" v-model="user.dateBirthday">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        <span class="text-primary">*</span>
                        Estado Civil
                    </label>
                    <select class="form-control" v-model="user.civilStatus">
                        <option value="">Seleccione su estado civil</option>
                        <option value="Soltero/a">Soltero/a</option>
                        <option value="Concubino/a">Concubino/a</option>
                        <option value="Casado/a">Casado/a</option>
                        <option value="Viudo/a">Viudo/a</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        <span class="text-primary">*</span>
                        Teléfono
                    </label>
                    <input type="text" class="form-control" v-model="user.phone">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        <span class="text-primary">*</span>
                        Correo electrónico
                    </label>
                    <input type="email" class="form-control" v-model="user.email">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        <span class="text-primary">*</span>
                        Confirmar correo electrónico
                    </label>
                    <input type="email" class="form-control" v-model="user.emailConfirm">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        <span class="text-primary">*</span>
                        Contraseña para cuenta de Dynamic Capital
                    </label>
                    <input type="password" class="form-control" v-model="user.password">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        <span class="text-primary">*</span>
                        Ciudad
                    </label>
                    <input type="text" class="form-control" v-model="user.city">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        <span class="text-primary">*</span>
                        Dirección de residencia
                    </label>
                    <input type="text" class="form-control" v-model="user.address">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        <span class="text-primary">*</span>
                        Tipo de vivienda
                    </label>
                    <select class="form-control" v-model="user.typeHousing">
                        <option value="Casa">Casa</option>
                        <option value="Apartamento">Apartamento</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        <span class="text-primary">*</span>
                        Número de hijos
                    </label>
                    <select class="form-control" v-model="user.numberChildrens">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        <span class="text-primary">*</span>
                        Personas a cargo
                    </label>
                    <select class="form-control" v-model="user.dependents">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        <span class="text-primary">*</span>
                        Nivel de estudios
                    </label>
                    <select class="form-control" v-model="user.levelStudy">
                        <option value="Primaria">Primaria</option>
                        <option value="Secundaria">Secundaria</option>
                        <option value="Universitaria">Universitaria</option>
                        <option value="Diplomado">Diplomado</option>
                        <option value="Postgrado">Postgrado</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        <span class="text-primary">*</span>
                        Estado de estudios
                    </label>
                    <select class="form-control" v-model="user.stateStudy">
                        <option value="En proceso">En proceso</option>
                        <option value="Culminado">Culminado</option>
                    </select>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-10 pb-5">
        <span class="text-primary">(*) Campos obligatorios</span>
    </div>
    <div class="col-12 pb-5 text-center">
        <button type="button" @click="validateStep2()" class="btn btn-primary text-white rounded-0" name="button">
            Registrarme
        </button>
    </div>


</div>
