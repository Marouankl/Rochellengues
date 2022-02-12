<template>
  <div>

<h1>hello word</h1>


    <div class="panel panel-primary">


      <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>

          <th scope="col">Titre</th>
          <th scope="col">Description</th>
          <th scope="col">images</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="annonce in annonces " >
          <td>{{ annonce.titre }}</td>
          <td>{{ annonce.description }}</td>
          <td>{{ annonce.images }}</td>
        </tr>
        </tbody>
      </table>


      <td><router-link class="btn btn-primary" to="listSejour">Listes les Sejours</router-link></td>

    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "afficheAnnonce",
  components:{
  },
  props: {
    annonces: Array,

  },
  data() {
    return{


    }



  },
  mounted() {
    this.getAnnoncesParpage(this.$route.query)
  },
  methods: {
  getAnnoncesParpage(id) {
    axios.get(`http://127.0.0.1:8000/api/annonces/`,{id})
        .then((response) => {
          console.log(response);
        })
        .catch((error) => {
          console.log(error);
        });

  }
  },


}
</script>

<style scoped>


</style>