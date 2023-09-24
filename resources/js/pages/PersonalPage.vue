<script setup lang="ts">
import {useAuthStore} from '@/store/storeAuth'
import CreatePost from '@/components/CreatePost.vue';

const auth = useAuthStore()
</script>

<template>
  <v-banner>
    <v-list>
      <v-list-item>
        <v-list-item-title>
          Имя
        </v-list-item-title>
        <v-list-item-subtitle>
          {{ auth.user?.name }}
        </v-list-item-subtitle>
        <v-list-item-title>
          Email
        </v-list-item-title>
        <v-list-item-subtitle>
          {{ auth.user?.email }}
        </v-list-item-subtitle>
        <v-list-item-title>
          Дата создания аккаунта
        </v-list-item-title>
        <v-list-item-subtitle>
          {{ auth.user && new Date(auth.user?.created_at.toString()) }}
        </v-list-item-subtitle>
      </v-list-item>
    </v-list>
  </v-banner>
  <div>
    <CreatePost/>
  </div>
</template>