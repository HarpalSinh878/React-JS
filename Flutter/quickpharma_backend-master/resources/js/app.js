import './bootstrap';
import {createApp} from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import App from '@/Page/Main.vue'
import router from './router.js'

// createApp(App).mount("#app")

const app = createApp(App)
app.use(VueAxios,axios,router)
app.mount('#app')