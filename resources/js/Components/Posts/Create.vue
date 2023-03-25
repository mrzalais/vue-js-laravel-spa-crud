<template>
    <form @submit.prevent="form.post(route('posts.store'))">
        <div>
            <div>
                <InputLabel for="title" class="block font-medium text-sm text-gray-700">
                    Title
                </InputLabel>
                <input v-model="form.title" type="text" id="title"
                       class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <InputError class="mt-2" :message="form.errors.title"/>
            </div>

            <div class="mt-4">
                <InputLabel for="content" class="block font-medium text-sm text-gray-700">
                    Content
                </InputLabel>
                <textarea v-model="form.content" id="content"
                          class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                <InputError class="mt-2" :message="form.errors.content"/>
            </div>

            <div class="mt-4">
                <InputLabel for="category" value="Category"/>
                <select v-model="form.category_id"
                        class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="" selected>-- Choose category --</option>
                    <option v-for="category in categories.data" :value="category.id">
                        {{ category.name }}
                    </option>
                </select>
                <InputError class="mt-2" :message="form.errors.category_id"/>
            </div>
        </div>

        <div class="py-4">
            <button :disabled="form.processing" class="inline-flex items-center px-3 py-2 bg-blue-600 text-white rounded disabled:opacity-75 disabled:cursor-not-allowed">
                <div v-show="form.processing" class="inline-block animate-spin w-4 h-4 mr-2 border-t-2 border-t-white border-r-2 border-r-white border-b-2 border-b-white border-l-2 border-l-blue-600 rounded-full"></div>
                <span v-if="form.processing">Processing...</span>
                <span v-else>Save Post</span>
            </button>
            <Link :href="route('posts.index')"
                  class="ml-2 inline-block px-4 py-3 bg-gray-100 rounded">
                Cancel
            </Link>
        </div>
    </form>
</template>

<script setup>
import {Link, useForm} from "@inertiajs/vue3";
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import useCategories from '../../Composables/categories'

const {categories, getCategories} = useCategories()

const form = useForm({
    title: '',
    content: '',
    category_id: '',
});

getCategories();

</script>
