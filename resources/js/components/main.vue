<template>
  <div class="main">
  <div class="top"><nav--bar @togglecart='togglecart'  :total='total'></nav--bar>
  
    

    <router></router> </div>
    <div class="allcontainer">
    <router-view :list="lists" ></router-view>
            <div class='cart' :class="{'showcart':showcart}">
       
              <cart   :lists='lists' :total='total'></cart>
           </div>
  </div>
</div>

</template>
</template>
<script>

    export default {
      data (){
        return {
          showcart:false,
           bycart:false,
          
          
         };
      },
    
    computed:{
      lists(){
        
          return this.$store.getters['cart/getitems'];
      },
      total(){
        var Total=0;
        

      this.list=this.$store.getters['cart/getitems'];
            for (var i = this.list.length - 1; i >= 0; i--) {
            Total+=this.list[i].price*this.list[i].quantity;
}
console.log('TOtal' +Total);
return Total;
    }
    
 },
 mounted(){

      
        axios.get('/veg').then((response)=>{  
          console.log('setvegs');
          this.$store.dispatch('setvegs',response.data);
            // this.vegs=response.data;
        });
           axios.get('/fruit').then((response)=>{  
          console.log('setfruits');
          this.$store.dispatch('setfruits',response.data);
            // this.vegs=response.data;
        })


   
 },
 methods:{
  togglecart(){
    console.log('togglecart');
 this.showcart=!this.showcart;
   this.bycart=true;

  },
  hidecart(){
   
 this.showcart=false;
  console.log(this.bycart);
if(this.bycart){
  this.showcart=true;
  this.bycart=false;
}
  }

 }


    }
</script>
<style type="text/css" scoped>

.top {
   height: auto;
   position: fixed;
   z-index: 5;
}
  button{
    width: 100%;
  }
  .payment{
    padding:10px;
  }
  .flex_container{ 
    display:flex;
    margin-bottom:50px;
    
  }
  .btn{
    flex:1;
    border:1px solid lightgrey;
  }
  .allcontainer{
     position: relative;
     width: 100%;
     height: 100vh;
     overflow-x: hidden;
     top: 22rem;

  }
.cart{ width: 10rem;
  height: 100vh;
  background-color: lightgrey;
   position: fixed;
   top: 1rem;
   right: -10rem;
transition: all 1s;
z-index: 10;
}
.showcart{
  right: 0rem;
}

  
</style>
