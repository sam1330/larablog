<template>
  <div>
    <h1>Posts</h1>
    <div class="card mt-3" v-for="post in posts" :key="post.id">
      <img :src="'/images/'+post.image" alt="hola" />
      <div class="card-body">
        <h5 class="card-title">{{ post.title }}</h5>
        <p class="card-text">
          Some quick example text to build on the card title and make up the
          bulk of the card content.
        </p>
        <router-link
          :to="{ name: 'details', params: { id: post.id } }"
          class="btn btn-primary"
          >Go somewhere</router-link
        >
      </div>
    </div>
    <modal-posts :post="postSelected"></modal-posts>
  </div>
</template>
<script>
export default {
  data() {
    return {
      postSelected: "",
      posts: [],
    };
  },
  created() {
    this.getPost();
  },
  methods: {
    postClick(p) {
      this.postSelected = p;
      $("#postModal").modal("show");
    },
    getPost() {
      fetch("/api/post").then(res => {
        return res.json();
      }).then(json => this.posts = json.data.data);
    },
  },
};
</script>
<style>
</style>