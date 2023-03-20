import { ref } from 'vue';

export default function usePosts() {
    const posts = ref({})

    const getPosts = async (page = 1, category = '') => {
        const response = await fetch(`/api/posts?page=${page}&category=${category}`);
        posts.value = await response.json();
    }

    return { posts, getPosts }
}
