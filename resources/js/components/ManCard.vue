<script setup lang="ts">
import router from '@/router';
import axios from 'axios';
import { onMounted } from 'vue';
import { ref } from 'vue';

const props = defineProps({
  id: Number,
  name: String,
  createdAt: String,
  isFollowed: Boolean
})

const isFollow = ref(false)

const follow = () => {
  axios.get(`/api/users/${props.id}/follow`).then(res => isFollow.value = res.data.attached.length > 0 )
}

onMounted(() => {
  isFollow.value = props.isFollowed
})

</script>

<template>
  <div class="my-5" style="border-bottom: 2px solid purple;">
    <h1 style="cursor: pointer;" @click="router.push(`user/${props.id}`)">{{ props.id }}</h1>
    <p>{{ props.name }}</p>
    <p>{{ props.createdAt }}</p>
    <v-btn :color="isFollow ? '#AED2FF' : '#9400FF'" @click="follow">{{isFollow ? 'Отмена подписки' : 'Подписаться'}}</v-btn>
  </div>
</template>