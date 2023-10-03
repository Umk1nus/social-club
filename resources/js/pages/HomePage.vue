<script setup lang="ts">
import axios from 'axios';
import PostCard from '@/components/PostCard.vue';
import { onMounted, ref } from 'vue';
import { Ref } from 'vue';

type Post = {
  id: number,
  title: string;
  body: string;
  image: string;
  created_at: string;
  is_liked: boolean;
}

enum CurrentValue {
  Me = 'ME',
  Users = 'USERS'
}

const posts: Ref<Post[]> = ref([]);

const valueCurrentPost: Ref<CurrentValue> = ref(CurrentValue.Me)

onMounted(() => {
  axios.get('/api/posts').then(res => posts.value = res.data.data)
})

const toggleCurrentPost = (value: CurrentValue) => {

  valueCurrentPost.value = value

  if (valueCurrentPost.value === CurrentValue.Me) {
    axios.get('/api/posts').then(res => posts.value = res.data.data)
  } else if (valueCurrentPost.value === CurrentValue.Users) {
    axios.get('/api/posts/follow').then(res => posts.value = res.data.data)
  }
}

</script>

<template>
  <v-row class="mb-10">
    <v-btn 
      @click="valueCurrentPost !== CurrentValue.Me && toggleCurrentPost(CurrentValue.Me)" 
      :color="valueCurrentPost === CurrentValue.Me ? '#AED2FF' : '#9400FF'"
    >
      Мои посты
    </v-btn>
    <v-btn 
    @click="valueCurrentPost !== CurrentValue.Users && toggleCurrentPost(CurrentValue.Users)" 
      :color="valueCurrentPost === CurrentValue.Users ? '#AED2FF' : '#9400FF'"
    >
      Новости
    </v-btn>
  </v-row>
  <v-banner v-if="!posts.length" color="red">На данный момент нет постов</v-banner>
  <v-col v-else>
    <PostCard v-for="post in posts"
      :title="post.title" 
      :body="post.body" 
      :created-at="post.created_at"
      :image="post.image"
      :id="post.id"
      :is-liked="post.is_liked"
    />
  </v-col>
</template>