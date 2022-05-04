import Vue from 'vue'
import Router from 'vue-router'

import galeries from "../components/Galeries";




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
