<template>
  <div>




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
      images:[]
    }



  },
  mounted() {
    console.log(this.$route.query) ;
    this.getAnnoncesParpage(this.$route.query)
  },
  methods: {

  getAnnoncesParpage(id) {
    let url = "http://127.0.0.1:8000/api/annonces/" + this.id;
    axios.get(url).then((response) => {
      this.annonces = response.data['hydra:member'];
      console.log(this.annonces );
    }).catch(error => {
      console.log(error);
    });
  }
  },


}
</script>

<style scoped>


</style>