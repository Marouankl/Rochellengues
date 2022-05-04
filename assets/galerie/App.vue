<template>
  <div id="main">
  <router-view></router-view>
  </div>
</template>

<script>
import Galeries from "./components/Galeries";

export default {
  name: "App.vue",
  components:{
    Galeries
  }
}
</script>

<style scoped>

</style>