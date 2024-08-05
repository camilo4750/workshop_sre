<div class="modal fade bd-example-modal-lg" id="createSupplier" data-bs-backdrop="static" data-bs-keyboard="false"
     aria-labelledby="createSupplierLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createSupplierLabel">Crear Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="storeSupplier">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <input type="text" id="companyName" name="companyName" class="form-control"
                                   placeholder="Nombre de la compañia" v-model="supplier.companyName">
                            <span class="text-danger text-sm" v-if="fieldsStatus.companyName">
                                    @{{ fetchErrors?.companyName }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <input type="number" id="nit" name="nit" class="form-control" placeholder="Nit empresa"
                                   v-model="supplier.nit">
                            <span class="text-danger text-sm" v-if="fieldsStatus.nit">
                                    @{{ fetchErrors?.nit }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <input type="text" id="phoneCompany" name="phoneCompany" class="form-control"
                                   maxlength="12" placeholder="Telefono" v-model="supplier.phoneCompany">
                            <span class="text-danger text-sm" v-if="fieldsStatus.phoneCompany">
                                    @{{ fetchErrors?.phoneCompany }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <input type="email" id="email" name="email" class="form-control"
                                   placeholder="Correo" v-model="supplier.email">
                            <span class="text-danger text-sm" v-if="fieldsStatus.email">
                                    @{{ fetchErrors?.email }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <input type="text" id="address" name="address" class="form-control"
                                   maxlength="12" placeholder="Ubicación" v-model="supplier.address">
                            <span class="text-danger text-sm" v-if="fieldsStatus.address">
                                    @{{ fetchErrors?.address }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <input type="text" id="representative" name="representative" class="form-control"
                                   placeholder="Nombre Representante" v-model="supplier.representative">
                            <span class="text-danger text-sm" v-if="fieldsStatus.representative">
                                    @{{ fetchErrors?.representative }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <input type="text" id="phoneRepresentative" name="phoneRepresentative"
                                   class="form-control"
                                   maxlength="12" placeholder="Telefono representante"
                                   v-model="supplier.phoneRepresentative">
                            <span class="text-danger text-sm" v-if="fieldsStatus.phoneRepresentative">
                                    @{{ fetchErrors?.phoneRepresentative }}
                            </span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <label class="mb-0 w">Activar proveedor:</label>
                        <input type="checkbox" id="status" name="status" class="ml-2" v-model="supplier.active">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="btnStoreSupplier">Crear proveedor</button>
                </div>
            </form>
        </div>
    </div>
</div>
