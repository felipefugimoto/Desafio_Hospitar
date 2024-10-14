<script setup lang="ts">
import { onMounted } from 'vue';
import { useStore } from 'vuex'; // Importa o useStore do Vuex para acessar a store
import { RouterView } from 'vue-router'; // Importa RouterView para gerenciar as rotas
import Sidebar from './components/Sidebar.vue'; // Importa o componente Sidebar
import Tobar from './components/Tobar.vue'; // Importa o componente Tobar (top bar)
import Footer from './components/Footer.vue'; // Importa o componente Footer

const store = useStore(); // Obtém a instância da store Vuex

// Usando o lifecycle hook onMounted para executar a ação getPacientes assim que o componente for montado
onMounted(() => {
  store.dispatch('getPacientes').finally(() => {
    console.log('Ação getPacientes chamada com sucesso!'); // Loga uma mensagem de sucesso após a chamada da ação
  });
});
</script>

<template>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <Sidebar /> <!-- Componente que renderiza a barra lateral -->
    <!-- End of Sidebar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Topbar -->
      <Tobar /> <!-- Componente que renderiza o topo da página (barra superior) -->
      <!-- End of Topbar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <RouterView /> <!-- Gerencia as rotas e exibe o conteúdo dinâmico com base nas rotas -->
        <!-- End of Main Content -->

      </div>
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i> <!-- Ícone de rolagem para o topo da página -->
  </a>


  <!-- (Aqui você pode adicionar o modal de logout se for necessário) -->

</template>

<style>
@import url(/src/assets/vendor/fontawesome-free/css/all.min.css); /* Importa os estilos do FontAwesome */
@import url(/src/assets/css/sb-admin-2.min.css); /* Importa os estilos do tema SB Admin 2 */
</style>
