import {
  createRouter,
  createWebHistory
} from "vue-router";

import Home from './pages/Home.vue'
import Post from './pages/Post.vue'

export default createRouter({
  history: createWebHistory(),
  routes: [{
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/posts/:slug',
      name: 'post',
      component: Post
    }
  ]
})