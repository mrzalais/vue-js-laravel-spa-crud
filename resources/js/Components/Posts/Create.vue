<template>
    <form @submit.prevent="storePost">
        <!-- Title -->
        <div>
            <InputLabel for="name" value="Content" />

            <input v-model="post.title" id="post-title" type="text" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
        <div>
            <InputLabel for="name" value="Content" />

            <textarea v-model="post.content" id="post-content" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
        </div>
        <div>
            <InputLabel for="category" value="Category" />

            <select v-model="post.category_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="" selected>-- Choose category --</option>
                <option v-for="category in categories.data" :value="category.id">
                    {{ category.name }}
                </option>
            </select>
        </div>
        <!-- Buttons -->
        <div class="mt-4">
            <button class="px-3 py-2 bg-blue-600 text-white rounded">Save</button>
        </div>
    </form>
</template>

<script setup>
import useCategories from '../../Composables/categories'
import InputLabel from '@/Components/InputLabel.vue';
import usePosts from "@/Composables/posts";

const { categories, getCategories } = useCategories()
const { post, storePost } = usePosts()

getCategories();

</script>
