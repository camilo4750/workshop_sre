const fetchUtils = {
    async fetchGet(url,  additionalHeaders = {}) {
        const defaultHeaders = {
            "Content-Type": "application/json",
            "accept": "application/json",
        };

        try {
            const res = await fetch(url, {
                method: "GET",
                headers: { ...defaultHeaders, ...additionalHeaders },
            });

            const data = await res.json();

            if (!res.ok) {
                throw new Error(data.message || "Error en la solicitud");
            }

            return data;
        } catch (error) {
            console.error(`Error en la petición a ${url}:`, error);
            throw error;
        }
    },

    async fetchPost(url, csrfToken, body = null, additionalHeaders = {}) {
        const defaultHeaders = {
            "Content-Type": "application/json",
            "accept": "application/json",
            "X-CSRF-TOKEN": csrfToken,
        };

        try {
            const res = await fetch(url, {
                method: "POST",
                headers: { ...defaultHeaders, ...additionalHeaders },
                body: JSON.stringify(body),
            });

            const data = await res.json();

            if (!res.ok) {
                throw new Error(data.message || "Error en la solicitud");
            }

            return data;
        } catch (error) {
            console.error(`Error en la petición POST a ${url}:`, error);
            throw error;
        }
    },


    validateFields(errors, fieldsStatus, fetchErrors) {
        Object.keys(errors).forEach(key => {
            fieldsStatus[key] = true;
            fetchErrors[key] = errors[key];
        });
    },
};