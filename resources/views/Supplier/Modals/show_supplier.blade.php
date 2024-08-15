<div class="modal fade bd-example-modal-lg" id="showSupplier" data-bs-backdrop="static" data-bs-keyboard="false"
     aria-labelledby="showSupplierLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showSupplierLabel">Datos Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="showSupplier">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="companyName">Nombre de la compañia</label>
                            <input type="text"
                                   id="companyName"
                                   name="companyName"
                                   class="form-control"
                                   :value="showSupplier.companyName"
                                   disabled>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="nit">Nit empresa</label>
                            <input type="number"
                                   id="nit"
                                   name="nit"
                                   class="form-control"
                                   :value="showSupplier.nit"
                                   disabled>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="phoneCompany">Telefono empresa</label>
                            <input type="text"
                                   id="phoneCompany"
                                   name="phoneCompany"
                                   class="form-control"
                                   maxlength="12"
                                   :value="showSupplier.phoneCompany"
                                   disabled>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="email">Correo</label>
                            <input type="email"
                                   id="email"
                                   name="email"
                                   class="form-control"
                                   placeholder="Correo"
                                   :value="showSupplier.email"
                                   disabled>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="address">Ubicación</label>
                            <input type="text"
                                   id="address"
                                   name="address"
                                   class="form-control"
                                   maxlength="12"
                                   :value="showSupplier.address"
                                   disabled>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="representative">Nombre representante</label>
                            <input type="text"
                                   id="representative"
                                   name="representative"
                                   class="form-control"
                                   placeholder="Nombre Representante"
                                   :value="showSupplier.representative"
                                   disabled>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="phoneRepresentative">Telefono representant</label>
                            <input type="text"
                                   id="phoneRepresentative"
                                   name="phoneRepresentative"
                                   class="form-control"
                                   maxlength="12"
                                   :value="showSupplier.phoneRepresentative"
                                   disabled>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="active">Status</label>
                            <input type="text"
                                   id="active"
                                   name="active"
                                   class="form-control"
                                   maxlength="12"
                                   :value="showSupplier.active ? 'Activo' : 'Inactivo'"
                                   disabled>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="active">Status</label>
                            <input type="text"
                                   id="active"
                                   name="active"
                                   class="form-control"
                                   maxlength="12"
                                   :value="showSupplier.active ? 'Activo' : 'Inactivo'"
                                   disabled>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="createdAt">Fecha de creacion</label>
                            <input type="text"
                                   id="createdAt"
                                   name="createdAt"
                                   class="form-control"
                                   maxlength="12"
                                   :value="showSupplier.createdAt"
                                   disabled>
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
