import {
  createApp
} from 'vue'
import App from './App.vue'
import router from './router'
//main app
createApp(App).use(router).mount('#app')