const dataTableUtils = {
    destroyDataTable(tableId) {
        if ($.fn.DataTable.isDataTable(`#${tableId}`)) {
            let table = $(`#${tableId}`).DataTable();
            table.destroy();
        }
    },
    
    initializeDataTable(tableId, options = {}, overrideDefaults = false) {
        const defaultOptions = {
            pagingType: 'simple_numbers',
            language: es_datatables,
            retrieve: true,
            order: [],
        };
    
        const finalOptions = overrideDefaults ? options : { ...defaultOptions, ...options };
    
        $(`#${tableId}`).DataTable(finalOptions);
    }
}