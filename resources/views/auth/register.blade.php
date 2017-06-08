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
            v-model="name"
            label="Name"
            prepend-icon="person"
            required
            autofocus
          ></v-text-field>

          <v-text-field
            name="email"
            v-model="email"
            label="Email Address"
            prepend-icon="email"
            :rules="[() => errors['email'] ? errors['email'].join() : '']"
            required
          ></v-text-field>

          <v-text-field
            name="password"
            label="Password"
            v-model="password"
            prepend-icon="lock"
            hint="Please enter at least 6 characters"
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
            prepend-icon="lock"
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
</script>
@endSection
