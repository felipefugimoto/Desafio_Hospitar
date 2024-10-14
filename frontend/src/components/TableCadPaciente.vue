<script lang="ts">
import PageHeafing from './PageHeafing.vue'; // Importa o componente PageHeafing que renderiza o título e subtítulo da página

export default {
    components: { PageHeafing }, // Declara o componente PageHeafing para ser utilizado dentro deste componente
    data() {
        return {
            title: 'Lista de Pacientes', // Define o título da página
            text: "Pacientes cadastrados" // Define o subtítulo da página
        }
    },
}
</script>

<template>

    <div class="container-fluid"> <!-- Container principal da página -->

        <!-- Page Heading -->
        <PageHeafing :title="title" :text="text" /> <!-- Renderiza o componente PageHeafing passando as props title e text -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4"> <!-- Card que envolve a tabela -->
            <div class="card-header py-3"> <!-- Cabeçalho do card -->
                <h6 class="m-0 font-weight-bold text-primary">Tabela da pacientes</h6> <!-- Título da tabela -->
            </div>
            <div class="card-body"> <!-- Corpo do card contendo a tabela -->
                <div class="table-responsive"> <!-- Torna a tabela responsiva -->
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> <!-- Tabela com bordas -->
                        <thead>
                            <tr>
                                <!-- Definição das colunas da tabela -->
                                <th>Nome</th>
                                <th>Data de nascimento</th>
                                <th>Codigo</th>
                                <th>Guia</th>
                                <th>Entrada</th>
                                <th>Saida</th>
                                <th>Ações</th> <!-- Coluna de ações (editar, excluir) -->
                            </tr>
                        </thead>

                        <tbody>
                            <!-- Loop que percorre os pacientes armazenados no estado do Vuex Store -->
                            <tr v-for="paciente in $store.state.pacientes" :key="paciente.id">
                                <!-- Exibe os dados de cada paciente nas colunas correspondentes -->
                                <td>{{ paciente.nome }}</td>
                                <td>{{ paciente.nascimento }}</td> 
                                <td>{{ paciente.codigo }}</td>
                                <td>{{ paciente.guia }}</td>
                                <td>{{ paciente.entrada }}</td> 
                                <td>{{ paciente.saida }}</td> 
                                <td>
                                    <div class="row">
                                        <div class="col-auto">
                                            <!-- Ícone para editar o paciente -->
                                            <i class="fas fa-edit fa-2x text-primary"></i>
                                        </div>
                                        <div class="col-auto">
                                            <!-- Ícone para excluir o paciente -->
                                            <i class="fas fa-times fa-2x text-danger"></i>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
</template>
