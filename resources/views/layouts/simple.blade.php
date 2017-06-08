@extends('layouts.master')

@section('body')

  <v-toolbar fixed class="indigo darken-4" light>
    <v-toolbar-title>
      <a href="/">
        {{ config('app.name', 'Laravel') }}
      </a>
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
    @yield('content')
  </main>

@endSection
