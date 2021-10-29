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
          >See Details</router-link
        >
      </div>
    </div>
    <v-pagination v-model="currentPage" :page-count="total" :classes="bootstrapPaginationClasses" :labels="paginationAnchorTexts"></v-pagination>
    <modal-posts :post="postSelected"></modal-posts>
  </div>
</template>
<script>
import vPagination from "vue-plain-pagination";

export default {
  components: {
    vPagination,
  },
  props: {
    posts: Array,
    total: Number,
  },
  data() {
    return {
      postSelected: "",
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
  watch: {
    currentPage: function(newVal, oldVal) {
      this.$emit("getCurrentPage", newVal);
    }
  },
  methods: {
    postClick(p) {
      this.postSelected = p;
      $("#postModal").modal("show");
    },
  },
};
</script>
<style>
</style>