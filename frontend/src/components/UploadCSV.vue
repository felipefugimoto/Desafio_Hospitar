<template>
    <div class="d-sm-flex align-items-center justify-content-center mb-5 py-5 bg-dark">
        <!-- Upload do CSV -->
        <input type="file" @change="handleFileUpload" />
        <button @click="sendData" :disabled="!csvData.length">Enviar Dados</button>
    </div>

    <!-- PACIENTES NÃO CADASTRADOS -->
    <div v-show="sucessCad" v-for="(suces_cad, index) in cad_n" :key="index">
        <div class="card border-left-success shadow h-50 mx-3">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-green">
                            Paciente <strong class="text-green">{{ suces_cad.nome }}</strong> do código <strong class="text-green">{{ suces_cad.codigo }}</strong> cadastrado com sucesso
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- PACIENTES JÁ CADASTRADOS -->
    <div v-show="dangerCard" v-for="(danger_cad, index) in cad_s" :key="index">
        <div class="card border-left-danger shadow h-50 mx-3">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-green">
                            Paciente <strong class="text-green">{{ danger_cad.nome }}</strong> do código <strong class="text-green">{{ danger_cad.codigo }}</strong> já possui cadastro
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-times fa-2x text-danger"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Papa from 'papaparse';
import axios from 'axios';

export default {
    data() {
        return {
            csvData: [], // Dados extraídos do CSV
            pacientes: [], // Lista de pacientes já cadastrados
            cad_n: [], // Lista de pacientes não cadastrados
            cad_s: [], // Lista de pacientes já cadastrados
            sucessCad: false, // Controla a exibição de mensagem de sucesso
            dangerCard: false, // Controla a exibição de mensagem de erro
        };
    },
    created() {
        // Busca todos os pacientes cadastrados ao carregar o componente
        axios.get('http://127.0.0.1:8000/api/paciente')
            .then((response) => {
                this.pacientes = response.data.data;
            })
            .catch((error) => {
                console.error("Erro ao carregar os pacientes:", error);
            });
    },
    methods: {
        // Manipula o upload de arquivo CSV
        handleFileUpload(event) {
            const file = event.target.files[0];
            if (file) {
                Papa.parse(file, {
                    header: true,
                    complete: (results) => {
                        this.csvData = results.data; // Armazena os dados do CSV
                    },
                });
            }
        },

        // Compara os pacientes do CSV com os já cadastrados
        comparacao() {
            const codigosPacientes = this.pacientes.map(p => p.codigo);

            // Limpa os arrays e estados antes de fazer a nova comparação
            this.cad_n = [];
            this.cad_s = [];
            this.sucessCad = false;
            this.dangerCard = false;

            this.csvData.forEach((pacienteCSV) => {
                const codigoCSV = pacienteCSV.codigo;

                if (codigosPacientes.includes(codigoCSV)) {
                    this.cad_s.push(pacienteCSV); // Adiciona aos pacientes já cadastrados
                    this.dangerCard = true; // Mostra mensagem de erro
                } else {
                    this.cad_n.push(pacienteCSV); // Adiciona aos novos pacientes
                }
            });

            // Enviar pacientes não cadastrados para o servidor
            if (this.cad_n.length > 0) {
                this.cad_n.forEach((paciente) => {
                    axios.post('http://127.0.0.1:8000/api/paciente', paciente)
                        .then(() => {
                            this.sucessCad = true; // Mostra mensagem de sucesso
                        })
                        .catch((error) => {
                            console.error("Erro ao cadastrar os pacientes:", error);
                        });
                });
            } else {
                console.log("Nenhum paciente novo para cadastrar.");
            }
        },

        // Função que inicia o processo de comparação e envio
        sendData() {
            this.comparacao();
        }
    }
};
</script>
