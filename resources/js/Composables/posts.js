import { ref } from 'vue';

export default function usePosts() {
    const posts = ref({})

    const getPosts = async (page = 1) => {
        const response = await fetch(`/api/posts?page=${page}`);
        posts.value = await response.json();
    }

    return { posts, getPosts }
}
