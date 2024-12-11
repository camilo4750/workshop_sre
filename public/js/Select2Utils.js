const select2Utils = {
    initSimpleSelect2(selector, placeholder = '', options = {}) {
        $(selector).select2({
            ...select2SpanishConfig,
            width: '100%',
            placeholder: placeholder,
            ...options,
        });
    },

    initAjaxSelect2(selector, url, processResultsCallback, additionalOptions = {}) {
        $(selector).select2({
            width: '100%',
            ajax: {
                url: url,
                dataType: 'json',
                delay: 250,
                processResults: processResultsCallback,
                cache: true,
            },
            ...additionalOptions,
        });
    },

    bindSelect2Event(selector, event, callback) {
        $(selector).on(event, callback);
    },

    destroySelect2(selector) {
        if ($(selector).data('select2')) {
            $(selector).select2('destroy');
        }
    }
}

const select2SpanishConfig = {
    language: {
        errorLoading: function() {
            return 'No se pudieron cargar los resultados.';
        },
        inputTooLong: function(args) {
            const overChars = args.input.length - args.maximum;
            return `Por favor, elimine ${overChars} carácter${overChars !== 1 ? 'es' : ''}.`;
        },
        inputTooShort: function(args) {
            const remainingChars = args.minimum - args.input.length;
            return `Por favor, introduzca ${remainingChars} o más caracteres.`;
        },
        loadingMore: function() {
            return 'Cargando más resultados...';
        },
        maximumSelected: function(args) {
            return `Solo puede seleccionar ${args.maximum} elemento${args.maximum !== 1 ? 's' : ''}.`;
        },
        noResults: function() {
            return 'No se encontraron resultados.';
        },
        searching: function() {
            return 'Buscando...';
        },
        removeAllItems: function() {
            return 'Eliminar todos los elementos.';
        }
    }
};