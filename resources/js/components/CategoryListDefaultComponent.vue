<template>
  <div class="row">
    <div class="col-md-3" v-for="category in categories" :key="category.id">
      <div class="card mt-3">
        <router-link
          :to="{
            name: 'post-category',
            params: { category_id: category.id },
          }"
        >
          <img :src="'/images_category/coding.png'" alt="hola" class="card-img-top"/>
          <div class="card-body">
            <h5 class="card-title">{{ category.title }}</h5>
          </div>
        </router-link>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    posts: Array,
    total: Number,
  },
  data() {
    return {
      categories: [],
    };
  },
  created() {
    this.getCategories();
  },
  methods: {
    getCategories() {
      fetch("/api/category/all")
        .then((res) => {
          return res.json();
        })
        .then((json) => (this.categories = json.data));
    },
    postClick(p) {
      this.postSelected = p;
      $("#postModal").modal("show");
    },
  },
};
</script>
<style>
</style>