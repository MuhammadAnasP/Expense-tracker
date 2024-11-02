<script setup>
import axios from 'axios'
import { ref, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'

const route = useRoute()
const router = useRouter()
const category_id = Number(route.params.id)

const title = ref('')
const errors = ref({})

let isEdit = false

const manageCategory = async (isEdit) => {
    try {
        const category_data = {
            title: title.value,
        };

        if (isEdit) {
            await axios.put('/categories/' + category_id, category_data)
        } else {
            await axios.post('/categories/create', category_data)
        }
        router.push('/categories')
    } catch (error) {
        if (error.response && error.response.status === 422) {
            errors.value = error.response.data.errors
        } else {
            console.error('Category saving process failed: ', error)
        }
    }
}

onMounted(async () => {
    try {
        isEdit = category_id ? true : false
        if (isEdit) {
            const categories_res = await axios.get('/categories/' + category_id)
            title.value = categories_res.data.title
        }
    } catch (error) {
        console.error('Error fetching categories: ', error)
    }
});
</script>

<template>
    <div class="bg-gray-100 flex items-center justify-center md:h-screen">
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-gray-900">{{ isEdit ? 'Update' : 'Create new' }} category</h2>
            <div class="flex-auto p-1">
                <form @submit.prevent="manageCategory(isEdit)">

                    <div class="mb-3">
                        <label class="mb-2 font-semibold text-sm text-slate-700">Title</label>
                        <input type="text" v-model="title" required
                            class="text-sm w-full rounded-md border border-gray-500 p-3 font-semibold" />
                        <div v-if="errors.title">
                            <p v-for="(title_error, title_error_i) in errors.title" :key="title_error_i"
                                class="text-red-500 font-bold text-xs">
                                {{ title_error }}
                            </p>
                        </div>
                    </div>

                    <div class="flex justify-between gap-3">
                        <router-link to="/categories" class="w-full">
                            <button type="submit" name="submit" value="1"
                                class="w-full p-2 font-bold text-center text-black border border-black rounded-md">
                                Cancel
                            </button>
                        </router-link>
                        <button type="submit" name="submit" value="1"
                            class="w-full p-2 font-bold text-center text-white rounded-md bg-black">
                            {{ isEdit ? 'Update' : 'Create' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
  