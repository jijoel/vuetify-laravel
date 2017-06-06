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

<v-container fluid>
    <v-layout row wrap justify-center>

    <v-card
      v-for="(item,i) in carousel"
      height="300px"
      style="width:400px"
      class="ma-1"
    >
      <v-card-row class="primary" height="60px">
        <v-card-title class="white--text">
          @{{ item.title }}
        </v-card-title>
      </v-card-row>
      <v-card-row :img="item.picture" height="180px">
        <v-card-text class="white--text">
          @{{ item.text }}
        </v-card-text>
      </v-card-row>
      <v-card-row actions height="60px">
        <v-spacer></v-spacer>
        <v-btn primary light>Do Something</v-btn>
        <v-spacer></v-spacer>
      </v-card-row>
    </v-card>


  </v-layout>
</v-container>

@endSection


@section('data')
<script>
    var data = {
        carousel: [
          {
            title: 'Squirrel!!!',
            picture: '/img/carousel/squirrel.jpg',
            text: 'Itaque tenetur nemo nobis quidem dolores provident quaerat ut veritatis, repellat quam, fugiat perferendis soluta excepturi consectetur eos cum aliquid cumque facilis.',
          },
          {
            title: 'Second',
            picture: '/img/carousel/sky.jpg',
            text: 'Quae fugit rem, dignissimos voluptatem praesentium impedit officiis laudantium voluptatum nobis, aliquid quos temporibus, eaque. Ducimus ipsa quo, maiores sequi similique quaerat. Accusantium quia, dolores. Adipisci eligendi, nobis nisi architecto a dolorem quod animi in est quae modi sint dolores quasi doloribus aut fugiat.',
          },
          {
            title: 'Third',
            picture: '/img/carousel/bird.jpg',
            text: 'Soluta, eaque repellendus, possimus consectetur quia ipsum voluptate, nam voluptates nostrum repellat commodi aliquid eos harum deleniti rerum! Asperiores culpa fuga, id.',
          },
          {
            title: '',
            picture: '/img/carousel/planet.jpg',
            text: 'Aliquam rerum, voluptatum doloribus voluptatem aspernatur voluptates?',
          },
        ],
    };
</script>
@endSection
