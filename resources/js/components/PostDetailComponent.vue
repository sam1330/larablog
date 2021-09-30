<template>
  <div>
    <div v-if="post">
      <div class="card mt-3">
        <div class="card-header">
          <img
            :src="'/images/' + post.image.image"
            alt="hola"
            class="card-img-top"
          />
        </div>
        <div class="card-body">
          <h1 class="card-title">{{ post.title }}</h1>
          <router-link
            :to="{ name: 'details', params: { id: post.id } }"
            class="btn btn-primary"
            >{{ post.category.title }}</router-link
          >
          <p class="card-text">
            {{ post.content }}
          </p>
        </div>
      </div>
    </div>
    <div v-else>
      <h1>Post no existe</h1>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      post: null,
    };
  },
  created() {
    fetch("/api/post/" + this.$route.params.id)
      .then((res) => {
        return res.json();
      })
      .then((json) => (this.post = json.data));
  },
  methods: {
    getPost(p) {
      this.postSelected = p;
      $("#postModal").modal("show");
    },
  },
};
</script>
<style>
</style>