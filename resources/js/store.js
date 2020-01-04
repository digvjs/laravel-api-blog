import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
    state: {
        api_url: process.env.MIX_API_URI || 'http://localhost:8001/api',
    },

    getters: {

    },

    mutations: {
        
    },
})