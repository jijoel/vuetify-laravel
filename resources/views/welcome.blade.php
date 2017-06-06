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

<v-carousel>
  <v-carousel-item
    v-for="(item,i) in carousel"
    :src="item.picture"
    :key="i"
  >
    <div style="position:absolute;bottom:0;left:0;padding-bottom:1em" class="display-2 white--text">
      @{{ item.title }}
    </div>
  </v-carousel-item>
</v-carousel>

@endSection


@section('data')
<script>
    var data = {
        carousel: [
          {
            title: 'Squirrel!!!',
            picture: '/img/carousel/squirrel.jpg'
          },
          {
            title: 'Second',
            picture: '/img/carousel/sky.jpg'
          },
          {
            title: 'Third',
            picture: '/img/carousel/bird.jpg'
          },
          {
            title: '',
            picture: '/img/carousel/planet.jpg'
          },
        ],

        cards: [
          {
            'title': 'Foo',
            'body': 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet adipisci, nemo ipsa odio velit, cum, iure commodi modi fugit corporis dolore, maiores voluptatibus perspiciatis quod magnam impedit qui ex in!',
          }
        ],
    };
</script>
@endSection
