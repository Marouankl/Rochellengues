<template>

<div>

  <h1>Liste annonces</h1>


  <div class="panel panel-primary" v-show="annonces.length">
    <b-pagination
        v-model="currentPage"
        :total-rows="rows"
        :per-page="perPage"
        aria-controls="my-table"
    ></b-pagination>

    <table class="table table-bordered">
      <thead class="thead-dark">
      <tr>

        <th scope="col">Titre</th>
        <th scope="col">Description</th>
        <th scope="col">images</th>

        <th scope="col">Action</th>
      </tr>
      </thead>
          <tbody>
            <tr v-for="annonce in annonces" >
              <td>{{ annonce.titre }}</td>
              <td>{{ annonce.description }}</td>
              <td>{{ annonce.images }}</td>



              <td><router-link class="btn btn-warning btn-block" to="/affiche/:id">Afficher annonce</router-link></td>
            </tr>
          </tbody>
    </table>
    <b-table
        id="my-table"
        :annonces="annonces"
        :per-page="perPage"
        :current-page="currentPage"
        small
    ></b-table>
    <p class="mt-3"> Page: {{ currentPage }}</p>
  </div>

</div>
</template>

<script>

import axios from "axios";
import Vue from "vue";

import  BootstrapVue from "bootstrap-vue";
import EditAnnonce from "./afficheAnnonce";


Vue.use(BootstrapVue)



export default {
  name: "listAnnonce",

  components: {
    EditAnnonce

  },
  props: {
    annonces: Array,
  },
  data() {
    return {
      perPage: 6,
      currentPage: 1,
      search: '',
    }
  },
  mounted() {
    this.getAnnonces();
  },
  methods: {
    getAnnonces() {
      let url = "http://127.0.0.1:8000/api/annonces?page=1";
      axios.get(url).then((response) => {
        this.annonces = response.data['hydra:member'];
        console.log(this.annonces);
      }).catch(error => {
        console.log(error);
      });
    },

    computed: {
      rows() {
         return this.annonces.length
      },


    }

  }
}
</script>

<style scoped>


</style>