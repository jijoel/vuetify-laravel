<script>
const app = new Vue({

    el: '#app',

    data() {
        if ( typeof app_data === 'undefined' || ! app_data )
            app_data = {};

        return Object.assign({
            form: {},
            errors: new FormError(errors),
            validator: new Validator,
        }, app_data);
    },

    mounted() {
        if ( typeof old === "undefined" || ! old )
            return;

        for (var property in old) {
            if (old.hasOwnProperty(property)) {
                this.form[property] = old[property]
            }
        }

    }

});
</script>
