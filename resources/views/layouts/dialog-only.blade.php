@extends('layouts.master')

@section('body')

  <v-toolbar fixed class="indigo darken-4" light>
    <v-toolbar-title>
      {{ config('app.name', 'Laravel') }}
    </v-toolbar-title>
    <v-spacer></v-spacer>
    <va-btn primary light href="{{ route('login') }}">
      Login
    </va-btn>
    <va-btn primary light href="{{ route('register') }}">
      Register
    </va-btn>
  </v-toolbar>

  <main>

    <v-container fluid class="mt-5">
      <v-layout row justify-center>
        <v-flex xs12 sm8 md6 lg4>

          @yield('content')

        </v-flex>
      </v-layout>
    </v-container>

  </main>

@endSection
