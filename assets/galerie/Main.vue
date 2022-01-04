<template>
  <div id="main">


  <router-view></router-view>
  </div>
</template>

<script>
import galeries from "./components/galeries";

export default {
  name: "Main.vue",
  components:{
    galeries
  }
}
</script>

<style scoped>

</style>