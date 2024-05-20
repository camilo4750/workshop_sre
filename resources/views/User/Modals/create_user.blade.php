<div class="modal fade bd-example-modal-lg" id="createUser" data-bs-backdrop="static" data-bs-keyboard="false"
     aria-labelledby="createUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserLabel">Crear Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="storeUser">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Primer Nombre"
                                       v-model="createUser.firstName" aria-label="firstName">
                                <span class="text-danger text-sm" v-if="fieldsStatus.firstName">@{{ fetchErrors?.firstName }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Segundo Nombre"
                                       v-model="createUser.secondName" aria-label="secondName">
                                <span class="text-danger text-sm" v-if="fieldsStatus.secondName">@{{ fetchErrors?.secondName }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Primer Apellido"
                                       v-model="createUser.firstSurname" aria-label="firstSurname">
                                <span class="text-danger text-sm" v-if="fieldsStatus.firstSurname">@{{ fetchErrors?.firstSurname }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Segundo apellido"
                                       v-model="createUser.secondSurname" aria-label="secondSurname">
                                <span class="text-danger text-sm" v-if="fieldsStatus.secondSurname">@{{ fetchErrors?.secondSurname }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Telefono"
                                       v-model="createUser.telephone" aria-label="Telephone">
                                <span class="text-danger text-sm" v-if="fieldsStatus.telephone">@{{ fetchErrors?.telephone }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <select name="typeUser" id="typeUser"  class="form-control"
                                        v-model="createUser.typeUser" aria-label="typeUser">
                                    <option value="" selected disabled>- Seleccionar Rol -</option>
                                    <option value="1">Administrador</option>
                                </select>
                                <span class="text-danger text-sm" v-if="fieldsStatus.typeUser">@{{ fetchErrors?.typeUser }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Correo"
                                       v-model="createUser.email" aria-label="email">
                                <span class="text-danger text-sm" v-if="fieldsStatus.email">@{{ fetchErrors?.email }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="password" class="form-control" placeholder="Contraseña"
                                       v-model="createUser.password" aria-label="password">
                                <span class="text-danger text-sm" v-if="fieldsStatus.password">@{{ fetchErrors?.password }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="password" class="form-control" placeholder="Contraseña"
                                       v-model="createUser.password_confirmation" aria-label="password">
                                <span class="text-danger text-sm" v-if="fieldsStatus.password_confirmation">@{{ fetchErrors?.password_confirmation }}</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <label for="isActive" class="mb-0">Usuario activo?</label>
                            <input type="checkbox" class="ml-2" name="isActive" id="isActive" v-model="createUser.isActive">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Crear Usuario</button>
                </div>
            </form>
        </div>
    </div>
</div>
