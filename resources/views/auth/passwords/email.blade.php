@extends('layouts.dialog-only')

@section('content')

  <form action="{{ route('password.email') }}" method="post" role="form">
    <v-card>

      <v-card-row class="primary">
        <v-card-title class="white--text">
          Reset Password
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
            :error="errors.has('email')"
            :rules="[() => errors.get('email')]"
            required
            @input="errors.clear()"
          ></v-text-field>

        </v-container>
      </v-card-row>

      <v-card-row actions>
        <v-btn type="submit" primary light class="mx-3 mb-2">
          Send Password Reset Link
        </v-btn>
      </v-card-row>

    </v-card>


@endSection


@section('data')
<script>
  var app_data = {
    form: {
      email: "{{ old('email') }}",
    },
    rules: {
      email: 'required|string|email',
    }
  };
</script>
@endSection

