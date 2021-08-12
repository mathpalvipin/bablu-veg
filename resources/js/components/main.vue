<template>
  <div><nav--bar @togglecart='togglecart' ></nav--bar>
	<div @click="hidecart"  >
		
    <router></router>
    <div class="allcontainer">
    <router-view :list="lists" ></router-view>
            <div class='cart' :class="{'showcart':showcart}">
       
            	<cart   :lists='lists' :total='total'></cart>
           </div>
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
           payment:false,
         };
      },
    
    computed:{
      lists(){
          return this.$store.getters['cart/getitems'];
      },
      total(){var Total=0;
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
   

  },
  hidecart(){
    console.log('hidecart');
    if(this.showcart==true)
 this.showcart=false;
  

  }

 }


    }
</script>
<style type="text/css">
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

  }
.cart{ width: 10rem;
  height: 60vh;
  background-color: lightgrey;
   position: absolute;
   top: 1rem;
   right: -10rem;
transition: all 1s;
}
.showcart{
  right: 0rem;
}

  
</style>
