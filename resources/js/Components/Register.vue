<script setup>
import axios from 'axios'
import { ref } from 'vue'

const emits = defineEmits()

const name = ref('')
const email = ref('')
const password = ref('')
const password_confirmation = ref('')
const errors = ref({})

const doRegister = async () => {
    try {
        const user_data = {
            name: name.value,
            email: email.value,
            password: password.value,
            password_confirmation: password_confirmation.value
        };

        await axios.post('/register', user_data)

        const login_data = {
            email: email.value,
            password: password.value
        };
        await axios.post('/login', login_data)
        const response = await axios.get('/user')

        const loggedUser = response.data.name;
        localStorage.setItem('loggedUser', loggedUser)
        emits('login-success')

    } catch (error) {
        if (error.response && error.response.status === 422) {
            errors.value = error.response.data.errors
        } else {
            console.error('Registration failed: ', error)
        }
    }
}
</script>

<template>
    <div class="bg-gray-100 flex items-center justify-center h-screen">
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-gray-900">Register</h2>
            <div class="flex-auto p-1">
                <form @submit.prevent="doRegister">

                    <div class="mb-3">
                        <label class="mb-2 font-semibold text-sm text-slate-700">Name</label>
                        <input type="text" v-model="name" required
                            class="text-sm w-full rounded-md border border-solid border-gray-500 bg-white px-3 py-2.5 font-semibold text-gray-700 focus:border-blue-600 focus:outline-none" />
                        <div v-if="errors.name">
                            <p v-for="(name_error, name_error_i) in errors.name" :key="name_error_i"
                                class="text-red-500 font-bold text-xs">
                                {{ name_error }}
                            </p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="mb-2 font-semibold text-sm text-slate-700">Email</label>
                        <input type="email" v-model="email" required
                            class="text-sm w-full rounded-md border border-solid border-gray-500 bg-white px-3 py-2.5 font-semibold text-gray-700 focus:border-blue-600 focus:outline-none" />
                        <div v-if="errors.email">
                            <p v-for="(email_error, email_error_i) in errors.email" :key="email_error_i"
                                class="text-red-500 font-bold text-xs">
                                {{ email_error }}
                            </p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="mb-2 font-semibold text-sm text-slate-700">Password</label>
                        <input type="password" v-model="password" required
                            class="text-sm w-full rounded-md border border-solid border-gray-500 bg-white px-3 py-2.5 font-semibold text-gray-700 focus:border-blue-600 focus:outline-none" />
                    </div>

                    <div class="mb-3">
                        <label class="mb-2 font-semibold text-sm text-slate-700">Confirm Password</label>
                        <input type="password" v-model="password_confirmation" required
                            class="text-sm w-full rounded-md border border-solid border-gray-500 bg-white px-3 py-2.5 font-semibold text-gray-700 focus:border-blue-600 focus:outline-none" />
                        <div v-if="errors.password">
                            <p v-for="(password_error, password_error_i) in errors.password" :key="password_error_i"
                                class="text-red-500 font-bold text-xs">
                                {{ password_error }}
                            </p>
                        </div>
                    </div>

                    <button type="submit" name="submit" value="1"
                        class="w-full p-2 font-bold text-center text-white rounded-md bg-black">
                        Register
                    </button>
                </form>
            </div>
            <div class="p-1 px-1 pt-0 text-center">
                <p class="mx-auto mb-6 text-sm">
                    Already have an account?
                    <router-link to="/login" class="font-semibold text-blue-700">Login</router-link>
                </p>
            </div>
        </div>
    </div>
</template>
  