import { ref, type Ref } from 'vue'
import { defineStore } from 'pinia'
import axios from 'axios';

type Post = {
  id: number,
  title: string;
  body: string;
  image: string;
  created_at: string;
}

export const usePostsStore = defineStore('posts', () => {
  const posts = ref<Post[]| null>(null)

  return {
    posts,
  }
})