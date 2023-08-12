import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import StudentView from '../views/StudentView/View.vue'
import StudentCreate from '../views/StudentView/Create.vue'
import StudentEdit from '../views/StudentView/Edit.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    },

    // route for showing all the data
    {
      path: '/student',
      name: 'student',
      component: StudentView
    },

    // route for storing new data
    {
      path: '/student/create',
      name: 'studentCreate',
      component: StudentCreate
    },

    // rote for finding the specific data
    {
      path: '/student/:id/edit',
      name: 'studentEdit',
      component: StudentEdit
    }
  ]
})

export default router
