<script setup lang="ts">
import axios from 'axios';
import { onUpdated } from 'vue';
import { onMounted, ref } from 'vue';

const props = defineProps({
  id: Number,
  title: String,
  body: String,
  image: String,
  createdAt: String,
  isLiked: Boolean
})

const isLiked = ref(false)

const like = () => {
  axios.post(`/api/posts/${props.id}/like`).then(res => isLiked.value = res.data.attached.length > 0 )
}

onMounted(() => {
  isLiked.value = props.isLiked
})

onUpdated(() => {
  isLiked.value = props.isLiked
})
</script>

<template>
  <div class="mb-10">
    <h1>{{ props.title }}</h1>
    <p>{{ props.body }}</p>
    <v-img v-if="props.image" :src="props.image" style="height: 250px;"/>
    <v-row>
      <p>{{props.createdAt}}</p>
      <v-btn :color="isLiked ? '#AED2FF' : '#9400FF'" :icon="isLiked ? 'mdi-heart' : 'mdi-heart-outline' " @click="like"></v-btn>
    </v-row>
  </div>
</template>