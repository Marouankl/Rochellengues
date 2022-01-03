<template>
  <div id="app">

    <router-view></router-view>

  </div>

</template>

<script>

import listAnnonce from "./components/listAnnonce";
import afficheAnnonce from "./components/afficheAnnonce";

export default {
  name: "App",
  components:{
    listAnnonce,
    afficheAnnonce
  }
}
</script>

<style scoped>

</style>