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

          <v-text-field
            name="email"
            type="email"
            v-model="form.email"
            label="Email Address"
            prepend-icon="mail"
            :error="check.error('email')"
            :rules="check.text('email')"
            required
            @input="check.reset('email')"
            @blur="check.refresh('email')"
          ></v-text-field>

          <v-text-field
            name="password"
            label="Password"
            v-model="form.password"
            prepend-icon="lock"
            hint="Please enter at least 6 characters"
            :append-icon="form.hidden ? 'visibility' : 'visibility_off'"
            :append-icon-cb="() => (form.hidden = !form.hidden)"
            :type="form.hidden ? 'password' : 'text'"
            :error="check.error('password')"
            :rules="check.text('password')"
            required
            @input="check.reset('password')"
            @blur="check.refresh('password')"
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

