@extends('layouts.dialog-only')

@section('content')

  <form action="{{ route('login') }}" method="post" role="form">
    <v-card>

      <v-card-row class="primary">
        <v-card-title class="white--text">
          Login
        </v-card-title>
      </v-card-row>

      <v-card-row>
        <v-container fluid>

          {{ csrf_field() }}

          <va-email-control
            required
            name="email"
            v-model="form.email"
            :error="check.error('email')"
            :rules="check.text('email')"
            @input="check.reset('email')"
            @blur="check.refresh('email')"
          >
          </va-email-control>

          <va-password-control
            required
            name="password"
            v-model="form.password"
            :error="check.error('password')"
            :rules="check.text('password')"
            @input="check.refresh('password')"
          ></v-text-field>

          <v-checkbox
            name="remember"
            label="Remember Me"
            v-model="form.remember"
            primary
          ></v-checkbox>

        </v-container>
      </v-card-row>

      <v-card-row actions wrap>
        <v-btn type="submit" primary light class="mx-3">
          Login
        </v-btn>
        <va-btn href="{{ route('password.request') }}">
          Forgot Your Password?
        </va-btn>
      </v-card-row>

    </v-card>
  </form>

@endsection


@section('js')
<script>
  var app = new Vue({
    el: '#app',

    data: function() {
      return {
        form: {
          email: old['email'],
          password: '',
          remember: false,
          hidden: true,
        },

        check: new FormRules({}, {},{}),
      };
    },

    created: function() {
      this.check = new FormRules(
          this.form,
          {
            email: 'required|email',
            password: 'required|string',
          },
          errors
        );
    },

  });
</script>
@endSection

