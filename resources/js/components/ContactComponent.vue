<template>
  <div class="col-8 offset-2">
    <div class="card">
      <div class="card-header">
        <div class="card-title">
          Contact
        </div>
      </div>
      <div class="card-body">
        <div class="">
            <label class="text-secondary">First name</label>
          <input type="text" class="form-control" />
        </div>
        <div class="mt-3">
            <label class="text-secondary">Last name</label>
          <input type="text" class="form-control" />
        </div>
        <div class="mt-3">
          <label class="text-secondary">Email</label>
          <input type="text" class="form-control" />
        </div>
        <div class="mt-3">
          <label class="text-secondary">Message</label>
          <textarea class="form-control"></textarea>
        </div>
        <button class="btn btn-primary btn-lg mt-3">Send</button>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {},
  created() {
  },
  methods: {
    saveContact(p) {
      return;
      fetch("/api/post/" + this.$route.params.id)
        .then((res) => {
          return res.json();
        })
        .then((json) => (this.post = json.data));
    },
  },
};
</script>
<style>
</style>