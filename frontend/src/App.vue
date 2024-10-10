<script setup lang="ts">
import { RouterView } from 'vue-router'
import Sidebar from './components/Sidebar.vue';

import Footer from './components/Footer.vue';



</script>

<template>


  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <Sidebar />
    <!-- End of Sidebar -->


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <RouterView />
      <!-- End of Main Content -->

      <!-- Footer -->
      <Footer />
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->




</template>

<style>
@import url(/src/assets/vendor/fontawesome-free/css/all.min.css);
@import url(/src/assets/css/sb-admin-2.min.css);
</style>
