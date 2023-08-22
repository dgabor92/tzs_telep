function page(path) {
    return () => import(/* webpackChunkName: '' */ `~/pages/${path}`).then((m) => m.default || m)
}

export default [
    { path: '/', name: 'welcome', component: page('welcome.vue') },

    { path: '/login', name: 'login', component: page('auth/login.vue') },
    { path: '/register', name: 'register', component: page('auth/register.vue') },
    {
        path: '/password/reset',
        name: 'password.request',
        component: page('auth/password/email.vue'),
    },
    {
        path: '/password/reset/:token',
        name: 'password.reset',
        component: page('auth/password/reset.vue'),
    },
    {
        path: '/email/verify/:id',
        name: 'verification.verify',
        component: page('auth/verification/verify.vue'),
    },
    {
        path: '/email/resend',
        name: 'verification.resend',
        component: page('auth/verification/resend.vue'),
    },

    { path: '/home', name: 'home', component: page('home.vue') },
    { path: '/addUser', name: 'addUser', component: page('user/index.vue') },

    {
        path: '/belepes',
        component: page('belepes/index.vue'),
        children: [
            { path: '', redirect: { name: 'belepes.kamion' } },
            {
                path: 'kamion',
                name: 'belepes.kamion',
                component: page('belepes/kamion.vue'),
            },
            {
                path: 'teherauto',
                name: 'belepes.teherauto',
                component: page('belepes/teherauto.vue'),
            },
            {
                path: 'szemelyauto',
                name: 'belepes.szemelyauto',
                component: page('belepes/szemelyauto.vue'),
            },
            {
                path: 'vagon',
                name: 'belepes.vagon',
                component: page('belepes/vagon.vue'),
            },
        ],
    },
    {
        path: '/kilepes',
        component: page('kilepes/index.vue'),
        children: [
            { path: '', redirect: { name: 'kilepes.kamion' } },
            {
                path: 'kamion',
                name: 'kilepes.kamion',
                component: page('kilepes/kamion.vue'),
            },
            {
                path: 'teherauto',
                name: 'kilepes.teherauto',
                component: page('kilepes/teherauto.vue'),
            },
            {
                path: 'szemelyauto',
                name: 'kilepes.szemelyauto',
                component: page('kilepes/szemelyauto.vue'),
            },
            {
                path: 'vagon',
                name: 'kilepes.vagon',
                component: page('kilepes/vagon.vue'),
            },
        ],
    },
    {
        path: '/statistic',
        name: 'statistics',
        component: page('statistics/index.vue'),
    },
    {
        path: '/settings',
        component: page('settings/index.vue'),
        children: [
            { path: '', redirect: { name: 'settings.profile' } },
            {
                path: 'profile',
                name: 'settings.profile',
                component: page('settings/profile.vue'),
            },
            {
                path: 'password',
                name: 'settings.password',
                component: page('settings/password.vue'),
            },
        ],
    },

    { path: '*', component: page('errors/404.vue') },
]
