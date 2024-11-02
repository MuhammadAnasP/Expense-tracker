<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router'

const router = useRouter()
const isMenuOpen = ref(false)
const userName = ref(localStorage.getItem('loggedUser'))
const isAuthenticated = ref(!!localStorage.getItem('loggedUser'))

const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value;
};

const doLogout = () => {
    axios.post('/logout')
    localStorage.removeItem('loggedUser')
    isAuthenticated.value = false
    isMenuOpen.value = false
    router.push('/login')
}

const handleLoginSuccess = () => {
    isAuthenticated.value = true
    userName.value = localStorage.getItem('loggedUser')
    router.push('/dashboard')
};
</script>
<template>
    <main>
        <nav class="bg-black p-5 md:p-6">
            <div class="flex justify-between items-center gap-3">
                <div class="text-white text-lg font-bold">
                    <router-link to="/dashboard">Expense tracker</router-link>
                </div>
                <div v-if="isAuthenticated" class="hidden md:flex space-x-6 items-center">
                    <router-link to="/dashboard" class="font-semibold text-white">Dashboard</router-link>
                    <router-link to="/categories" class="font-semibold text-white">Categories</router-link>
                    <span @click="doLogout" class="font-semibold text-white cursor-pointer">Logout</span>
                </div>
                <div v-if="isAuthenticated" class="md:hidden">
                    <button @click="toggleMenu" class="text-white focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
            <div v-show="isMenuOpen" id="mobile-menu" class="md:hidden">
                <router-link to="/dashboard" class="block px-4 py-2 text-white">Dashboard</router-link>
                <router-link to="/categories" class="block px-4 py-2 text-white">Categories</router-link>
                <span @click="doLogout" class="block px-4 py-2 text-white">Logout</span>
            </div>
        </nav>
        <div v-if="isAuthenticated && isAuthenticated" class="p-5 bg-gray-200">
            <h1 class="text-3xl">Welcome, {{ userName }}!</h1>
        </div>
        <router-view @login-success="handleLoginSuccess"></router-view>
    </main>
</template>
