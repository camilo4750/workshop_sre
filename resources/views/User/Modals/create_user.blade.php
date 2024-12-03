<div class="modal fade bd-example-modal-lg" id="createUser" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="createUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserLabel">Creación de usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="submintFormStoreUser">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="form-group col-12">
                                <input type="text" class="form-control" placeholder="Nombre completo"
                                    v-model="createUser.fullName" aria-label="fullName">
                                <span class="text-alert-error" v-if="fieldsStatus.fullName">
                                    @{{ fetchErrors?.fullName }}
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Telefono"
                                    v-model="createUser.phone" aria-label="Telephone">
                                <span class="text-alert-error" v-if="fieldsStatus.phone">
                                    @{{ fetchErrors?.phone }}
                                </span>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Correo electronico" v-model="createUser.email"
                                    aria-label="email" autocomplete="username">
                                <span class="text-alert-error" v-if="fieldsStatus.email">
                                    @{{ fetchErrors?.email }}
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <div class="password-container">
                                    <input type="password" id="password" class="form-control" placeholder="Contraseña"
                                        v-model="createUser.password" aria-label="password" autocomplete="new-password">
                                    <button class="px-1" id="togglePassword" type="button"
                                        @click="togglePassword('password')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>

                                <span class="text-alert-error" v-if="fieldsStatus.password">
                                    @{{ fetchErrors?.password }}
                                </span>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="password-container">
                                    <input type="password" id="passwordConfirmation" class="form-control"
                                        placeholder="Confirmar contraseña" v-model="createUser.password_confirmation"
                                        aria-label="passwordConfirmation" autocomplete="new-password">
                                    <button class="px-1" id="togglePasswordConfirm" type="button"
                                        @click="togglePassword('passwordConfirmation')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <span class="text-alert-error" v-if="fieldsStatus.password_confirmation">
                                    @{{ fetchErrors?.password_confirmation }}
                                </span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <label for="isActive" class="mb-0">Usuario activo?</label>
                            <input type="checkbox" class="ml-2" name="isActive" id="isActive"
                                v-model="createUser.isActive">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-color-create" id="btnCreateUser">Crear usuario</button>
                </div>
            </form>
        </div>
    </div>
</div>