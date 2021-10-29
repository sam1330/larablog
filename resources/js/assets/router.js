window.Vue = require('vue').default;
import Vue from 'vue';
import VueRouter from 'vue-router';
import PostList from "../components/PostListComponent.vue";
import PostDetail from "../components/PostDetailComponent.vue";
import PostCategory from "../components/PostCategoryComponent.vue";
import ContactCategory from "../components/ContactComponent.vue";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
    {
        path: "/",
        component: PostList,
    },
    {
        name: "details",
        path: "/details/:id",
        component: PostDetail,
    },
    {
        name: "contact",
        path: "/contact",
        component: ContactCategory,
    },
    {
        name: "post-category",
        path: "/post-category/:category_id",
        component: PostCategory,
    }],
});


export default router;
