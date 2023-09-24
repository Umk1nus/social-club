<script setup lang="ts">
import PostCard from '@/components/PostCard.vue';
import router from '@/router';
import axios from 'axios';
import { Ref } from 'vue';
import { ref } from 'vue';
import { onMounted } from 'vue';

type TMan = {
  name: string,
  created_at: string
}

type TPost = {
  title: string;
  body: string;
  image: string;
  created_at: string;
}

const user: Ref<TMan> = ref({
  name: '',
  created_at: ''
})

const path = router.currentRoute.value.params

const posts: Ref<TPost[]> = ref([])

onMounted(() => {
  axios.get(`/api/users/${path.id}`).then(res => {
    user.value = res.data
    axios.get(`/api/users/${path.id}/posts`).then( res => posts.value = res.data.data)
  })
})
</script>

<template>
  <v-banner>
    <v-list>
      <v-list-item>
        <v-list-item-title>
          Имя
        </v-list-item-title>
        <v-list-item-subtitle>
          {{ user?.name }}
        </v-list-item-subtitle>
        <v-list-item-title>
          Дата создания аккаунта
        </v-list-item-title>
        <v-list-item-subtitle>
          {{ new Date(user?.created_at.toString()) }}
        </v-list-item-subtitle>
      </v-list-item>
    </v-list>
  </v-banner>
  <v-col v-if="posts.length">
    <PostCard v-for="post in posts"
      :title="post.title" 
      :body="post.body" 
      :created-at="post.created_at"
      :image="post.image"
    />
  </v-col>
  <div class="mt-10" style="text-align: center;" v-else>Нет постов</div>
</template>