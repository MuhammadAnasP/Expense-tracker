<script setup>
import axios from 'axios'
import { ref, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'

const route = useRoute()
const router = useRouter()
const expense_id = Number(route.params.id)

const categories = ref([])

const amount = ref('')
const description = ref('')
const category_id = ref('')
const errors = ref({})

let isEdit = false

const manageExpense = async (isEdit) => {
    try {
        const expense_data = {
            amount: amount.value,
            description: description.value,
            category_id: category_id.value
        };

        if (isEdit) {
            await axios.put('/expenses/' + expense_id, expense_data)
        } else {
            await axios.post('/expenses/create', expense_data)
        }

        router.push('/dashboard')
    } catch (error) {
        if (error.response && error.response.status === 422) {
            errors.value = error.response.data.errors
        } else {
            console.error('Expense saving process failed: ', error)
        }
    }
}

onMounted(async () => {
    try {
        isEdit = expense_id ? true : false
        if (isEdit) {
            const expenses_res = await axios.get('/expenses/' + expense_id)
            amount.value = expenses_res.data.amount
            description.value = expenses_res.data.description
            category_id.value = expenses_res.data.category_id
        }
        const categories_res = await axios.get('/categories')
        categories.value = categories_res.data
    } catch (error) {
        console.error('Error fetching data: ', error)
    }
});
</script>

<template>
    <div class="bg-gray-100 flex items-center justify-center md:h-screen">
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-gray-900">{{ isEdit ? 'Update' : 'Create new' }} expense</h2>
            <div class="flex-auto p-1">
                <form @submit.prevent="manageExpense(isEdit)">

                    <div class="mb-3">
                        <label class="mb-2 font-semibold text-sm text-slate-700">Amount</label>
                        <input type="number" v-model="amount" required
                            class="text-sm w-full rounded-md border border-gray-500 p-3 font-semibold" />
                        <div v-if="errors.amount">
                            <p v-for="(amount_error, amount_error_i) in errors.amount" :key="amount_error_i"
                                class="text-red-500 font-bold text-xs">
                                {{ amount_error }}
                            </p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="mb-2 font-semibold text-sm text-slate-700">Description</label>
                        <input type="text" v-model="description" required
                            class="text-sm w-full rounded-md border border-gray-500 p-3 font-semibold" />
                        <div v-if="errors.description">
                            <p v-for="(description_error, description_error_i) in errors.description"
                                :key="description_error_i" class="text-red-500 font-bold text-xs">
                                {{ description_error }}
                            </p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="mb-2 font-semibold text-sm text-slate-700">Category</label>
                        <select class="rounded-md border border-solid border-gray-500 p-2 w-full cursor-pointer"
                            v-model="category_id" required>
                            <option value="">Select category</option>
                            <option v-for="(category, index) in categories" :key="index" :value="category.id">{{
                                category.title }}</option>
                        </select>
                        <div v-if="errors.category_id">
                            <p v-for="(category_id_error, category_id_error_i) in errors.category_id"
                                :key="category_id_error_i" class="text-red-500 font-bold text-xs">
                                {{ category_id_error }}
                            </p>
                        </div>
                    </div>

                    <div class="flex justify-between gap-3">
                        <router-link to="/dashboard" class="w-full">
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
  