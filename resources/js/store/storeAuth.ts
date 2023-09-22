import { ref, type Ref } from 'vue'
import { defineStore } from 'pinia'
import axios from 'axios';

type User = {
  id: number,
  name: string;
  email: string
}

type Credentials = {
  email: string,
  password: string
}

type Registration = {
  email: string,
  password: string,
  name: string,
  password_confirmation: string
}

export const useAuthStore = defineStore('auth', () => {
  const user = ref<User| null>(null)

  const getUser = () => {
    axios.get('/sanctum/csrf-cookie').then(_ => {
      axios.get('/api/user').then(res => user.value = res.data)
    })
  }

  const login = (credentials: Credentials) => {
    axios.get('/sanctum/csrf-cookie').then(_ => {
      axios.post('/login', {email: credentials.email, password: credentials.password}).then(_ =>  {
        axios.get('/api/user').then(res => user.value = res.data as User)
      })
    })
  }

  const registration = (registration: Registration) => {
    axios.get('/sanctum/csrf-cookie').then(_ => {
      axios.post('/register', {
        email: registration.email, 
        password: registration.password, 
        password_confirmation: registration.password_confirmation,
        name: registration.name}).then(_ => {
          getUser()
        })
    })
  }

  const logout = () => {
    axios.post('/logout').then(_ => {
      user.value = null
    })
  }

  return {
    user,
    login,
    logout,
    registration,
    getUser
  }
})