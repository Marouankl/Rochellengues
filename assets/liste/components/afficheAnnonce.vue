<template>
  <div>

<h1>hello word</h1>


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
  getAnnoncesParpage() {
    axios.get(`http://127.0.0.1:8000/api/annonces/${id}`)
        .then((response) => {
          console.log(response);
          setData(response.data['hydra:member']);
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