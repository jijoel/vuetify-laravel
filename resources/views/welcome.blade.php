@extends('layouts.master')

@section('body')

<v-toolbar fixed class="indigo darken-4" light>
  <v-toolbar-title>{{ config('app.name', 'Laravel') }}</v-toolbar-title>
  <v-spacer></v-spacer>
  <va-btn primary light href="{{ route('login') }}">Login</va-btn>
  <va-btn primary light href="{{ route('register') }}">Register</va-btn>
</v-toolbar>

<v-carousel>
  <v-carousel-item v-for="(item,i) in items" v-bind:src="item.src" :key="i"></v-carousel-item>
</v-carousel>

@endSection


@section('data')
<script>
    var data = {
        items: [
          { src: '/img/carousel/squirrel.jpg' },
          { src: '/img/carousel/sky.jpg' },
          { src: '/img/carousel/bird.jpg' },
          { src: '/img/carousel/planet.jpg' },
        ],
    };
</script>
@endSection
