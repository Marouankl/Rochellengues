<template>
  <div id="app">

    <router-view></router-view>

  </div>

</template>

<script>

import listAnnonce from "./components/listAnnonce";
import afficheAnnonce from "./components/afficheAnnonce";
import listSejour from "./components/listSejour";

export default {
  name: "App",
  components:{
    listAnnonce,
    afficheAnnonce,
    listSejour
  }
}
</script>

<style scoped>

</style>