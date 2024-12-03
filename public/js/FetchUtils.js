const fetchUtils = {
    async fetchGet(url, additionalHeaders = {}) {
        const defaultHeaders = {
            "Content-Type": "application/json",
            accept: "application/json",
        };

        const res = await fetch(url, {
            method: "GET",
            headers: { ...defaultHeaders, ...additionalHeaders },
        });

        const data = await res.json();

        if (!res.ok) {
            throw new Error(data.message || "Error en la solicitud");
        }

        return data;
    },

    async fetchPost(url, csrfToken, body = null, additionalHeaders = {}) {
        const defaultHeaders = {
            "Content-Type": "application/json",
            accept: "application/json",
            "X-CSRF-TOKEN": csrfToken,
        };

        const res = await fetch(url, {
            method: "POST",
            headers: { ...defaultHeaders, ...additionalHeaders },
            body: JSON.stringify(body),
        });

        const data = await res.json();

        return data;
    },

    validateFields(errors, fieldsStatus, fetchErrors) {
        Object.keys(errors).forEach((key) => {
            fieldsStatus[key] = true;
            fetchErrors[key] = errors[key];
        });
    },
};
