<script setup lang="ts">
import { ref } from 'vue';
import TheHeader from '@/components/TheHeader.vue';
import TheNav from '@/components/TheNav.vue';

const activeModal = ref(false)
const handleModal = () => activeModal.value = !activeModal.value

</script>

<template>
  <TheHeader :handleModal="handleModal"/>
  <TheNav v-if="activeModal"/>
  <main>
    <router-view />
  </main>
</template>