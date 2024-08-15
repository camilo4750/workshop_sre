<div class="modal fade bd-example-modal-lg" id="updateSupplier" data-bs-backdrop="static" data-bs-keyboard="false"
     aria-labelledby="updateSupplierLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateSupplierLabel">Editar Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form @submit.prevent="updateSupplier">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <input type="text" id="companyName" name="companyName" class="form-control"
                                   placeholder="Nombre de la compañia" v-model="editSupplier.companyName">
                            <span class="text-danger text-sm" v-if="fieldsStatus.companyName">
                                    @{{ fetchErrors?.companyName }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <input type="number" id="nit" name="nit" class="form-control" placeholder="Nit empresa"
                                   v-model="editSupplier.nit">
                            <span class="text-danger text-sm" v-if="fieldsStatus.nit">
                                    @{{ fetchErrors?.nit }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <input type="text" id="phoneCompany" name="phoneCompany" class="form-control"
                                   maxlength="12" placeholder="Telefono" v-model="editSupplier.phoneCompany">
                            <span class="text-danger text-sm" v-if="fieldsStatus.phoneCompany">
                                    @{{ fetchErrors?.phoneCompany }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <input type="email" id="email" name="email" class="form-control"
                                   placeholder="Correo" v-model="editSupplier.email">
                            <span class="text-danger text-sm" v-if="fieldsStatus.email">
                                    @{{ fetchErrors?.email }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <input type="text" id="address" name="address" class="form-control"
                                   maxlength="12" placeholder="Ubicación" v-model="editSupplier.address">
                            <span class="text-danger text-sm" v-if="fieldsStatus.address">
                                    @{{ fetchErrors?.address }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <input type="text" id="representative" name="representative" class="form-control"
                                   placeholder="Nombre Representante" v-model="editSupplier.representative">
                            <span class="text-danger text-sm" v-if="fieldsStatus.representative">
                                    @{{ fetchErrors?.representative }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <input type="text" id="phoneRepresentative" name="phoneRepresentative"
                                   class="form-control"
                                   maxlength="12" placeholder="Telefono representante"
                                   v-model="editSupplier.phoneRepresentative">
                            <span class="text-danger text-sm" v-if="fieldsStatus.phoneRepresentative">
                                    @{{ fetchErrors?.phoneRepresentative }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success" id="btnUpdateSupplier">Editar proveedor</button>
                </div>
            </form>
        </div>
    </div>
</div>
