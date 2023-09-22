<script setup lang="ts">
import { ref } from 'vue';
import {useAuthStore} from '@/store/storeAuth'

const auth = useAuthStore()

const formAuth = ref({
  email: '',
  password: ''
})

const handleAuth = () => {
  auth.login(formAuth.value)
}
</script>

<template>
  <v-col>
    <v-text-field
      label="Email"
      hide-details
      required
      v-model="formAuth.email"
    ></v-text-field>
    <v-text-field
      class="mt-5"
      label="Password"
      hide-details
      required
      type="password"
      v-model="formAuth.password"
    ></v-text-field>
    <v-btn 
      color="#AED2FF" 
      block 
      class="mt-5"
      @click="handleAuth"
    >
    Войти
    </v-btn>
  </v-col>
</template>