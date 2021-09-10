import {
  createApp
} from 'vue'
import App from './App.vue'
import router from './router'
import store from './store/store'

//css
import './index.css'

//default api URL with axios
import axios from 'axios'
axios.defaults.baseURL = 'http://localhost:8000/'
//sanctum
axios.defaults.withCredentials = true;
//main app

store.dispatch('authenticate').then(() => {
  createApp(App).use(router).use(store).mount('#app')
})