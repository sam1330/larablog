<template>
  <div>
    <h1>{{ category.title }}</h1>
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
          >See Details</router-link
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
      category: "",
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
        console.log("__" + this.$route.params.category_id);
      fetch(`/api/post/${this.$route.params.category_id}/category`).then(res => {
        return res.json();
      }).then(json => {
        this.posts = json.data.posts.data;
        this.category = json.data.category;
    });
    },
  },
};
</script>
<style>
</style>