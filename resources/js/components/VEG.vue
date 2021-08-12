<template>
  
       

         <div>    
 <div class="card "  v-for="veg in vegs" >
   <div class="flex_con">
    <div class="img flex1">
  <img src="/images/tamato.PNG" alt="Avatar"  class='img'>
  
  </div>
  <div class=" flex1">
     <h4 class="name"> <b>{{veg.name}}</b></h4>
 
    <h4   class="price">price :{{veg.price}}rs/kg</h4>
    <h4 class="price"> amount={{veg.quanity*veg.price}}</h4>
       </div>
      <div class="Add flex1">
        <input type="text" v-model='veg.quantity' height style="width:100%; height:4.5vh; margin-top:2vh;
        margin-bottom:1vh; font-size:2vh;
        " placeholder="ADD-Quantity">
        


        <button class="btn btn-primary" @click="add(veg)"  style=" padding: 0px; font-size:20px ; width: 80%; height:30px;">ADD</button>
          
    </div>
  </div>
  </div>


</div>
 
   
</template>

<script>
    export default {
        data(){
            return {
              vegs:'',
              lists:[]
            };
        },
    
        methods:{
             add(veg){
            
 this.$store.dispatch('cart/additemstocart',veg);

          }
           },
               mounted(){
               
                if(this.$store.getters['getvegs']!='')
             this.vegs= this.$store.getters['getvegs'];
         else{
        axios.get('/veg').then((response)=>{
            this.vegs=response.data;
        })}
}

    

    }
</script>

<style type="text/css">
input::placeholder{
  font-size:2vh;
  margin-top:5px;

}
   .flex-container {
  padding: 0;
 
  display: flex;
}
.wrap    { 
  -webkit-flex-wrap: wrap;
  flex-wrap: wrap;
}  

.img{
    width: 15vh;
}
.flex_con{
  display:flex;
}
.flex1{
  flex:1;
}
.name{font-size:20px;
 margin:5px;
 margin-bottom:20px; 
 margin-top:20px;
  text-align: left;

}
.price
{
  font-size:1.2vh; 
   text-align: left; 
   margin:5px
}
</style>