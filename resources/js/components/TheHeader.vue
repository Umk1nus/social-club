<script lang="ts" setup>
import { useAuthStore } from '@/store/storeAuth';
const props = defineProps({
  handleModal: Function,
})

const auth = useAuthStore() 
</script>

<template>
  <header class="header">
    <div class="header__logo">
      <v-icon
      end
      icon="mdi-account-group"
      size="x-large"
      ></v-icon>
      <h1 class="ml-2">Social Club</h1>
    </div>
    <div class="header__router">
      <router-link to="/">Home</router-link>
      <router-link to="/about">About</router-link>
      <v-btn
        class="ma-2 rounded-lg"
        color="#9400FF"
        @click="auth.user ? auth.logout() : props.handleModal && props.handleModal()"
      >
        <v-icon
          start
          :icon="auth.user ? 'mdi-arrow-left' : 'mdi-arrow-right'"
        ></v-icon>
          {{auth.user ? 'Выйти' : 'Войти'}}
      </v-btn>
    </div>
  </header>
</template>