<script setup lang="ts">
import { ref, onMounted } from 'vue';
import TheHeader from '@/components/TheHeader.vue';
import TheNav from '@/components/TheNav.vue';
import { useAuthStore } from '@/store/storeAuth';

const auth = useAuthStore() 
const activeModal = ref(false)
const handleModal = () => activeModal.value = !activeModal.value

onMounted(() => {
  auth.getUser()
})

</script>

<template>
  <TheHeader :handleModal="handleModal"/>
  <TheNav v-if="activeModal"/>
  <main>
    <router-view />
  </main>
</template>