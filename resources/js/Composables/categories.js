import { ref } from 'vue';

export default function useCategories() {
    const categories = ref({})

    const getCategories = async () => {
        const response = await fetch(`/api/categories`);
        categories.value = await response.json();
    }

    return { categories, getCategories }
}
