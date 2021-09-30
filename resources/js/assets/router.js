window.Vue = require('vue').default;
import Vue from 'vue';
import VueRouter from 'vue-router';
import PostList from "../components/PostListComponent.vue";
import PostDetail from "../components/PostDetailComponent.vue";

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
    }],
});


export default router;
