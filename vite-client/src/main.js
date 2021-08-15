import {
  createApp
} from 'vue'
import App from './App.vue'
import router from './router'

//css
import './index.css'

//default api URL with axios
import axios from 'axios'
axios.defaults.baseURL = 'http://localhost:8000/'
//main app
createApp(App).use(router).mount('#app')