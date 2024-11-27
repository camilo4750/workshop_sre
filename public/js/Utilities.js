const utilities = {
    toastr_(type, title, msg) {
        if (typeof toastr === "undefined") {
            throw new Error("toastr is not defined");
        }
        toastr.options = {
            closeButton: true,
            debug: false,
            newestOnTop: false,
            progressBar: true,
            positionClass: "toast-top-right",
            preventDuplicates: false,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            timeOut: "5000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
        };
        toastr[type](msg, title);
    },

    formatterDate(date) {
        const currentDate = new Date(date);
        if (isNaN(currentDate)) {
            throw new Error("Invalid date");
        }
        return currentDate.toISOString().split("T")[0];
    },
};
