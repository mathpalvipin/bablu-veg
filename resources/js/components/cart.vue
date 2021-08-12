<template>
	<div class="body">
<h2>Cart</h2>
	 	<ul  >
  <li v-for="list in lists" >
  	<div class="cartitem">
  		<h2 class="name"> {{list.name}}</h2>
  		<div class="orderquantity">{{list.quantity}} </div>
<div class="itemprice"> {{list.price}} RS</div>
 <div class="price"> {{list.quantity*list.price}} RS</div>
 <div class="price"> <button @click='delete1(list)'>  delete</button></div>
  	</div>
  <!-- 	<div class="flex">
   <div class="name"> {{ list.name }} </div>
   <div class="space"></div>
   <div class="quan">{{ list.quantity}}</div>
   <div class="space"></div>

   <div class="price"> {{list.quantity*list.price}} RS</div>
</div> -->
  </li>
</ul>
  	<div class="totalfooter">

<div >TOTAL</div>

<div >{{total}}</div>
	</div>
</div>



</template>
<script type="text/javascript">
	export default {
		
		props:{
         total:'',
        lists:''
        
		},methods:{
			 delete1(item){
            console.log(item);
this.$store.dispatch('cart/deleteitem',item.cartid)
          }
 			}
		}
</script>
<style type="text/css" scoped>
.cartitem{
	 position :relative;
	 width: 100%;
	 height: 10vh;

}
.name{
	padding: 0;
	margin: 0;
	 position: absolute;
	 top: 0rem;
	 left: 0rem;
}
.orderquantity{
	 position:  absolute;
	 top: .2rem;
	 right: .2rem;
}
.itemprice{
	 position:  absolute;
	 bottom: .2rem;
	 left: .2rem;
font-size: .9rem;
}
.price{
		 position:  absolute;
	 bottom: 0rem;
	 right: .2rem;
font-size: 1rem;

}
	ul{
		padding: 0;
		margin-top: 1rem;
		list-style-type: none;
	}
	.body{
		padding: 10px; 
		border: 1px solid lightgrey;
		margin-bottom:30px;
	}
	.totalfooter{
position: absolute;
bottom: 5rem;
left: 1rem;
display: flex;
justify-content: space-between;
	}
</style>