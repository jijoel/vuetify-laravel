<template>
  <v-app v-cloak>
    <v-navigation-drawer persistent dark :mini-variant.sync="mini" v-model="drawer">

      <v-list class="pa-0">
        <v-list-item>
          <v-list-tile avatar tag="div">
            <v-list-tile-avatar>
              <a href="/">
                <img :src="icon" />
              </a>
            </v-list-tile-avatar>
            <v-list-tile-content>
              <v-list-tile-title>{{ name }}</v-list-tile-title>
            </v-list-tile-content>
            <v-list-tile-action>
              <v-btn icon @click.native.stop="mini = !mini">
                <v-icon>chevron_left</v-icon>
              </v-btn>
            </v-list-tile-action>
          </v-list-tile>
        </v-list-item>
      </v-list>

      <v-list class="pt-0" dense>
        <v-divider></v-divider>
        <v-list-item v-for="item in items" :key="item">
          <v-list-tile active :href="item.uri" ripple>
            <v-list-tile-action>
              <v-icon light>{{ item.icon }}</v-icon>
            </v-list-tile-action>
            <v-list-tile-content>
              <v-list-tile-title>{{ item.title }}</v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>
        </v-list-item>
      </v-list>

    </v-navigation-drawer>

    <v-toolbar fixed class="indigo darken-4" light>
      <v-toolbar-side-icon light @click.native.stop="drawer = !drawer"></v-toolbar-side-icon>
      <v-toolbar-title>{{ name }}</v-toolbar-title>
    </v-toolbar>

    <main>
      <v-container fluid>

        <slot></slot>

      </v-container>
    </main>
  </v-app>
</template>


<script>
  export default {
    props: {
      icon: {
        accept: String,
        default: '/img/v.png',
      },
      name: {
        accept: String,
        default: 'Vuetify Laravel',
      },
    },
    data () {
      return {
        drawer: true,
        items: [
          { title: 'Users', icon: 'person', uri: '/users' },
          { title: 'About', icon: 'question_answer', uri: '/about' }
        ],
        mini: false,
        right: null
      }
    }
  }
</script>
