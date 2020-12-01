import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

export const JobStore = new Vuex.Store({
    state: {
        job: { id: 1, user_id: 1, phone_decrypt: '01028016532', address_1: '서울시 관악구', address_2: '303동 1806호', file_path: 'storage/job/SPTpwre9LkK1V5dTjfzNlApab2SOsHc15qJUmZXW.jpeg' },
        user: { id: 1, name: '이혁', email: 'yng826@gmail.com' },
        user_info: { id: 1, birth_day: '1979-08-26', name_en: 'hyuk', },
        edu: [
            {school_name: 'edu 1', edu_start: '2000-01-01', edu_end: '2010-12-31'},
            {school_name: 'edu 2', edu_start: '2000-01-01', edu_end: '2010-12-31'},
        ],
        career: [
            {career_start:'2000-01-01',career_end:'2000-12-31',career_name:'회사1',career_position:'과장',career_role: '개발자'},
            {career_start:'2001-01-01',career_end:'2001-12-31',career_name:'회사2',career_position:'과장',career_role: '개발자'},
            {career_start:'2002-01-01',career_end:'2002-12-31',career_name:'회사3',career_position:'과장',career_role: '개발자'},
        ]
    },
    mutations: {
        updateEdu(state, payload) {
            return state.edu = payload
        },
        updateCareer(state, payload) {
            return state.career = payload
        },
    }
})
