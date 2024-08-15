var utilities = (function () {
    const toastr_ = function (type, title, msg) {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr[type](msg, title);
    }

    const formatterDate = function (date) {
        let currentDate = new Date(date)
        return currentDate.toISOString().split('T')[0];
    }

    function construct() {
        return {
            toastr_             : toastr_,
            formatterDate       : formatterDate
        }
    }
    return {construct:construct}
})().construct();
