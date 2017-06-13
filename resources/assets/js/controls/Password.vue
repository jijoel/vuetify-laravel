<template>
  <v-text-field
    :value="value"
    :name="name"
    :label="label"
    :type="getType"
    :prepend-icon="prependIcon"
    :append-icon="getIcon"
    :append-icon-cb="() => (hidden = !hidden)"

    :hint="hint"
    :error="error"
    :errors="errors"
    :rules="rules"
    :required="required"
    :counter="counter"
    :min="min"
    :max="max"
    @blur="blur($event)"
    @input="updateValue($event)">
  ></v-text-field>

</template>


<script>

export default {

  name: 'password',

  props: {
    'error': {},
    'errors': {},
    'rules': {},
    'required': {},
    'counter': {},
    'min': {},
    'max': {},
    'input': {},
    'hint': {},
    'value': {},

    'label': {
      accept: String,
      default: 'New Password',
    },
    'name': {
      accept: String,
      default: 'name',
    },
    'prepend-icon': {
      accept: String,
      default: 'lock',
    },
  },

  data() {
    return {
      hidden: true,
    }
  },

  computed: {
    getType() {
      return this.hidden ? 'password' : 'text';
    },
    getIcon() {
      return this.hidden ? 'visibility' : 'visibility_off';
    },
  },

  methods: {
    blur(value) {
      this.$emit('blur', value);
    },
    updateValue(value) {
      this.value = value;
      this.$emit('input', value);
    },
  }

}
</script>
