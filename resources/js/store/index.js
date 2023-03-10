import { createStore } from "vuex";

const store = createStore({
    state: {
        user: {
            data: {},
            token: null
        }
    },
    mutations: {
        setToken(state, token) {
            state.user.token = token;
        }
    }
});

export default store;