import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
import HomePage from '../views/HomePage.vue'
import LoginPage from '../views/LoginPage.vue'

const routes: Array<RouteRecordRaw> = [
  {
    path: "/",
    name: "login",
    component: LoginPage,
  },

  {
    path: "/homePage",
    name: "home",
    component: HomePage,
  },
  {
    path: "/newsDetail",
    name: "newsDetail",
    component: () => import("../views/NewsDetail.vue"),
  },
  {
    path: "/login",
    name: "loginPage",
    component: LoginPage,
  },
  {
    path: "/register",
    name: 'registerPage',
    component: () => import("../views/RegisterPage.vue")
  }
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
