<script>
import button from 'vuetify/src/components/buttons/Button.js';

export default {
    name: 'link-btn',
    mixins: [ button ],

    methods: {
        click() {
            window.location.href = this.href;
        },
    },
}
</script>
