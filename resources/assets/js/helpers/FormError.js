class FormError {

    constructor(errors)
    {
        if (typeof errors === 'undefined')
            return this.errors = {};

        this.errors = JSON.parse(errors);
    }

    has(field)
    {
        return this.errors[field]
            ? true
            : false;
    }

    get(field)
    {
        if (! this.errors[field])
            return false;

        return this.errors[field].join();
    }

    clear(field = null)
    {
        if (! field)
            this.errors = {};
        else
            this.errors[field] = '';
    }

}

module.exports = FormError;
