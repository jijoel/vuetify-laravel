var Validator = require('validatorjs');

module.exports = class FormRules
{

    constructor(data, rules, errors)
    {
        this.data = data;
        this.rules = rules;
        this.errors = this.resetErrors(errors);
    }

    resetErrors(errors={})
    {
        var keys = Object.keys(this.data);

        var copy = {};

        for (var i in keys) {
            copy[keys[i]] = null;
        }

        this.errors = Object.assign(copy, errors);
        return this.errors;
    }

    error(field=null)
    {
        if (this.errors[field] && this.errors[field].length)
            return true;

        return false;
    }

    text(field)
    {
        if (this.errors[field])
            return [ this.errors[field].join(' ') ];

        return [ true ];
    }

    refresh(field)
    {
        var v = new Validator(this.data, this.rules);

        if (v.passes())
            return this.reset(field);

        this.errors[field] = v.errors.get(field);
    }

    reset(field=null)
    {
        if (! field)
            this.resetErrors();
        else
            this.errors[field] = null;
    }

}

