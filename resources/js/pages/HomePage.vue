<script setup lang="ts">
import axios from 'axios';
import PostCard from '@/components/PostCard.vue';
import { onMounted, ref } from 'vue';
import { Ref } from 'vue';

type Post = {
  title: string;
  body: string;
  image: string;
  created_at: string;
}

const posts: Ref<Post[]> = ref([])

onMounted(() => {
  axios.get('/api/posts').then(res => posts.value = res.data.data)
  console.log(posts.value)
})
</script>

<template>
  <v-banner v-if="!posts.length" color="red">На данный момент нет постов</v-banner>
  <v-col v-else>
    <PostCard v-for="post in posts"
      :title="post.title" 
      :body="post.body" 
      :created-at="post.created_at"
      :image="post.image"
    />
  </v-col>
</template>