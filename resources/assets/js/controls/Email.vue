<script>
import TextField from 'vuetify/src/components/forms/TextField.js';

export default {

  name: 'email',

  mixins: [ TextField ],

  props: {
    'label': {
      accept: String,
      default: 'Email Address',
    },
    'type': {
      accept: String,
      default: 'email',
    },
    'prepend-icon': {
      accept: String,
      default: 'mail',
    },
  },

}
</script>
