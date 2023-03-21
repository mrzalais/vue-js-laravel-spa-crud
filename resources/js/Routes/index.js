import { createRouter, createWebHistory } from 'vue-router';
import PostsIndex from '../Components/Posts/Index.vue';
import PostsCreate from '../Components/Posts/Create.vue';

const routes = [
    {
        path: '/',
        name: 'posts.index',
        component: PostsIndex,
        meta: { title: 'Posts' }
    },
    {
        path: '/createPost',
        name: 'posts.create',
        component: PostsCreate,
        meta: { title: 'Add new post' }
    },
];

export default createRouter({
    history: createWebHistory(),
    routes
});

