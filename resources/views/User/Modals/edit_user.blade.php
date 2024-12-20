<div class="modal fade bd-example-modal-lg" id="editUserModal" data-backdrop="static" data-keyboard="false"
    aria-labelledby="editUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserLabel">
                   Editar Usuario
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="submintFormUpdateUser">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" name="editFirstName" id="editFirstName" class="form-control"
                                    placeholder="Nombre" v-model="editUser.fullName" aria-label="editFirstName">
                                <span class="text-danger text-sm" v-if="fieldsStatus.fullName">
                                    @{{ fetchErrors?.fullName }}
                                </span>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" name="editPhone" id="editPhone" class="form-control"
                                    placeholder="Telefono" v-model="editUser.phone" aria-label="editPhone">
                                <span class="text-danger text-sm" v-if="fieldsStatus.phone">
                                    @{{ fetchErrors?.phone }}
                                </span>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="editEmail" id="editEmail" class="form-control"
                                    placeholder="Correo" v-model="editUser.email" aria-label="editEmail">
                                <span class="text-danger text-sm" v-if="fieldsStatus.email">
                                    @{{ fetchErrors?.email }}
                                </span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <label for="editIsActive" class="mb-0">Usuario activo?</label>
                            <input type="checkbox" class="ml-2" name="editIsActive" id="editIsActive" :true-value="1"
                                :false-value="0" v-model="editUser.active">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-color-create" id="btnEditUser">Editar usuario</button>
                </div>
            </form>
        </div>
    </div>
</div>