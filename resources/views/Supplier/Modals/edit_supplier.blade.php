<div class="modal fade" id="updateSupplier" data-backdrop="static" data-keyboard="false"
    aria-labelledby="updateSupplierLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateSupplierLabel">Editar Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="updateSupplier" v-if="departments.length > 0 && municipalities.length > 0">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="editCompanyName">Nombre de la compañia</label>
                            <input type="text" id="editCompanyName" name="editCompanyName" class="form-control"
                                v-model="editSupplier.companyName">
                            <span class="text-danger text-sm" v-if="fieldsStatus.companyName">
                                @{{ fetchErrors?.companyName }}
                            </span>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="editCompanyPhone">Telefono</label>
                            <input type="text" id="editCompanyPhone" name="editCompanyPhone" class="form-control"
                                v-model="editSupplier.companyPhone">
                            <span class="text-danger text-sm" v-if="fieldsStatus.companyPhone">
                                @{{ fetchErrors?.companyPhone }}
                            </span>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="editContactInformation">Informacion del proveedor</label>
                            <input type="text" id="editContactInformation" name="editContactInformation"
                                class="form-control" placeholder="Telefono" v-model="editSupplier.contactInformation">
                            <span class="text-danger text-sm" v-if="fieldsStatus.contactInformation">
                                @{{ fetchErrors?.contactInformation }}
                            </span>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="editNit">Nit</label>
                            <input type="text" id="editNit" name="editNit" class="form-control"
                                placeholder="Nit empresa" v-model="editSupplier.nit">
                            <span class="text-danger text-sm" v-if="fieldsStatus.nit">
                                @{{ fetchErrors?.nit }}
                            </span>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="email">Correo electronico</label>
                            <input type="email" id="editEmail" name="editEmail" class="form-control"
                                placeholder="example@gmail.com" v-model="editSupplier.email">
                            <span class="text-danger text-sm" v-if="fieldsStatus.email">
                                @{{ fetchErrors?.email }}
                            </span>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="editCountry">país</label>
                            <select name="editCountry" id="editCountry" class="form-control"
                                v-model="editSupplier.countryId">
                                <option v-for="country in countries" :value="country.id">
                                    @{{ country.name }}
                                </option>
                            </select>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="editDepartment">departamento</label>
                            <select name="editDepartment" id="editDepartment" class="form-control"
                                v-model="editSupplier.departmentId">
                                <option v-for="department in departments" :value="department.id">
                                    @{{ department.name }}
                                </option>
                            </select>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="editMunicipality">Municipio</label>
                            <select name="editMunicipality" id="editMunicipality" v-model="editSupplier.municipalityId">
                                <option v-for="municipality in municipalities" :value="municipality.id">
                                    @{{ municipality.name }}
                                </option>
                            </select>
                            <span class="text-danger text-sm" v-if="fieldsStatus.municipalityId">
                                @{{ fetchErrors?.municipalityId }}
                            </span>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="editStatus">Estado del proveedor</label>
                            <select name="editStatus" id="editStatus" class="form-control"
                                v-model="editSupplier.statusId">
                                <option v-for="status in supplierStatus" :value="status.id">
                                    @{{ status.name }}
                                </option>
                            </select>
                            <span class="text-danger text-sm" v-if="fieldsStatus.statusId">
                                @{{ fetchErrors?.statusId }}
                            </span>
                        </div>

                        <div class="form-group col-12">
                            <label for="editAddress">Dirección de la compañia</label>
                            <input type="text" id="editAddress" name="editAddress" class="form-control" maxlength="12"
                                placeholder="Ubicación" v-model="editSupplier.address">
                            <span class="text-danger text-sm" v-if="fieldsStatus.address">
                                @{{ fetchErrors?.address }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success" id="btnUpdateSupplier">Editar proveedor</button>
                </div>
            </form>
            <div class="d-flex justify-content-center align-items-center" v-else>
                @include('preloader')
            </div>
        </div>
    </div>
</div>