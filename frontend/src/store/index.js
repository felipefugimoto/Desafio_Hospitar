import axios from 'axios' // Importa o axios para fazer chamadas HTTP
import { createStore } from 'vuex' // Importa o método createStore do Vuex

// Cria a store Vuex
export default createStore({
  // Estado global da aplicação
  state: {
    pacientes: [] // Armazena a lista de pacientes
  },

  // Mutations são responsáveis por modificar o estado
  mutations: {
    // Mutation para armazenar pacientes no estado
    storePaciente(state, payload) { 
      state.pacientes = payload // Atualiza o estado com os dados de pacientes recebidos
    }
  },

  // Actions são responsáveis por realizar operações assíncronas
  actions: {
    // Action para buscar os pacientes da API
    getPacientes({ commit }) {
      // Faz uma requisição GET para o endpoint da API de pacientes
      return axios.get('http://127.0.0.1:8000/api/paciente')
        .then((response) => {
          // Quando a resposta é bem-sucedida, faz o commit dos dados na mutation storePaciente
          commit('storePaciente', response.data.data)
        })
        .catch((error) => {
          // Caso haja erro, pode-se adicionar um tratamento de erro aqui
          console.error('Erro ao buscar pacientes:', error)
        })
    }
  },

  getters: {
  },
  modules: {
  }
})
