<template>
  <div>
  <h1>Liste les Sejours</h1>


  <div class="panel panel-primary" v-show="sejours.length">
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
        <th scope="col">Duree</th>
        <th scope="col">Prix</th>
        <th scope="col">Langue</th>
        <th scope="col">Age</th>
        <th scope="col">Pays</th>
        <th scope="col">Action</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="sejour in sejours" >
        <td>{{ sejour.titre }}</td>
        <td>{{ sejour.duree }}</td>
        <td>{{ sejour.prix }}</td>
        <td>{{ sejour.langue }}</td>
        <td>{{ sejour.age }}</td>
        <td>{{ sejour.pays }}</td>



        <td><router-link class="btn btn-warning btn-block" to="">Afficher sejour</router-link></td>
      </tr>
      </tbody>
    </table>
    <b-table
        id="my-table"
        :sejours="sejours"
        :per-page="perPage"
        :current-page="currentPage"
        small
    ></b-table>
    <p class="mt-3"> Page: {{ currentPage }}</p>
    <td><router-link class="btn btn-primary" to="/">Retour</router-link></td>

  </div>

  </div>
</template>

<script>
import axios from "axios";
import Vue from "vue";
import BootstrapVue from "bootstrap-vue";

Vue.use(BootstrapVue)


export default {
  name: "listSejour",
  components:{
  },
  props: {
    sejours: Array,
  },
  data() {
    return {
      perPage: 6,
      currentPage: 1,
      search: '',
    }
  },
  mounted() {
    this.getSejours();
  },
  methods: {
    getSejours() {
      let url = "http://127.0.0.1:8000/api/sejours?page=1";
      axios.get(url).then((response) => {
        this.sejours = response.data['hydra:member'];
        console.log(this.sejours);
      }).catch(error => {
        console.log(error);
      });
    },

    computed: {
      rows() {
        return this.sejours.length
      },


    }

  }
}
</script>

<style scoped>

</style>