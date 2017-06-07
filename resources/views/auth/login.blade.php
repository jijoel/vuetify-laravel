@extends('layouts.simple')

@section('content')

<v-container fluid class="mt-5">
  <v-layout row justify-center>
    <v-flex xs12 sm8 md6 lg4>

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
                required
              ></v-text-field>

              <v-text-field
                name="password"
                label="Password"
                v-model="password"
                :append-icon="hidden ? 'visibility' : 'visibility_off'"
                :append-icon-cb="() => (hidden = !hidden)"
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

          <v-card-row actions>
            <v-btn type="submit" primary light class="mx-3">
              Login
            </v-btn>
            <va-btn href="{{ route('password.request') }}">
              Forgot Your Password?
            </va-btn>
          </v-card-row>

        </v-card>
      </form>

    </v-flex>
  </v-layout>
</v-container>

@endsection


@section('data')
<script>
  var data = {
    email: '',
    password: '',
    hidden: true,
    remember: false,
    favorite: false,
  }
</script>
@endSection
