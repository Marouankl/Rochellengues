import Vue from 'vue'
import Router from 'vue-router'

import listAnnonce from "../components/listAnnonce";

import afficheAnnonce from "../components/afficheAnnonce";



Vue.use(Router);


export default new Router({
    routes:[
        {
            path: '/',
            name: 'listAnnonce',
            component: listAnnonce
        },
        {
            path: '/affiche/:id',
            name: 'afficheAnnonce',
            component: afficheAnnonce
        },

    ]
})









