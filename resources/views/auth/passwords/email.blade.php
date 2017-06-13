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

          <va-email-control
            required
            name="email"
            v-model="form.email"
            :error="check.error('email')"
            :rules="check.text('email')"
            @input="check.reset('email')"
            @blur="check.refresh('email')"
          >
          </va-email-control>

        </v-container>
      </v-card-row>

      <v-card-row actions>
        <v-btn type="submit" primary light class="mx-3 mb-2">
          Send Password Reset Link
        </v-btn>
      </v-card-row>

    </v-card>


@endSection


@section('js')
<script>
  var app = new Vue({
    el: '#app',

    data: function() {
      return {
        form: {
          email: old['email'],
        },

        check: new FormRules({}, {},{}),
      };
    },

    created: function() {
      this.check = new FormRules(
          this.form,
          {
            email: 'required|email',
          },
          errors
        );
    },

  });
</script>
@endSection
