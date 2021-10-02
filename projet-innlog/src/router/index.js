import Vue from 'vue'
import VueRouter from 'vue-router'
import HomePage from '../components/HomePage.vue'
import SignupPage from '../components/SignupPage.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: ' SignupPage',
    component: SignupPage
  },
  {
    path: '/home',
    name: 'HomePage',
    component: HomePage
  }
]
const router = new VueRouter({
  routes
})

export default router
