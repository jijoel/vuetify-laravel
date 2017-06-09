class FormError {

    constructor(errors)
    {
        if ( typeof errors === 'undefined' || ! errors )
            errors = {};

        this.errors = errors;
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
            return true;

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
