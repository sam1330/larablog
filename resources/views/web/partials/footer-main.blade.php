<footer class="text-center text-white" style="background-color: #45637d;">
  <!-- Grid container -->
  <div class="container p-4">
    <!-- Section: Iframe -->
    <section class="">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
        </div>
      </div>
    </section>
    <!-- Section: Iframe -->
  </div>
  <!-- Grid container -->
  <!-- Copyright -->
  <div class="text-center text-white p-3 bg-dark2">
    © {{ date('Y') }} Copyright:
    <router-link to="/">Larablog.com</router-link>
    <router-link :to="{ name: 'contact' }" class="text-white"><u>Contact</u></router-link>
  </div>
  <!-- Copyright -->
</footer>
<style>
  footer {
    position: relative;
    bottom: 0;
    right: 0;
    left: 0;
  }
</style>