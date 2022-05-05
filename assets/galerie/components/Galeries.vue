
<template>
  <div>
   <div class="image">
     <img :src="activePho" alt>
   </div>
    <div class="images" >
      <div v-for="(photo,index) in photos">
        <img :src="photo" @mouseenter="changeActivePho(index)" :class="{ active: index==indexOfActive ?true : false}" alt>

      </div>
    </div>
  </div>


</template>
<script>
export default {
  name:"galeries",
  data() {
    return{
      indexOfActive:0,
      activePho:'img/image1.jpg',
      photos: [
        'img/image1.jpg',
        'img/image2.jpg',
        'img/image4.jpg',

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

.image{
  width: 1000px;
}
.image img{
  width: 80%;

}
.images{
  width: 500px;
  display: flex;

}
.images img{
  width: 50px;
  margin: 10px;
}
</style>
