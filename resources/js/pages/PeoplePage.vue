<script setup lang="ts">
import { ref, Ref } from 'vue';
import ManCard from '@/components/ManCard.vue';
import { onMounted } from 'vue';
import axios from 'axios';

type TMan = {
  id: number,
  name: string,
  created_at: string,
  is_followed: boolean,
}

const people:Ref<TMan[]> = ref([])

onMounted(() => {
  axios.get('/api/users').then(res => people.value = res.data.data)
})

</script>

<template>
  <v-col>
    <ManCard
      v-for="man in people" 
      :id="man.id"
      :name="man.name"
      :created-at="man.created_at"
      :is-followed="man.is_followed"
    />
  </v-col>
</template>