<div class="modal fade" id="createSupplier" data-backdrop="static" data-keyboard="false"
    aria-labelledby="createSupplierLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createSupplierLabel">Crear Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="submintFormStoreSupplier">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="companyName">Nombre de la compañia</label>
                            <input type="text" id="companyName" name="companyName" class="form-control"
                                v-model="supplier.companyName">
                            <span class="text-danger text-sm" v-if="fieldsStatus.companyName">
                                @{{ fetchErrors?.companyName }}
                            </span>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="companyPhone">Telefono</label>
                            <input type="text" id="companyPhone" name="companyPhone" class="form-control" maxlength="15"
                                v-model="supplier.companyPhone">
                            <span class="text-danger text-sm" v-if="fieldsStatus.companyPhone">
                                @{{ fetchErrors?.companyPhone }}
                            </span>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="contactInformation">Informacion del proveedor</label>
                            <input type="text" id="contactInformation" name="contactInformation" class="form-control"
                                placeholder="Telefono" v-model="supplier.contactInformation">
                            <span class="text-danger text-sm" v-if="fieldsStatus.contactInformation">
                                @{{ fetchErrors?.contactInformation }}
                            </span>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="nit">Nit</label>
                            <input type="text" id="nit" name="nit" class="form-control" placeholder="Nit empresa"
                                v-model="supplier.nit">
                            <span class="text-danger text-sm" v-if="fieldsStatus.nit">
                                @{{ fetchErrors?.nit }}
                            </span>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="nit">Correo electronico</label>
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="example@gmail.com" v-model="supplier.email">
                            <span class="text-danger text-sm" v-if="fieldsStatus.email">
                                @{{ fetchErrors?.email }}
                            </span>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="nit">país</label>
                            <select name="country" id="country" class="form-control" v-model="supplier.countryId">
                                <option v-for="country in countries" :value="country.id">
                                    @{{ country.name }}
                                </option>
                            </select>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="department">departamento</label>
                            <select name="department" id="department" class="form-control"
                                v-model="supplier.departmentId">
                                <option v-for="department in departments" :value="department.id">
                                    @{{ department.name }}
                                </option>
                            </select>
                            <span class="text-muted text-sm" v-if="!supplier.countryId">
                                Debe seleccionar un país
                            </span>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="municipality">Municipio</label>
                            <select name="municipality" id="municipality" v-model="supplier.municipalityId">
                                <option v-for="municipality in municipalities" :value="municipality.id">
                                    @{{ municipality.name }}
                                </option>
                            </select>
                            <span class="text-danger text-sm" v-if="fieldsStatus.municipalityId">
                                @{{ fetchErrors?.municipalityId }}
                            </span>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="status">Estado del proveedor</label>
                            <select name="status" id="status" class="form-control" v-model="supplier.statusId">
                                <option v-for="status in supplierStatus" :value="status.id">
                                    @{{ status.name }}
                                </option>
                            </select>
                            <span class="text-danger text-sm" v-if="fieldsStatus.statusId">
                                @{{ fetchErrors?.statusId }}
                            </span>
                        </div>

                        <div class="form-group col-12">
                            <label for="contactInformation">Dirección de la compañia</label>
                            <input type="text" id="address" name="address" class="form-control" maxlength="12"
                                placeholder="Ubicación" v-model="supplier.address">
                            <span class="text-danger text-sm" v-if="fieldsStatus.address">
                                @{{ fetchErrors?.address }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="btnStoreSupplier">Crear proveedor</button>
                </div>
            </form>
        </div>
    </div>
</div>