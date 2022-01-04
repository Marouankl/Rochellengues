import Vue from 'vue'
import Router from 'vue-router'

import galeries from "../components/galeries";




Vue.use(Router);


export default new Router({
    routes:[
        {
            path: '/',
            name: 'galerie',
            component: galeries
        },


    ]
})
