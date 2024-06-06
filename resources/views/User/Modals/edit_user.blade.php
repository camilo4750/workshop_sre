<div class="modal fade bd-example-modal-lg" id="editUserModal" data-bs-backdrop="static" data-bs-keyboard="false"
     aria-labelledby="editUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserLabel">Editar Usuario: @{{ editUser?.firstName + ' ' +
                    editUser?.secondName }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="updateUser">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" name="editFirstName" id="editFirstName"
                                       class="form-control" placeholder="Primer Nombre"
                                       v-model="editUser.firstName" aria-label="editFirstName">
                                <span class="text-danger text-sm" v-if="fieldsStatusEdit.firstName">
                                    @{{ fetchErrors?.firstName }}
                                </span>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="editSecondName" id="editSecondName"
                                       class="form-control" placeholder="Segundo Nombre"
                                       v-model="editUser.secondName" aria-label="editSecondName">
                                <span class="text-danger text-sm" v-if="fieldsStatusEdit.secondName">
                                    @{{ fetchErrors?.secondName }}
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" name="editFirstSurname" id="editFirstSurname"
                                       class="form-control" placeholder="Primer Apellido"
                                       v-model="editUser.firstSurname" aria-label="editFirstSurname">
                                <span class="text-danger text-sm" v-if="fieldsStatusEdit.firstSurname">
                                    @{{ fetchErrors?.firstSurname }}
                                </span>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="editSecondSurname" id="editSecondSurname"
                                       class="form-control" placeholder="Segundo apellido"
                                       v-model="editUser.secondSurname" aria-label="editSecondSurname">
                                <span class="text-danger text-sm" v-if="fieldsStatusEdit.secondSurname">
                                    @{{ fetchErrors?.secondSurname }}
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" name="editTelephone" id="editTelephone"
                                       class="form-control" placeholder="Telefono"
                                       v-model="editUser.telephone" aria-label="editTelephone">
                                <span class="text-danger text-sm" v-if="fieldsStatusEdit.telephone">
                                    @{{ fetchErrors?.telephone }}
                                </span>
                            </div>
                            <div class="form-group col-md-6">
                                <select name="editTypeUser" id="editTypeUser" class="form-control"
                                        v-model="editUser.typeUser" aria-label="editTypeUser">
                                    <option value="" selected disabled>- Seleccionar Rol -</option>
                                    <option value="1">Administrador</option>
                                </select>
                                <span class="text-danger text-sm" v-if="fieldsStatusEdit.typeUser">
                                    @{{ fetchErrors?.typeUser }}
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" name="editEmail" id="editEmail"
                                       class="form-control" placeholder="Correo"
                                       v-model="editUser.email" aria-label="editEmail">
                                <span class="text-danger text-sm" v-if="fieldsStatusEdit.email">
                                    @{{ fetchErrors?.email }}
                                </span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <label for="editIsActive" class="mb-0">Usuario activo?</label>
                            <input type="checkbox" class="ml-2" name="editIsActive"
                                   id="editIsActive" v-model="editUser.isActive">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="btnEditUser">Editar Usuario</button>
                </div>
            </form>
        </div>
    </div>
</div>
