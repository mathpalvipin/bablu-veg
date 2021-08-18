<template>
  
        

       <div>    
     
   

           <div class="card "  v-for="fruit in fruits" >
   <div class="flex_con">
    <div class="img flex1">
 <img :src="'/images/fruit/'+fruit.link" :alt="fruit.name"  class='img'>
  
  </div>
  <div class=" flex1">
     <h4 class="name"> <b>{{fruit.name}}</b></h4>
 
    <h4   class="price">price :{{fruit.price}}rs/kg</h4>
    <h4 class="price"> amount={{fruit.quanity*fruit.price}}</h4>
       </div>
      <div class="Add flex1">
        <input type="text" v-model='fruit.quantity' height style="width:100%; height:4.5vh; margin-top:2vh;
        margin-bottom:1vh; font-size:2vh;
        " placeholder="ADD-Quantity">
        


        <button class="btn btn-primary" @click="add(fruit)"  style=" padding: 0px; font-size:20px ; width: 80%; height:30px;">ADD</button>
    </div>
  </div>
  </div>


</div>
 
 
   
</template>

<script>
    export default {
        data(){
            return {
                fruits:''
            }
        },
   
        methods:{
             add(fruit){
            this.$store.dispatch('cart/additemstocart',fruit);           }
        },
    
                  mounted(){
                
                if(this.$store.getters['getfruits']!='')
             this.fruits= this.$store.getters['getfruits'];
         else{
        axios.get('/fruit').then((response)=>{
            this.fruits=response.data;
        })}
}
    }
</script>

<style type="text/css" scoped>
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
    object-fit: cover;
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