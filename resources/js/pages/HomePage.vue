<script setup lang="ts">
import {useAuthStore} from '@/store/storeAuth'

const auth = useAuthStore()
</script>

<template>
  <v-banner color="red">{{ auth.user }}</v-banner>
</template>