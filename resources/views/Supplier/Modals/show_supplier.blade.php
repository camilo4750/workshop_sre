<div class="modal fade" id="showSupplier" data-keyboard="false"
    aria-labelledby="showSupplierLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showSupplierLabel">Datos Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="showCompanyName">Nombre de la compañia</label>
                            <input type="text" id="showCompanyName" name="showCompanyName" class="form-control"
                                :value="showSupplier.companyName" disabled>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="showCompanyPhone">Telefono empresa</label>
                            <input type="text" id="showCompanyPhone" name="showCompanyPhone" class="form-control"
                                :value="showSupplier.companyPhone" disabled>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="showContactInfo">Informacion del proveedor</label>
                            <textarea id="showContactInfo" name="showContactInfo" class="form-control"
                                :value="showSupplier.contactInformation" disabled></textarea>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="ShowNit">Nit empresa</label>
                            <input type="text" id="ShowNit" name="ShowNit" class="form-control" 
                            :value="showSupplier.nit" disabled>
                        </div>
                       
                        <div class="form-group col-12 col-md-6">
                            <label for="showEmail">Correo electronico</label>
                            <input type="email" id="showEmail" name="showEmail" class="form-control"
                                :value="showSupplier.email" disabled>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="showCountry">País</label>
                            <input type="text" id="showCountry" name="showCountry" class="form-control"
                                :value="showSupplier.countryName" disabled>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="showDepartment">Departamento</label>
                            <input type="text" id="showDepartment" name="showDepartment" class="form-control"
                                :value="showSupplier.departmentName" disabled>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="showMunicipality">Municipio</label>
                            <input type="text" id="showMunicipality" name="showMunicipality" class="form-control"
                                :value="showSupplier.municipalityName" disabled>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="showStatus">Estado</label>
                            <input type="text" id="showStatus" name="showStatus" class="form-control"
                                :value="showSupplier.statusName" disabled>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="createdAt">Fecha de creacion</label>
                            <input type="text" id="createdAt" name="createdAt" class="form-control"
                                :value="showSupplier.createdAt" disabled>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="updatedAt">Fecha de edición</label>
                            <input type="text" id="updatedAt" name="updatedAt" class="form-control"
                                :value="showSupplier.updatedAt" disabled>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>