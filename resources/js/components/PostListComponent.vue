<template>
  <div>
    <post-list-default-component
      @getCurrentPage="getCurrentPage"
      :posts="posts"
      :total="total"
    ></post-list-default-component>
  </div>
</template>
<script>
import PostListDefaultComponent from "./PostListDefaultComponent.vue";
export default {
  components: { PostListDefaultComponent },
  data() {
    return {
      postSelected: "",
      posts: [],
      total: 1,
      currentPage: 1,
    };
  },
  created() {
    this.getPosts();
  },
  methods: {
    postClick(p) {
      this.postSelected = p;
      $("#postModal").modal("show");
    },
    getPosts() {
      fetch("/api/post?page=" + this.currentPage)
        .then((res) => {
          return res.json();
        })
        .then((json) => {
          this.posts = json.data.data;
          this.total = 5;
        });
    },
    getCurrentPage(currentPage) {
      this.currentPage = currentPage;
      this.getPosts();
    },
  },
};
</script>
<style>
</style>