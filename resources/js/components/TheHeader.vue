<script lang="ts" setup>
const props = defineProps({
  handleModal: Function,
})
</script>

<template>
  <header class="header">
    <div class="header__logo">
      <v-icon
      end
      icon="mdi-account-group"
      size="x-large"
      color="primary"
      ></v-icon>
      <h1 class="ml-2">Social Club</h1>
    </div>
    <div class="header__router">
      <router-link to="/">Home</router-link>
      <router-link to="/about">About</router-link>
      <v-btn
        class="ma-2 rounded-lg"
        color="#9400FF"
        @click="props.handleModal && props.handleModal()"
      >
        <v-icon
          start
          icon="mdi-arrow-right"
        ></v-icon>
          Войти
      </v-btn>
    </div>
  </header>
</template>