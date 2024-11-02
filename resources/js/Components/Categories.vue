<script setup>
import axios from 'axios'
import { ref, onMounted } from 'vue'

const categories = ref({})

const deleteCategory = async (category_id) => {
    if (confirm('Are you sure you want to delete this category?')) {
        await axios.delete('/categories/' + category_id)
        categories.value = categories.value.filter(category => category.id !== category_id)
    }
}

onMounted(async () => {
    try {
        const response = await axios.get('/categories');
        categories.value = response.data;
    } catch (error) {
        console.error('Error fetching categories: ', error);
    }
});
</script>

<template>
    <div class="p-5">
        <div class="flex gap-3 items-center">
            <h1 class="text-2xl font-bold">Categories</h1>
            <router-link to="/categories/create">
                <button type="submit" name="submit" value="1"
                    class="w-full py-2 px-5 font-bold text-center text-white rounded-md bg-black">
                    Add new
                </button>
            </router-link>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-md border border-black mt-3">
                <thead class="text-gray-700 bg-gray-200">
                    <tr>
                        <th class="p-3">Title</th>
                        <th class="p-3 text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="categories.length === 0">
                        <td colspan="5" class="text-center text-red-500 font-semibold p-3">No categories found</td>
                    </tr>
                    <tr v-for="(category, index) in categories" :key="index" class="odd:bg-white even:bg-gray-100">
                        <td class="p-3">{{ category.title }}</td>
                        <td class="p-3 flex justify-end">
                            <router-link :to="{ name: 'edit_category', params: { id: category.id } }">
                                <svg class="w-5 cursor-pointer" viewBox="0 0 20 20">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                    </path>
                                    <path fill-rule="evenodd"
                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </router-link>
                            <svg @click="deleteCategory(category.id)" class="w-5 cursor-pointer fill-red-600"
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
  