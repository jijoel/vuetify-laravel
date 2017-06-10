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
            name="name"
            v-model="form.name"
            label="Name"
            prepend-icon="person"
            :error="check.error('name')"
            :rules="check.text('name')"
            hint="Please enter your name"
            required
            autofocus
            @input="check.reset('name')"
            @blur="check.refresh('name')"
          ></v-text-field>

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
            counter
            min="6"
            max="60"
            @input="check.reset('password')"
            @blur="check.refresh('password')"
          ></v-text-field>

          <v-text-field
            name="password_confirmation"
            label="Password Confirmation"
            v-model="form.password_confirmation"
            prepend-icon="lock"
            :append-icon="form.hidden2 ? 'visibility' : 'visibility_off'"
            :append-icon-cb="() => (form.hidden2 = !form.hidden2)"
            :type="form.hidden2 ? 'password' : 'text'"
            :error="check.error('password')"
            :rules="check.text('password')"
            required
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
          password2: '',
          hidden: true,
          hidden2: true,
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
            password: 'required|string|min:6|confirmed',
          },
          errors
        );
    },

  });
</script>
@endSection

