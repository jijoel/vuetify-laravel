@extends('layouts.dialog-only')

@section('content')

  <form action="{{ route('register') }}" method="post" role="form">
    <v-card>

      <v-card-row class="primary">
        <v-card-title class="white--text">
          Register
        </v-card-title>
      </v-card-row>

      <v-card-row>
        <v-container fluid>
          {{ csrf_field() }}

          <v-text-field
            required
            autofocus
            name="name"
            label="Name"
            v-model="form.name"
            prepend-icon="person"
            hint="Please enter your name"
            :error="check.error('name')"
            :rules="check.text('name')"
            @input="check.reset('name')"
            @blur="check.refresh('name')"
          ></v-text-field>

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

          <va-new-password-control
            required
            name="password"
            v-model="form.password"
            :error="check.error('password')"
            :rules="check.text('password')"
            @input="check.reset('password')"
            @blur="check.refresh('password')"
          >
          </va-new-password-control>

          <va-password-control
            required
            name="password_confirmation"
            label="Password Confirmation"
            v-model="form.password_confirmation"
            :error="check.error('password')"
            :rules="check.text('password')"
            @input="check.refresh('password')"
          ></v-text-field>

        </v-container>
      </v-card-row>

      <v-card-row actions>
        <v-btn type="submit" primary light class="mx-3 mb-2">
          Register
        </v-btn>
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
          name: old['name'],
          email: old['email'],
          password: '',
          password_confirmation: '',
        },
        check: new FormRules({}, {},{}),
      };
    },

    created: function() {
      this.check = new FormRules(
          this.form,
          {
            name: 'required|string',
            email: 'required|email',
            password: 'required|string|min:8|confirmed',
          },
          errors
        );
    },

  });
</script>
<script type="text/javascript" src="/js/zxcvbn.js"></script>
@endSection

