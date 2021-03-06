import Vue from 'vue'
import Vuex from 'vuex/dist/vuex.esm'
Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    preselectedTerm: undefined
  },

  mutations: {
    updatePreselectedTerm (state, payload) {
      state.preselectedTerm = payload
    }
  }
})
