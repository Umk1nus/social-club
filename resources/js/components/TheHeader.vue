<script lang="ts" setup>
import router from '@/router';
import { useAuthStore } from '@/store/storeAuth';

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
      <router-link to="/about" class="ml-5">About</router-link>
      <v-btn
        class="ml-5 rounded-lg"
        color="#9400FF"
        @click="router.push('/personal')"
      >
        <v-icon
          start
          icon="mdi-account"
        ></v-icon>
          Кабинет
      </v-btn>
      <v-btn
        class="ma-2 rounded-lg"
        color="#9400FF"
        @click="auth.logout()"
      >
        <v-icon
          start
          icon="mdi-arrow-left"
        ></v-icon>
          Выйти
      </v-btn>
    </div>
  </header>
</template>