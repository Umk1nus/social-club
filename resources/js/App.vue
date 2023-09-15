<script setup lang="ts">
</script>

<template>
  <nav>
    <router-link to="/">Home</router-link> | <router-link to="/about">About</router-link>
  </nav>
  <main>
    <router-view />
  </main>
</template>