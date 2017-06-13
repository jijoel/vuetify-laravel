<template>

  <v-layout row>
    <v-flex xs10 sm11>

      <va-password-control
        :name="name"
        :value="value"
        :hint="pwHint"
        :error="error"
        :errors="errors"
        :rules="rules"
        :required="required"
        :counter="counter"
        :min="min"
        :max="max"
        @blur="blur($event)"
        @input="onPasswordInput($event)"
      ></va-password-control>
    </v-flex>

    <v-flex xs2 sm1>
      <v-progress-circular
        :width="16"
        :value="indicatorValue"
        :class="indicatorColor"
      ></v-progress-circular>

    </v-flex>
  </v-layout>

</template>


<script>
export default {

  props: {
    'value': {},
    'name': {
      default: 'password',
    },
    'hint': {},
    'error': {},
    'errors': {},
    'rules': {},
    'required': {},
    'counter': {},
    'min': {},
    'max': {},
  },

  data() {
    return {
      pwMeter: {},
    };
  },

  computed: {

    hasFeedback() {
      return this.pwMeter
        && this.pwMeter.feedback
        && this.value
    },
    pwHint() {
      if ( ! this.hasFeedback )
        return 'Please enter your password';

      var f = this.pwMeter.feedback

      return (f.warning ? f.warning + ' ' : '')
        + f.suggestions.join(' ');
    },
    indicatorValue() {
      if ( ! this.hasFeedback )
        return 0;

      return (this.pwMeter.guesses_log10 * 10);
    },
    indicatorColor() {
      if ( ! this.hasFeedback )
        return 'blue-grey--text';

      if (this.pwMeter.guesses_log10 >= 8)
        return 'green--text';
      if (this.pwMeter.guesses_log10 >= 6)
        return 'orange--text';
      if (this.pwMeter.guesses_log10 >= 4)
        return 'yellow--text';
      if (this.pwMeter.guesses_log10 >= 0)
        return 'red--text';

      return 'blue-grey--text';
    },
  },

  methods: {
    blur(value) {
      this.$emit('blur', value);
    },
    onPasswordInput(value) {
      this.value = value;

      if (typeof zxcvbn == 'function')
        this.pwMeter = zxcvbn(value);

      this.$emit('input', value);
    }
  }

}
</script>
