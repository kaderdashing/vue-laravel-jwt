import { createRouter, createWebHistory } from 'vue-router';
import Login from '../components/Login.vue';
import Index from '../components/EmployeRecord/Index.vue';
import Show from '../components/EmployeRecord/Show.vue';
import Create from '../components/EmployeRecord/Create.vue';
import Edit from '../components/EmployeRecord/Edit.vue';

import Register from '../components/Register.vue';
import Dashboard from '../components/Dashboard.vue';
import store from '../store';

const routes = [{
        path: '/login',
        name: 'Login',
        component: Login
    },
    {
        path: '/register',
        name: 'Register',
        component: Register
    },
    {
        path: '/employe-records',
        name: 'EmployeRecords',
        component: Index,
        // meta: { requiresAuth: true }
    }, {
        path: '/employe-records/edit/:id',
        name: 'EmployeRecordsEdit',
        component: Edit,
        // meta: { requiresAuth: true }
    },
    {
        path: '/employe-records/create',
        name: 'EmployeRecordsCreate',
        component: Create,
        // meta: { requiresAuth: true }
    }, {
        path: '/employe-records/show/:id',
        name: 'EmployeRecordsShow',
        component: Show,
        // meta: { requiresAuth: true }
    }, {
        path: '/',
        name: 'Dashboard',
        component: Dashboard,
        meta: { requiresAuth: true }
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth && !store.state.user.token) {
        next({ name: 'Login' });
    } else {
        next();
    }
});

export default router;