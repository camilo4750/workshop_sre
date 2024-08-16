var Const = (function () {
    const typeOfDocument = [
        {
            type: 'CC',
            name: 'Cedula de ciudadanía',
        },
        {
            type: 'RC',
            name: 'Registro Civil',
        },
        {
            type: 'CE',
            name: 'Cédula de Extranjería',
        },
        {
            type: 'CI',
            name: 'Carné de Identidad',
        },
        {
            type: 'DN',
            name: 'Documento Nacional de Identidad',
        },
    ]


    function construct() {
        return {
            typeOfDocument: typeOfDocument,
        }
    }

    return {construct: construct}
})().construct();
