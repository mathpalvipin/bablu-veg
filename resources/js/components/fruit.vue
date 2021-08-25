<template>
  
        

       <div>    
     
   

           <div class="card "  v-for="fruit in fruits" >
   <div class="flex_con">
    <div class="img ">
 <img :src="'/images/fruit/'+fruit.link" :alt="fruit.name"  class='img'>
  
  </div>
  <div class="">
     <h4 class="name"> <b>{{fruit.name}}</b></h4>
 
    <h4   class="price">price :{{fruit.price}}rs/kg</h4>
    <h4 class="price"> amount={{fruit.quanity*fruit.price}}</h4>
       </div>
      <div class="Add 1">
      <button class="btnadd btn-primary" @click="add(fruit)"  style=" padding: 0px; font-size:20px ; width: 80%; height:30px;">ADD quantity</button>
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
                    this.$prompt("Enter Quantity of : "+ fruit.name).then((text) => {
 fruit.quantity=parseInt(text);

                if(fruit.quantity==0){
                    return 0;
                }
                const clone = JSON.parse(JSON.stringify(fruit));
            this.$store.dispatch('cart/additemstocart',clone).then(res=>{
    
    if(res.status=='ok'){
        console.log('itemadded');
        
          const data={
            'item':clone,
            'color':'green'}

            this.$emit('shownotification',data);
         
          fruit.quantity='';
         }           
     });
            });

        }
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
    object-fit: cover;
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