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
            :error="errors.has('name')"
            :rules="[() => errors.get('name')]"
            hint="Please enter your name"
            required
            autofocus
            @input="errors.clear('name')"
          ></v-text-field>

          <v-text-field
            name="email"
            type="email"
            v-model="form.email"
            label="Email Address"
            prepend-icon="mail"
            :error="errors.has('email')"
            :rules="[() => errors.get('email')]"
            required
            @input="errors.clear('email')"
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
            :append-icon-cb="() => (form.hidden2 = !form.hidden2)"
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
          Register
        </v-btn>
      </v-card-row>

    </v-card>
  </form>

@endsection


@section('data')
<script>
  var app_data = {
    form: {
      name: "{{ old('name') }}",
      email: "{{ old('email') }}",
      password: '',
      password2: '',
      hidden: true,
      hidden2: true,
    },
    rules: {
      name: 'required|string',
      email: 'required|email',
      password: 'required|string|min:6',
      password2: 'required|string|same:password',
    }
  };
</script>
@endSection
