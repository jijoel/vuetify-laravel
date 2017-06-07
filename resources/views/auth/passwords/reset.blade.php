@extends('layouts.simple')

@section('content')

<v-container fluid>
  <v-layout row justify-center>
    <v-flex md6>

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
                v-model="email"
                label="Email Address"
                :rules="[() => errors['email'] ? errors['email'].join() : '']"
                required
              ></v-text-field>

              <v-text-field
                name="password"
                label="Password"
                hint="Please enter at least 6 characters"
                v-model="password"
                :append-icon="hidden ? 'visibility' : 'visibility_off'"
                :append-icon-cb="() => (hidden = !hidden)"
                :type="hidden ? 'password' : 'text'"
                required
                counter
                min="6"
                max="60"
              ></v-text-field>

              <v-text-field
                name="password_confirmation"
                label="Password Confirmation"
                v-model="password2"
                :append-icon="hidden2 ? 'visibility' : 'visibility_off'"
                :append-icon-cb="() => (hidden2 = !hidden2)"
                :type="hidden2 ? 'password' : 'text'"
                required
              ></v-text-field>

            </v-container>
          </v-card-row>

          <v-card-row actions>
            <v-btn type="submit" primary light class="mx-3 mb-2">
              Reset Password
            </v-btn>
          </v-card-row>

        </v-card>

    </v-flex>
  </v-layout>
</v-container>

@endSection


@section('data')
<script>
  var data = {
    email: "{{ old('email') }}",
    password: '',
    password2: '',
    hidden: true,
    hidden2: true,
  };
  var errors = '{!! $errors->toJson() !!}';
</script>
@endSection
