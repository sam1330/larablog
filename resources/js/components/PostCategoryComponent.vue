<template>
  <div>
    <h1>{{ category.title }}</h1>
    <div class="card mt-3" v-for="post in posts" :key="post.id">
      <img :src="'/images/' + post.image" alt="hola" />
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
    <v-pagination
      v-model="currentPage"
      :page-count="total"
      :classes="bootstrapPaginationClasses"
      :labels="paginationAnchorTexts"
    ></v-pagination>
    <modal-posts :post="postSelected"></modal-posts>
  </div>
</template>
<script>
import vPagination from "vue-plain-pagination";

export default {
  components: {
    vPagination,
  },
  data() {
    return {
      postSelected: "",
      posts: [],
      category: "",
      total: 3,
      currentPage: 1,
      bootstrapPaginationClasses: {
        ul: 'pagination',
        li: 'page-item',
        liActive: 'active',
        liDisable: 'disabled',
        button: 'page-link'  
      },
      paginationAnchorTexts: {
        first: '',
        prev: '&laquo;',
        next: '&raquo;',
        last: ''
      }
    };
  },
  created() {
    this.getPosts();
  },
  watch: {
      currentPage: function(newVal){
        this.getPosts(newVal);
      }
  },
  methods: {
    postClick(p) {
      this.postSelected = p;
      $("#postModal").modal("show");
    },
    getPosts(currentPage) {
      fetch(`/api/post/${this.$route.params.category_id}/category?page=${currentPage}`)
        .then((res) => {
          return res.json();
        })
        .then((json) => {
          this.posts = json.data.posts.data;
          this.category = json.data.category;
        });
    },
  },
};
</script>
<style>
</style>