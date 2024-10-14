<script setup lang="ts">
import { onMounted } from 'vue';
import { useStore } from 'vuex'; // Importa useStore do Vuex
import { RouterView } from 'vue-router';
import Sidebar from './components/Sidebar.vue';
import Tobar from './components/Tobar.vue';
import Footer from './components/Footer.vue';

const store = useStore(); // Obtém a instância da store

// Usando onMounted para chamar a ação getPacientes quando o componente for montado
onMounted(() => {
  store.dispatch('getPacientes').finally(() => {
    console.log('Ação getPacientes chamada com sucesso!');
  });
});
</script>

<template>


  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <Sidebar />
    <!-- End of Sidebar -->


    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Topbar -->
      <Tobar />
      <!-- End of Topbar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <RouterView />
        <!-- End of Main Content -->


      </div>
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
