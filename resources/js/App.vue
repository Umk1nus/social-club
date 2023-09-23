<script setup lang="ts">
import { ref, onBeforeMount } from 'vue';
import TheHeader from '@/components/TheHeader.vue';
import TheNav from '@/components/TheNav.vue';
import { useAuthStore } from '@/store/storeAuth';

const auth = useAuthStore() 

onBeforeMount(() => {
  auth.getUser()
})

</script>

<template>
  <TheHeader v-if="auth.user"/>
  <TheNav v-if="!auth.user"/>
  <main v-if="auth.user">
    <router-view />
  </main>
</template>