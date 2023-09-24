<script setup lang="ts">
import axios from 'axios';
import { ref, Ref } from 'vue';

type TFormPost = {
  title: string;
  body: string;
  image: any
}

const formPost: Ref<TFormPost> = ref({
  title: '',
  body: '',
  image: ''
})

const addPost = () => {
  axios.post('/api/posts', {
    title: formPost.value.title, 
    body: formPost.value.body,
    image: formPost.value.image,
  }).then(res => console.log(res))
}

const changeImage = (file: any) => {
  if (!file) return

  const reader = new FileReader()
  reader.onload = e => {
    formPost.value.image = e.target?.result
  }
  reader.readAsDataURL(file.target?.files[0])
}

</script>

<template>
  <v-col>
    <v-text-field
      label="Заголовок"
      hide-details
      required
      v-model="formPost.title"
    ></v-text-field>
    <v-text-field
      class="mt-5"
      label="Текст"
      hide-details
      required
      v-model="formPost.body"
    ></v-text-field>
    <v-img v-if="formPost.image" :src="(formPost.image as string)" style="height: 300px;" class="my-5"/>
    <v-file-input
      accept="image/png, image/jpeg"
      label="Добавить изображение"
      @change="changeImage"
      @click:clear="formPost.image = ''"
    >
    </v-file-input>
    <v-btn 
      color="#AED2FF" 
      block 
      class="mt-5"
      @click="addPost"
    >
    Добавить
    </v-btn>
  </v-col>
</template>