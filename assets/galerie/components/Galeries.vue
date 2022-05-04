
<template>
  <div id="galeries">
   <div class="image">
     <img :src="activePho" alt>
   </div>
    <div class="images" >
      <div v-for="(photo,index) in photos">
        <img :src="photo" @mouseover="changeActivePho(index)" :class="{active: index==indexOfActive ? true : false}" alt>

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
      activePho:'img/image8.jpg',
      photo: [
        'images/image7.jpg',
        'images/image3.jpg',
        'images/image4.jpg',
        'images/image5.jpg',
        'images/image6.jpg',
      ]
    }

  },
  methods: {
    changeActivePho(index){
      this.activePho = this.photo[index];
      this.indexOfActive=index;
    }

  },

}



</script>



<style scoped>

.image{
  width: 150px;
}
.image img{
  width: 100%;

}

.images{
  width: 150px;
  display: flex;

}
.images img{
  width: 150px;
  margin: 10px;
}
</style>