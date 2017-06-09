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
            :append-icon="form.hidden ? 'visibility' : 'visibility_off'"
            :append-icon-cb="() => (hidden = !hidden)"
            :type="form.hidden ? 'password' : 'text'"
            :error="errors.has('password')"
            required
            @input="errors.clear()"
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


@section('data')
<script>
  var app_data = {
    form: {
      email: '{{ old("email") }}',
      password: '',
      remember: false,
      hidden: true,
    },
    rules: {
      email: 'required|email',
    },
  };
</script>
@endSection
