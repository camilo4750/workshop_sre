<div class="modal fade" id="showEmployee" data-keyboard="false"
    aria-labelledby="showEmployeeLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showEmployeeLabel">Datos Empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="row" v-if="!isModalLoading">
                        <div class="form-group col-12 col-md-6">
                            <label for="showFullName">Nombre completo</label>
                            <input type="text" id="showFullName" name="showFullName" class="form-control"
                                :value="showEmployee.fullName" disabled>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="showTypeDocumentName">Tipo documento</label>
                            <input type="text" id="showTypeDocumentName" name="showTypeDocumentName" class="form-control"
                                :value="showEmployee.typeDocumentName" disabled>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="showDocumentNumber">Numero documento</label>
                            <input type="text" id="showDocumentNumber" name="showDocumentNumber" class="form-control"
                                :value="showEmployee.documentNumber" disabled>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="showMunicipalityName">Municipio</label>
                            <input type="text" id="showMunicipalityName" name="showMunicipalityName" class="form-control"
                                :value="showEmployee.municipalityName" disabled>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="showAddress">Direccion</label>
                            <input type="text" id="showAddress" name="showAddress" class="form-control"
                                :value="showEmployee.address" disabled>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="showTelephone">Telefono</label>
                            <input type="text" id="showTelephone" name="showTelephone" class="form-control"
                                :value="showEmployee.telephone" disabled>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="showGenderName">Genero</label>
                            <input type="text" id="showGenderName" name="showGenderName" class="form-control"
                                :value="showEmployee.genderName" disabled>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="showJobPositionName">Cargo</label>
                            <input type="text" id="showJobPositionName" name="showJobPositionName" class="form-control"
                                :value="showEmployee.jobPositionName" disabled>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="showEpsName">Eps</label>
                            <input type="text" id="showEpsName" name="showEpsName" class="form-control"
                                :value="showEmployee.epsName" disabled>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="showPensionFundName">Fondo pensión</label>
                            <input type="text" id="showPensionFundName" name="showPensionFundName" class="form-control"
                                :value="showEmployee.pensionFundName" disabled>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="showArlName">Arl</label>
                            <input type="text" id="showArlName" name="showArlName" class="form-control"
                                :value="showEmployee.arlName" disabled>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="showContractTypeName">Tipo contrato</label>
                            <input type="text" id="showContractTypeName" name="showContractTypeName" class="form-control"
                                :value="showEmployee.contractTypeName" disabled>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="showSalary">Salario Base</label>
                            <input type="text" id="showSalary" name="showSalary" class="form-control"
                                :value="showEmployee.salary" disabled>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="showEntryDate">Fecha ingreso</label>
                            <input type="text" id="showEntryDate" name="showEntryDate" class="form-control"
                                :value="showEmployee.entryDate" disabled>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="showWithdrawalDate">Fecha retiro</label>
                            <input type="text" id="showWithdrawalDate" name="showWithdrawalDate" class="form-control"
                                :value="showEmployee.withdrawalDate" disabled>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="showBankName">Banco</label>
                            <input type="text" id="showBankName" name="showBankName" class="form-control"
                                :value="showEmployee.bankName" disabled>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="showBankAccountNumber">Cuenta bancanria</label>
                            <input type="text" id="showBankAccountNumber" name="showBankAccountNumber" class="form-control"
                                :value="showEmployee.bankAccountNumber" disabled>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="showEmployeeStatusName">Estado</label>
                            <input type="text" id="showEmployeeStatusName" name="showEmployeeStatusName" class="form-control"
                                :value="showEmployee.employeeStatusName" disabled>
                        </div>

                        <div class="form-group col-12">
                            <label for="showEmergencyContact">Contacto de emeergencia</label>
                            <textarea type="text" id="showEmergencyContact" name="showEmergencyContact" class="form-control"
                                :value="showEmployee.emergencyContact" disabled></textarea>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center" v-else>
                        @include('preloader')
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>