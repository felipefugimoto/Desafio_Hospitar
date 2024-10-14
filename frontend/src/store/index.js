import axios from 'axios'
import { createStore } from 'vuex'

export default createStore({
  state: {
    pacientes:[]
  },
  mutations: {
    storePaciente(state, payloand){
      state.pacientes= payloand
    }
  },
  actions: {

    getPacientes({commit}){
      return axios.get('http://127.0.0.1:8000/api/paciente')
      .then((response) => {
        commit('storePaciente', response.data.data)
      })
    }
  },
  getters: {
  },
  modules: {
  }
})
