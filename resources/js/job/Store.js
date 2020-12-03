import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

export const JobStore = new Vuex.Store({
    state: {
        job: {},
        user: {},
        user_info: {},
        award: [{}],
        career: [{}],
        certificate: [{}],
        education: [{}],
        language: [{}],
        military: {},
        oa: [{}],
        oversea: [{}],
    },
    mutations: {
        deleteEdu(state, payload) {
            // return state.edu = payload
        },
        updateEdu(state, payload) {
            return state.edu = payload
        },
        updateCareer(state, payload) {
            return state.career = payload
        },
    },
    getters: {
        getMilitary() {
            return {
                id: '',
                job_id: '',
                military_type: '',
                military_discharge: '',
                military_rank: '',
                military_exemption: '',
                military_duration_start: '',
                military_duration_end: '',
            }
        }
    }
})
