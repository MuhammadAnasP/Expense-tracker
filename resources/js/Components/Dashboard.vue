<script setup>
import axios from 'axios'
import { ref, onMounted } from 'vue'
import ExpenseChart from './ExpenseChart.vue'

const expenses = ref({})
const chart_data = ref({})

const categories = ref([])

const filter_category_id = ref('')
const filter_start_date = ref('')
const filter_end_date = ref('')

const formatDate = (date_val) => {
    const date = new Date(date_val)
    return date.toLocaleString()
};

const filterExpense = async () => {
    const filter_data = {
        category_id: filter_category_id.value,
        start_date: filter_start_date.value,
        end_date: filter_end_date.value
    }
    const filter_res = await axios.get('/expenses', { params: filter_data })
    expenses.value = filter_res.data.expenses
    chart_data.value = filter_res.data.chart_data
}

const deleteExpense = async (expense_id) => {
    if (confirm('Are you sure you want to delete this expense?')) {
        await axios.delete('/expenses/' + expense_id)
        try {
            const response = await axios.get('/expenses');
            expenses.value = response.data.expenses;
            chart_data.value = response.data.chart_data;
        } catch (error) {
            console.error('Error fetching expenses: ', error);
        }
    }
}

onMounted(async () => {
    try {
        const response = await axios.get('/expenses');
        expenses.value = response.data.expenses;
        chart_data.value = response.data.chart_data;
    } catch (error) {
        console.error('Error fetching expenses: ', error);
    }
    const categories_res = await axios.get('/categories');
    categories.value = categories_res.data;
});
</script>

<template>
    <div class="p-5">
        <div class="flex flex-col md:flex-row gap-3 mt-3 justify-between">
            <div class="flex gap-3 items-center">
                <h1 class="text-2xl font-bold">Expenses</h1>
                <router-link to="/expenses/create">
                    <button type="submit" name="submit" value="1"
                        class="w-full py-2 px-5 font-bold text-center text-white rounded-md bg-black">
                        Add new
                    </button>
                </router-link>
            </div>
            <div class="flex flex-col md:flex-row gap-3">
                <input type="date" v-model="filter_start_date"
                    class="text-sm rounded-md border border-gray-500 p-2 font-semibold" />

                <input type="date" v-model="filter_end_date"
                    class="text-sm rounded-md border border-gray-500 p-2 font-semibold" />

                <select class="rounded-md border border-solid border-gray-500 p-2 cursor-pointer"
                    v-model="filter_category_id">
                    <option value="">Select category</option>
                    <option v-for="(category, index) in categories" :key="index" :value="category.id">{{
                        category.title }}</option>
                </select>

                <button @click="filterExpense" type="submit" name="submit" value="1"
                    class="py-2 px-5 font-bold text-center text-black border border-black rounded-md">
                    Filter
                </button>
            </div>
        </div>
        <ExpenseChart v-if="chart_data.length" :chart_data="chart_data" />
        <div class="overflow-x-auto">
            <table class="w-full text-left text-md border border-black mt-3">
                <thead class="text-gray-700 bg-gray-200">
                    <tr>
                        <th class="p-3">Amount</th>
                        <th class="p-3">Description</th>
                        <th class="p-3">Category</th>
                        <th class="p-3">Date</th>
                        <th class="p-3 text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="expenses.length === 0">
                        <td colspan="5" class="text-center text-red-500 font-semibold p-3">No expenses found</td>
                    </tr>
                    <tr v-for="(expense, index) in expenses" :key="index" class="odd:bg-white even:bg-gray-100">
                        <td class="p-3">{{ expense.amount }}</td>
                        <td class="p-3">{{ expense.description }}</td>
                        <td class="p-3">{{ expense.category ? expense.category.title : '-' }}</td>
                        <td class="p-3">{{ formatDate(expense.created_at) }}</td>
                        <td class="p-3 flex justify-end">
                            <router-link :to="{ name: 'edit_expense', params: { id: expense.id } }">
                                <svg class="w-5 cursor-pointer" viewBox="0 0 20 20">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                    </path>
                                    <path fill-rule="evenodd"
                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </router-link>
                            <svg @click="deleteExpense(expense.id)" class="w-5 cursor-pointer fill-red-600"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>