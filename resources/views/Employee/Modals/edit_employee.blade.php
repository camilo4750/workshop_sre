<div class="modal fade" id="editEmployee" data-keyboard="false" aria-labelledby="editEmployeeLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEmployeeLabel">Editar Empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="submintFormUpdateEmployee">
                <div class="modal-body">
                    <div class="row" v-if="!isModalLoading">
                        <div class="form-group col-12">
                            <label for="editFullName">Nombre completo</label>
                            <input type="text" id="editFullName" name="editFullName" class="form-control"
                                v-model="editEmployee.fullName">
                            <span class="text-danger text-sm" v-if="fieldsStatus.fullName">
                                @{{ fetchErrors?.fullName }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="editTypeDocument">Tipo documento</label>
                            <select id="editTypeDocument" name="editTypeDocument" class="form-control"
                                v-model="editEmployee.typeDocumentId">
                                <option v-for="typeDocument in typesDocuments" :value="typeDocument.id">
                                    @{{ typeDocument.name }}
                                </option>
                            </select>
                            <span class="text-danger text-sm" v-if="fieldsStatus.typeDocumentId">
                                @{{ fetchErrors?.typeDocumentId }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="editDocumentNumber">Numero documento</label>
                            <input type="text" id="editDocumentNumber" name="editDocumentNumber" class="form-control"
                                v-model="editEmployee.documentNumber">
                            <span class="text-danger text-sm" v-if="fieldsStatus.documentNumber">
                                @{{ fetchErrors?.documentNumber }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="editCountry">País</label>
                            <select id="editCountry" name="editCountry" class="form-control"
                                v-model="editEmployee.countryId">
                                <option value="" selected disabled>Seleccionar país</option>
                                <option v-for="country in countries" :value="country.id">
                                    @{{ country.name }}
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="editDepartment">Departamento</label>
                            <select id="editDepartment" name="editDepartment" class="form-control"
                                v-model="editEmployee.departmentId" @change="changeMunicipality($event)">
                                <option value="" selected disabled>Seleccionar departamento</option>
                                <option v-for="department in departments" :value="department.id">
                                    @{{ department.name }}
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="editMunicipalityId">Municipio</label>
                            <select id="editMunicipalityId" name="editMunicipalityId" class="form-control"
                                v-model="editEmployee.municipalityId">
                                <option value="" selected disabled>Seleccionar municipio</option>
                                <option v-for="municipality in municipalities" :value="municipality.id">
                                    @{{ municipality.name }}
                                </option>
                            </select>
                            <span class="text-danger text-sm" v-if="fieldsStatus.municipalityId">
                                @{{ fetchErrors?.municipalityId }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="editAddress">Dirección</label>
                            <input type="text" id="editAddress" name="editAddress" class="form-control"
                                v-model="editEmployee.address">
                            <span class="text-danger text-sm" v-if="fieldsStatus.address">
                                @{{ fetchErrors?.address }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="editTelephone">Teléfono</label>
                            <input type="text" id="editTelephone" name="editTelephone" class="form-control"
                                v-model="editEmployee.telephone">
                            <span class="text-danger text-sm" v-if="fieldsStatus.telephone">
                                @{{ fetchErrors?.telephone }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="editGender">Genero</label>
                            <select id="editGender" name="editGender" class="form-control"
                                v-model="editEmployee.genderId">
                                <option v-for="gender in genders" :value="gender.id">
                                    @{{ gender.name }}
                                </option>
                            </select>
                            <span class="text-danger text-sm" v-if="fieldsStatus.genderId">
                                @{{ fetchErrors?.genderId }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="editJobPositionId">Cargo</label>
                            <select id="editJobPositionId" name="editJobPositionId" class="form-control"
                                v-model="editEmployee.jobPositionId">
                                <option v-for="position in jobPositions" :value="position.id">
                                    @{{ position.name }}
                                </option>
                            </select>
                            <span class="text-danger text-sm" v-if="fieldsStatus.jobPositionId">
                                @{{ fetchErrors?.jobPositionId }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="editEps">Eps</label>
                            <select id="editEps" name="editEps" class="form-control" v-model="editEmployee.epsId">
                                <option v-for="ep in eps" :value="ep.id">
                                    @{{ ep.name }}
                                </option>
                            </select>
                            <span class="text-danger text-sm" v-if="fieldsStatus.epsId">
                                @{{ fetchErrors?.epsId }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="editPensionFundId">Fondo pensión</label>
                            <select id="editPensionFundId" name="editPensionFundId" class="form-control"
                                v-model="editEmployee.pensionFundId">
                                <option v-for="pension in pensionFunds" :value="pension.id">
                                    @{{ pension.name }}
                                </option>
                            </select>
                            <span class="text-danger text-sm" v-if="fieldsStatus.pensionFundId">
                                @{{ fetchErrors?.pensionFundId }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="editArl">Arl</label>
                            <select id="editArl" name="editArl" class="form-control" v-model="editEmployee.arlId">
                                <option v-for="arl in arls" :value="arl.id">
                                    @{{ arl.name }}
                                </option>
                            </select>
                            <span class="text-danger text-sm" v-if="fieldsStatus.arlId">
                                @{{ fetchErrors?.arlId }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="editContractTypeId">Tipo contrato</label>
                            <select id="editContractTypeId" name="editContractTypeId" class="form-control"
                                v-model="editEmployee.contractTypeId">
                                <option v-for="contract in contractTypes" :value="contract.id">
                                    @{{ contract.name }}
                                </option>
                            </select>
                            <span class="text-danger text-sm" v-if="fieldsStatus.contractTypeId">
                                @{{ fetchErrors?.contractTypeId }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="editSalary">Salario Base</label>
                            <input type="text" id="editSalary" name="editSalary" class="form-control"
                                v-model="editEmployee.salary">
                            <span class="text-danger text-sm" v-if="fieldsStatus.salary">
                                @{{ fetchErrors?.salary }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="editEntryDate">Fecha ingreso</label>
                            <input type="date" id="editEntryDate" name="editEntryDate" class="form-control"
                                v-model="editEmployee.entryDate">
                            <span class="text-danger text-sm" v-if="fieldsStatus.entryDate">
                                @{{ fetchErrors?.entryDate }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="editWithdrawalDate">Fecha retiro</label>
                            <input type="date" id="editWithdrawalDate" name="editWithdrawalDate" class="form-control"
                                v-model="editEmployee.withdrawalDate">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="editBank">Banco</label>
                            <select id="editBank" name="editBank" class="form-control" v-model="editEmployee.bankId">
                                <option v-for="bank in banks" :value="bank.id">
                                    @{{ bank.name }}
                                </option>
                            </select>
                            <span class="text-danger text-sm" v-if="fieldsStatus.bankId">
                                @{{ fetchErrors?.bankId }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="editBankAccountNumber">Cuenta bancanria</label>
                            <input type="text" id="editBankAccountNumber" name="editBankAccountNumber"
                                class="form-control" v-model="editEmployee.bankAccountNumber">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="editEmployeeStatusId">Estado</label>
                            <select id="editEmployeeStatusId" name="editEmployeeStatusId" class="form-control"
                                v-model="editEmployee.employeeStatusId">
                                <option v-for="status in employeesStatus" :value="status.id">
                                    @{{ status.name }}
                                </option>
                            </select>
                            <span class="text-danger text-sm" v-if="fieldsStatus.employeeStatusId">
                                @{{ fetchErrors?.employeeStatusId }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="editEmergencyContact">Contacto de emeergencia</label>
                            <input type="text" id="editEmergencyContact" name="editEmergencyContact"
                                class="form-control" v-model="editEmployee.emergencyContact">
                            <span class="text-danger text-sm" v-if="fieldsStatus.emergencyContact">
                                @{{ fetchErrors?.emergencyContact }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-color-create" id="btnEditUser">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>