<script setup lang="ts">
import router from '@/router';

const props = defineProps({
  id: Number,
  name: String,
  createdAt: String
})
</script>

<template>
  <div class="my-5" style="border-bottom: 2px solid purple;">
    <h1 style="cursor: pointer;" @click="router.push(`user/${props.id}`)">{{ props.id }}</h1>
    <p>{{ props.name }}</p>
    <p>{{ props.createdAt }}</p>
  </div>
</template>