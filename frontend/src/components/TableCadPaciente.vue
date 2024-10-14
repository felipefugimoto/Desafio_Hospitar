<script lang="ts">

import PageHeafing from './PageHeafing.vue';

export default {
    components: { PageHeafing },
    data() {
        return {
            title: 'Lista de Pacientes',
            text: "Pacientes cadastrados"
        }
    },

}
</script>
<template>

    <div class="container-fluid">

        <!-- Page Heading -->
        <PageHeafing :title="title" :text="text" />


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabela da pacientes</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Data de nascimento</th>
                                <th>Codigo</th>
                                <th>Guia</th>
                                <th>Entrada</th>
                                <th>Saida</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="paciente in $store.state.pacientes" :key="paciente.id">
                                <td>{{ paciente.nome }}</td>
                                <td>{{ paciente.nascimento }}</td>
                                <td>{{ paciente.codigo }}</td>
                                <td>{{ paciente.guia }}</td>
                                <td>{{ paciente.entrada }}</td>
                                <td>{{ paciente.saida }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-auto">
                                            <i class="fas fa-edit fa-2x text-primary"></i>
                                        </div>
                                        <div class="col-auto">
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