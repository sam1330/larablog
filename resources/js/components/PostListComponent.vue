<template>
  <div>
    <h1>Posts</h1>
    <div class="card mt-3" v-for="post in posts" :key="post">
      <img src="/images/background.jpg" alt="hola">
      <div class="card-body">
        <h5 class="card-title">{{ post }}</h5>
        <p class="card-text">
          Some quick example text to build on the card title and make up the
          bulk of the card content.
        </p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      posts: ["Title 1", "Title 2", "Title 3", "Title 4", "Title 5"],
    };
  },
};
</script>
<style>
</style>