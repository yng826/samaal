export const apiDomain = "http://localhost:8000/"
export const loginURL = apiDomain + 'oauth/token'

export const getHeader = () => {
    const tokenData = JSON.parse(window.localStorage.getItem('authUser'));
    const headers = {
        'Accept': 'application/json',
        'Authorization': 'Bearer ' + tokenData.access_token
    }

    return headers;
}

export const getAuth = () => {
    const auth = window.localStorage.getItem('authUser');
    return auth;
}

export const getUser = () => {
    const auth = window.localStorage.getItem('authUser');
    try {
        let user = JSON.parse(auth).user;
        return user;
    } catch (error) {
        return false;
    }
}

export const getJob = () => {
    const job = window.localStorage.getItem('job');
    return job;
}
