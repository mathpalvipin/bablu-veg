<template>
  
       

         <div>    
 <div class="card "  v-for="veg in vegs" >
   <div class="flex_con">
    <div class="img ">

  <img :src="'/images/veg/'+veg.link" alt="avtar"  class='img'>
  
  </div>
  <div class=" ">
     <h4 class="name"> <b>{{veg.name}}</b></h4>
 
    <h4   class="price">price :{{veg.price}}rs/kg</h4>
    <h4 class="price"> amount={{veg.quanity*veg.price}}</h4>
       </div>
      <div class="Add ">
         <button class="btnadd btn-primary" @click="add(veg)"  >ADD Quantity</button>
          
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
            
            };
        },
    
        methods:{
               add(veg){
                    this.$prompt("Enter Quantity of "+ veg.name).then((text) => {
 veg.quantity=parseInt(text);

                if(veg.quantity==0){
                    return 0;
                }
            const clone = JSON.parse(JSON.stringify(veg));
 this.$store.dispatch('cart/additemstocart',clone).then(res=>{
    
    if(res.status=='ok'){
        console.log('itemadded');
        
        const data={
            'item':clone,
             'color':'green'}

            this.$emit('shownotification',data);
           veg.quantity='';
    }
 });

          });
}
           },
               mounted(){
              
                if(this.$store.getters['getvegs']!='')
             this.vegs= this.$store.getters['getvegs'];
         else{
        axios.get('/veg').then((response)=>{
            this.vegs=response.data;
        });

    }
     console.log(this.vegs);
        
}

    

    }
</script>

<style type="text/css">
input::placeholder{
  font-size:2vh;
  margin-top:5px;

}
   .flex_con {
  padding: 0;
 width: 100%;
  display: flex;justify-content: space-between;
  align-items: center;
}
.wrap    { 
  -webkit-flex-wrap: wrap;
  flex-wrap: wrap;
}  

.img{
    width: 15vh;
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
.btnadd{
     width: 10rem;
     padding: 0px;
      font-size:20px ;
       height:30px;
       margin-right: 2rem;
}
.add{
    width: 100%;
}
</style>