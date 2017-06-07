@extends('layouts.simple')

@section('content')

<v-container fluid class="mt-5">
  <v-layout row justify-center>
    <v-flex xs12 sm8 md6 lg4>

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
                v-model="name"
                label="Name"
                required
                autofocus
              ></v-text-field>

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
              Register
            </v-btn>
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
    name: "{{ old('name') }}",
    email: "{{ old('email') }}",
    password: '',
    password2: '',
    hidden: true,
    hidden2: true,
  };
  var errors = '{!! $errors->toJson() !!}';
</script>
@endSection
