@extends('layouts.dialog-only')

@section('content')

<form action="{{ route('password.request') }}" method="post" role="form">
  <v-card>

    <v-card-row class="primary">
      <v-card-title class="white--text">
        Reset Password
      </v-card-title>
    </v-card-row>

    <v-card-row>
      <v-container fluid>
        {{ csrf_field() }}
        <input type="hidden" name="token" value="{{ $token }}">

          <v-text-field
            name="email"
            type="email"
            v-model="form.email"
            label="Email Address"
            prepend-icon="mail"
            :error="errors.has('email')"
            :rules="[() => errors.get('email')]"
            required
            @input="errors.clear()"
          ></v-text-field>

          <v-text-field
            name="password"
            label="Password"
            v-model="form.password"
            prepend-icon="lock"
            hint="Please enter at least 6 characters"
            :append-icon="form.hidden ? 'visibility' : 'visibility_off'"
            :append-icon-cb="() => (hidden = !hidden)"
            :type="form.hidden ? 'password' : 'text'"
            :error="errors.has('password')"
            :rules="[() => errors.get('password')]"
            required
            counter
            min="6"
            max="60"
            @input="errors.clear('password')"
          ></v-text-field>

          <v-text-field
            name="password_confirmation"
            label="Password Confirmation"
            v-model="form.password2"
            prepend-icon="lock"
            :append-icon="form.hidden2 ? 'visibility' : 'visibility_off'"
            :append-icon-cb="() => (hidden2 = !hidden2)"
            :type="form.hidden2 ? 'password' : 'text'"
            :error="errors.has('password_confirmation')"
            :rules="[() => errors.get('password_confirmation')]"
            required
            @input="errors.clear('password_confirmation')"
          ></v-text-field>

      </v-container>
    </v-card-row>

    <v-card-row actions>
      <v-btn type="submit" primary light class="mx-3 mb-2">
        Reset Password
      </v-btn>
    </v-card-row>

  </v-card>

@endSection


@section('data')
<script>
  var app_data = {
    form: {
      email: "{{ old('email') }}",
      password: '',
      password2: '',
      hidden: true,
      hidden2: true,
      email: "{{ old('email') }}",
    },
    rules: {
      email: 'required|string|email',
    }
  };

</script>
@endSection
