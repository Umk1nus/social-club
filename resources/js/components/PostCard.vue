<script setup lang="ts">
const props = defineProps({
  title: String,
  body: String,
  image: String,
  createdAt: String
})
</script>

<template>
  <div>
    <h1>{{ props.title }}</h1>
    <p>{{ props.body }}</p>
    <v-img v-if="props.image" :src="props.image" style="height: 250px;"/>
    <p>{{props.createdAt}}</p>
  </div>
</template>