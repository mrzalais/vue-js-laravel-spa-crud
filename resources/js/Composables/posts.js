import { ref } from 'vue';
import {useForm} from "@inertiajs/vue3";

export default function usePosts() {
    const posts = ref({})

    const getPosts = async (
        page = 1,
        category = '',
        order_column = 'created_at',
        order_direction = 'desc',
    ) => {
        const response = await fetch(`/api/posts?
        page=${page}
        &category=${category}
        &order_column=${order_column}
        &order_direction=${order_direction}
        `);
        posts.value = await response.json();
    }

    const post = useForm({
        title: '',
        content: '',
        category_id: ''
    });

    const storePost = () => {
        post.post(route('posts.create'));
    };

    return { posts, getPosts, post, storePost }
}
