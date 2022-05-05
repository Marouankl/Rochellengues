
<template>
  <div>
   <div id="image">
     <img :src="activePho" alt>
   </div>
    <div id="images" >
      <div v-for="(photo,index) in photos">
        <img :src="photo" @mouseover="changeActivePho(index)" :class="{ active: 'index == indexOfActive ?true : false'}" alt>

      </div>
    </div>
  </div>


</template>
<script>
export default {
  name:"galleries",
  data() {
    return{
      indexOfActive:0,
      activePho:'img/image6.png',
      photos: [
        'img/image6.png',
        'img/image4.jpg',
        'img/image1.jpg',
        'img/image2.jpg',


      ]
    }

  },
  methods: {
    changeActivePho(index){
      this.activePho = this.photos[index];
      this.indexOfActive=index;
    }

  },

}



</script>



<style scoped>

#image{
  text-align: center;
  height: 10000px;
  width: 1000px;
}
#image img{
  width: 100%;

}
#images{
  width: 500px;
  display: flex;

}
#images img{
  width: 50px;
  margin: 10px;
}
</style>
