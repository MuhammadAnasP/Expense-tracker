import './bootstrap';

import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'

import App from './layout/App.vue'

import Login from './Components/Login.vue'
import Register from './Components/Register.vue'

import Dashboard from './Components/Dashboard.vue'
import ManageExpense from './Components/ManageExpense.vue'

import Categories from './Components/Categories.vue'
import ManageCategory from './Components/ManageCategory.vue'

import VueApexCharts from 'vue3-apexcharts'

const routes = [
    {
        path: '/login',
        name: 'login',
        component: Login,
        meta: { requiresAuth: false }
    },
    {
        path: '/register',
        name: 'register',
        component: Register,
        meta: { requiresAuth: false }
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard,
        meta: { requiresAuth: true }
    },
    {
        path: '/expenses/create',
        name: 'create_expense',
        component: ManageExpense,
        meta: { requiresAuth: true }
    },
    {
        path: '/expenses/edit/:id',
        name: 'edit_expense',
        component: ManageExpense,
        meta: { requiresAuth: true }
    },
    {
        path: '/categories',
        name: 'categories',
        component: Categories,
        meta: { requiresAuth: true }
    },
    {
        path: '/categories/create',
        name: 'create_category',
        component: ManageCategory,
        meta: { requiresAuth: true }
    },
    {
        path: '/categories/edit/:id',
        name: 'edit_category',
        component: ManageCategory,
        meta: { requiresAuth: true }
    },
    {
        path: '/:catchAll(.*)',
        redirect: '/login'
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach((to, from, next) => {
    const isAuthenticated = !!localStorage.getItem('loggedUser')
    if (to.meta.requiresAuth && !isAuthenticated) {
        next('/login')
    } else if (isAuthenticated && (to.name === 'login' || to.name === 'register')) {
        next('/dashboard');
    } else {
        next();
    }
});

const app = createApp(App)

app.component('apexchart', VueApexCharts).use(router).mount('#app')