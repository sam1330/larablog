<template>
  <div class="col-8 offset-2">
    <div class="card">
      <div class="card-header">
        <img src="/images/logo.svg" class="logo-200 mx-auto d-block" alt="">
      </div>
      <div class="card-body">
        <div class="">
            <label class="text-secondary">First name</label>
          <input type="text" v-model="firstName" class="form-control" />
        </div>
        <div class="mt-3">
            <label class="text-secondary">Last name</label>
          <input type="text" v-model="lastName" class="form-control" />
        </div>
        <div class="mt-3">
          <label class="text-secondary">Email</label>
          <input type="text" v-model="email" class="form-control" />
        </div>
        <div class="mt-3">
          <label class="text-secondary">Message</label>
          <textarea v-model="message" class="form-control"></textarea>
        </div>
        <button class="btn btn-primary btn-lg mt-3">Send</button>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      firstName: '',
      lastName: '',
      email: '',
      message: '',
    }
  },
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