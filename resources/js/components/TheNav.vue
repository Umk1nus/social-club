<script setup lang="ts">
import { ref } from 'vue';
import TheAuth from '@/components/TheAuth.vue';
import TheReg from '@/components/TheReg.vue';

enum TabModal {
  Auth = 'AUTH',
  Reg = 'REG'
}

const tabModal = ref(TabModal.Auth)

const handleTab = () => tabModal.value = tabModal.value === TabModal.Auth ? TabModal.Reg : TabModal.Auth

</script>

<template>
  <v-card style="z-index: 999;">
    <v-layout>
      <v-navigation-drawer
        style="background-color: #9400FF;"
        theme="dark"
        width="400"
        permanent
      >
        <div class="pa-5">
          <h2>{{ tabModal === TabModal.Auth ? 'Вход' : 'Регистрация' }}</h2>
          <TheAuth v-if="tabModal === TabModal.Auth"/>
          <TheReg v-else/>
          <p style="text-align: center;">{{ tabModal === TabModal.Auth ? 'Нет аккаунта ?' : 'Есть аккаунт ?' }} <span style="font-weight: 700; cursor: pointer;" @click="handleTab">{{ tabModal === TabModal.Auth ? 'Зарегистрироваться' : 'Войти' }}</span></p>
        </div>
      </v-navigation-drawer>
    </v-layout>
  </v-card>
</template>