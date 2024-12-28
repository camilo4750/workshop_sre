<div class="modal fade" id="createEmployee" data-keyboard="false" aria-labelledby="createEmployeeLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createEmployeeLabel">Crear Empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="submintFormStoreEmployee">
                <div class="modal-body">
                    <div class="row" v-if="!isModalLoading">
                        <div class="form-group col-12">
                            <label for="createFullName">Nombre completo</label>
                            <input type="text" id="createFullName" name="createFullName" class="form-control"
                                v-model="createEmployee.fullName">
                            <span class="text-danger text-sm" v-if="fieldsStatus.fullName">
                                @{{ fetchErrors?.fullName }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="createTypeDocument">Tipo documento</label>
                            <select id="createTypeDocument" name="createTypeDocument" class="form-control"
                                v-model="createEmployee.typeDocumentId">
                                <option v-for="typeDocument in typesDocuments" :value="typeDocument.id">
                                    @{{ typeDocument.name }}
                                </option>
                            </select>
                            <span class="text-danger text-sm" v-if="fieldsStatus.typeDocumentId">
                                @{{ fetchErrors?.typeDocumentId }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="createDocumentNumber">Numero documento</label>
                            <input type="text" id="createDocumentNumber" name="createDocumentNumber"
                                class="form-control" v-model="createEmployee.documentNumber">
                            <span class="text-danger text-sm" v-if="fieldsStatus.documentNumber">
                                @{{ fetchErrors?.documentNumber }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="createCountry">País</label>
                            <select id="createCountry" name="createCountry" class="form-control">
                                <option value="" selected disabled>Seleccionar país</option>
                                <option v-for="country in countries" :value="country.id">
                                    @{{ country.name }}
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="createDepartment">Departamento</label>
                            <select id="createDepartment" name="createDepartment" class="form-control"
                                @change="changeMunicipality($event)">
                                <option value="" selected disabled>Seleccionar departamento</option>
                                <option v-for="department in departments" :value="department.id">
                                    @{{ department.name }}
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="createMunicipalityId">Municipio</label>
                            <select id="createMunicipalityId" name="createMunicipalityId" class="form-control"
                                v-model="createEmployee.municipalityId">
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
                            <label for="createAddress">Dirección</label>
                            <input type="text" id="createAddress" name="createAddress" class="form-control"
                                v-model="createEmployee.address">
                            <span class="text-danger text-sm" v-if="fieldsStatus.address">
                                @{{ fetchErrors?.address }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="createTelephone">Teléfono</label>
                            <input type="text" id="createTelephone" name="createTelephone" class="form-control"
                                v-model="createEmployee.telephone">
                            <span class="text-danger text-sm" v-if="fieldsStatus.telephone">
                                @{{ fetchErrors?.telephone }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="createGender">Genero</label>
                            <select id="createGender" name="createGender" class="form-control"
                                v-model="createEmployee.genderId">
                                <option v-for="gender in genders" :value="gender.id">
                                    @{{ gender.name }}
                                </option>
                            </select>
                            <span class="text-danger text-sm" v-if="fieldsStatus.genderId">
                                @{{ fetchErrors?.genderId }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="createJobPositionId">Cargo</label>
                            <select id="createJobPositionId" name="createJobPositionId" class="form-control"
                                v-model="createEmployee.jobPositionId">
                                <option v-for="position in jobPositions" :value="position.id">
                                    @{{ position.name }}
                                </option>
                            </select>
                            <span class="text-danger text-sm" v-if="fieldsStatus.jobPositionId">
                                @{{ fetchErrors?.jobPositionId }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="createEps">Eps</label>
                            <select id="createEps" name="createEps" class="form-control" v-model="createEmployee.epsId">
                                <option v-for="ep in eps" :value="ep.id">
                                    @{{ ep.name }}
                                </option>
                            </select>
                            <span class="text-danger text-sm" v-if="fieldsStatus.epsId">
                                @{{ fetchErrors?.epsId }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="createPensionFundId">Fondo pensión</label>
                            <select id="createPensionFundId" name="createPensionFundId" class="form-control"
                                v-model="createEmployee.pensionFundId">
                                <option v-for="pension in pensionFunds" :value="pension.id">
                                    @{{ pension.name }}
                                </option>
                            </select>
                            <span class="text-danger text-sm" v-if="fieldsStatus.pensionFundId">
                                @{{ fetchErrors?.pensionFundId }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="createArl">Arl</label>
                            <select id="createArl" name="createArl" class="form-control" v-model="createEmployee.arlId">
                                <option v-for="arl in arls" :value="arl.id">
                                    @{{ arl.name }}
                                </option>
                            </select>
                            <span class="text-danger text-sm" v-if="fieldsStatus.arlId">
                                @{{ fetchErrors?.arlId }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="createContractTypeId">Tipo contrato</label>
                            <select id="createContractTypeId" name="createContractTypeId" class="form-control"
                                v-model="createEmployee.contractTypeId">
                                <option v-for="contract in contractTypes" :value="contract.id">
                                    @{{ contract.name }}
                                </option>
                            </select>
                            <span class="text-danger text-sm" v-if="fieldsStatus.contractTypeId">
                                @{{ fetchErrors?.contractTypeId }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="createSalary">Salario Base</label>
                            <input type="text" id="createSalary" name="createSalary" class="form-control"
                                v-model="createEmployee.salary">
                            <span class="text-danger text-sm" v-if="fieldsStatus.salary">
                                @{{ fetchErrors?.salary }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="createEntryDate">Fecha ingreso</label>
                            <input type="date" id="createEntryDate" name="createEntryDate" class="form-control"
                                v-model="createEmployee.entryDate">
                            <span class="text-danger text-sm" v-if="fieldsStatus.entryDate">
                                @{{ fetchErrors?.entryDate }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="createWithdrawalDate">Fecha retiro</label>
                            <input type="date" id="createWithdrawalDate" name="createWithdrawalDate"
                                class="form-control" v-model="createEmployee.withdrawalDate">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="createBank">Banco</label>
                            <select id="createBank" name="createBank" class="form-control"
                                v-model="createEmployee.bankId">
                                <option v-for="bank in banks" :value="bank.id">
                                    @{{ bank.name }}
                                </option>
                            </select>
                            <span class="text-danger text-sm" v-if="fieldsStatus.bankId">
                                @{{ fetchErrors?.bankId }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="createBankAccountNumber">Cuenta bancanria</label>
                            <input type="text" id="createBankAccountNumber" name="createBankAccountNumber"
                                class="form-control" v-model="createEmployee.bankAccountNumber">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="createEmployeeStatusId">Estado</label>
                            <select id="createEmployeeStatusId" name="createEmployeeStatusId" class="form-control"
                                v-model="createEmployee.employeeStatusId">
                                <option v-for="status in employeesStatus" :value="status.id">
                                    @{{ status.name }}
                                </option>
                            </select>
                            <span class="text-danger text-sm" v-if="fieldsStatus.employeeStatusId">
                                @{{ fetchErrors?.employeeStatusId }}
                            </span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="createEmergencyContact">Contacto de emeergencia</label>
                            <input type="text" id="createEmergencyContact" name="createEmergencyContact"
                                class="form-control" v-model="createEmployee.emergencyContact">
                            <span class="text-danger text-sm" v-if="fieldsStatus.emergencyContact">
                                @{{ fetchErrors?.emergencyContact }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-color-create" id="btnCreateUser">Crear Empleador</button>
                </div>
            </form>
        </div>
    </div>
</div>