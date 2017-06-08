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
            v-model="email"
            label="Email Address"
            prepend-icon="mail"
            :error="errors['email'] ? true : false"
            :rules="[() => errors['email'] ? errors['email'].join() : '']"
            required
          ></v-text-field>

          <v-text-field
            name="password"
            label="Password"
            v-model="password"
            prepend-icon="lock"
            :append-icon="hidden ? 'visibility' : 'visibility_off'"
            :append-icon-cb="() => (hidden = !hidden)"
            :error="errors['password'] ? true : false"
            :rules="[() => errors['password'] ? errors['password'].join() : '']"
            :type="hidden ? 'password' : 'text'"
            required
          ></v-text-field>

          <v-checkbox
            name="remember"
            label="Remember Me"
            v-model="remember"
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
  var data = {
    email: '{{ old("email") }}',
    password: '',
    hidden: true,
    remember: false,
    favorite: false,
  };
</script>
@endSection
