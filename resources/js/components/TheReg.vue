<script setup lang="ts">
import { ref } from 'vue';
import {useAuthStore} from '@/store/storeAuth'

const auth = useAuthStore()
const reg = ref({
  email: '',
  name: '',
  password: '',
  password_confirmation: ''
})

const handleReg = () => {
  auth.registration(reg.value)
}
</script>

<template>
  <v-col>
    <v-text-field
      label="Email"
      hide-details
      required
      v-model="reg.email"
    ></v-text-field>
    <v-text-field
      class="mt-5"
      label="Nickname"
      hide-details
      required
      v-model="reg.name"
    ></v-text-field>
    <v-text-field
      class="mt-5"
      label="Password"
      hide-details
      required
      type="password"
      v-model="reg.password"
    ></v-text-field>
    <v-text-field
      class="mt-5"
      label="Repeat Password"
      hide-details
      required
      type="password"
      v-model="reg.password_confirmation"
    ></v-text-field>
    <v-btn 
      color="#AED2FF" 
      block 
      class="mt-5"
      @click="handleReg"
    >
    
    Зарегистрироваться
    </v-btn>
  </v-col>
</template>