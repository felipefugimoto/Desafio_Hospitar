<template>
    <div>
        <input type="file" @change="handleFileUpload" />
        <button @click="sendData">Enviar Dados</button>

        <pre>nome:{{ nomes }}
        codigos:{{ codigo }}

        cadastrados: {{ cad_s }}
        Não cadastrados {{ cad_n }}

        
      </pre>
    </div>
</template>

<script>
import Papa from 'papaparse';
import axios from 'axios';


export default {
    data() {
        return {
            csvData: [],
            nomes: [], // Vai armazenar os nomes extraídos
            codigo: [],
            cad_n: [],
            cad_s: []
        };
    },
    methods: {
        handleFileUpload(event) {
            const file = event.target.files[0];
            if (file) {
                Papa.parse(file, {
                    header: true,
                    complete: (results) => {
                        this.csvData = results.data;
                        console.log(this.csvData); // Visualizar os dados
                    },
                });
            }
        },

        // Método que retorna apenas os nomes
        getNomes() {
            return this.csvData.map((entry) => entry.nome); // Extrai os nomes de cada entrada
        },

        getCodigo() {
            return this.csvData.map((entry) => entry.codigo)

        },

        comparacao() {
            const nomesCadastrados = ['Maria', 'Pedro']; // Lista de nomes a serem comparados

            for (let index = 0; index < this.nomes.length; index++) {
                if (!nomesCadastrados.includes(this.nomes[index])) {
                    console.log('Usuário cadastrado:', this.nomes[index]);
                    this.cad_n.push(this.nomes[index]); 
                    // Adiciona aos pacientes cadastrados
                } else {
                    console.log('Usuário não cadastrado:', this.nomes[index]);
                    this.cad_s.push(this.nomes[index]); // Adiciona aos pacientes não cadastrados
                    
                }
            }

        },



        sendData() {
            // Armazena os nomes extraídos no array 'nomes'
            this.nomes = this.getNomes();
            this.codigo = this.getCodigo();

            this.comparacao();
        }
    },
};
</script>