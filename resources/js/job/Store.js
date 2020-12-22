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
        school_activities:[{}],
        hobby_specialty: {},
        step: 2,
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
        getDefaultUser() {},
        getDefaultUserInfo() {
            return {
                user_id: "",
                name_en: "",
                birth_day: "",
            }
        },
        getDefaultAwards() {
            return [{
                id: "",
                award_name: "",
                award_group_name: "",
                award_date: "",
            }]
        },
        getDefaultCareers() {
            return [{
                id: '',
                career_start: "",
                career_end: "",
                career_name: "",
                career_position: "",
                career_role: "",
            }]
        },
        getDefaultCertificates() {
            return [{
                id: "",
                certificate_name: "",
                certificate_issuer: "",
                certificate_date: "",
            }]
        },
        getDefaultEducations() {
            return [{
                id: "",
                school_name: "",
                edu_major: "",
                edu_grade: "",
                edu_grade_full: "",
                edu_start: "",
                edu_end: "",
                graduation: "",
            }]
        },
        getDefaultLanguages() {
            return [{
                id: "",
                language_type: "",
                language_start: "",
                language_end: "",
                language_name: "",
                language_grade: "",
                language_level: "",
            }]
        },
        getDefaultMilitary() {
            return {
                id: '',
                job_id: '',
                military_type: '',
                military_discharge: '',
                military_rank: '',
                military_exemption: '',
                military_duration_start: '',
                military_duration_end: '',
            }},
        getDefaultOas() {
            return [{
                id: "",
                oa_name: "",
                oa_level: "",
            }]
        },
        getDefaultOverseasStudys() {
            return [{
                id: "",
                country_name: "",
                school_name: "",
                overseas_study_start: "",
                overseas_study_end: "",
                overseas_study_name: "",
                overseas_study_position: "",
                overseas_study_role: "",
            }]
        },
        getDefaultSchoolActivities() {
            return [{
                id: "",
                school_activities_start: "",
                school_activities_end: "",
                school_activities_affiliation: "",
                school_activities_role: "",
                school_activities_contents: "",
            }]
        },
        getDefaultHobbySpecialty() {
            return {
                id: "",
                hobby: "",
                specialty: "",
            }
        },
    }
})
