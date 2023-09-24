import { createRouter, createWebHistory } from 'vue-router';
import HomePage from '@/pages/HomePage.vue';
import AboutPage from '@/pages/AboutPage.vue';
import PersonalPage from '@/pages/PersonalPage.vue';
import PeoplePage from '@/pages/PeoplePage.vue';
import UserPageVue from '@/pages/UserPage.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomePage
    },
    {
      path: '/about',
      name: 'about',
      component: AboutPage
    },
    {
      path: '/people',
      name: 'people',
      component: PeoplePage
    },
    {
      path: '/user/:id',
      name: 'userPage',
      component: UserPageVue
    },
    {
      path: '/personal',
      name: 'personal',
      component: PersonalPage
    },
  ]
})

export default router