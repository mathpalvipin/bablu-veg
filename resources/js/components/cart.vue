<template>
	<div class="body">
<h2>Cart</h2>
	 	<ul  >
  <li v-for="list in lists" >
  	<div class="cartitem">
  		<h2 class="name"> {{list.name}}</h2>
  		<div class="price-item">
  		<div class="orderquantity">{{list.quantity}}
<!-- <popup :quantity='quantity' v-show="showpopup" @save='edit(list)'></popup> -->
<span>&#215;</span>{{list.price}}RS=</div>
 <div class="total-price">{{list.quantity*list.price}} RS</div></div>
 <div class="item-btn ">
<button @click='delete1(list)' class="delete">  delete</button>
 
	<button @click='togglepopup(list)'> edit</button>
	
  	</div>
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
<script type="text/javascript" scoped>
	export default {
		data(){
			return {
				quantity:0,
				
			};
		},
		props:{
         total:'',
        lists:''
        
		},methods:{
			 delete1(item){
            console.log(item);
this.$store.dispatch('cart/deleteitem',item.cartid)
          },
          togglepopup(item){
          this.$prompt("Enter Quantity").then((text) => {
 this.quantity=parseInt(text);
this.edit(item);
});

          },
          edit(item){

         let 	data={
          		'id':item.cartid,
          		'quantity':this.quantity
          	};
          	console.log(data);
          	this.$store.dispatch('cart/edititem',data);
          }
 			}
		}
</script>
<style type="text/css" scoped>
input{
	width: 1rem;
}
.cartitem{
	 position :relative;
	 width: 100%;
	 height: 5rem;

}
.name{
	padding: 0;
	margin: 0;
	 position: absolute;
	 top: .2rem;
	 left: .2rem;
}
.price-item{
	height: 2rem;
	width: 50%;
	 position:  absolute;
	 top: .3rem;
	 right: .2rem;
font-size: 1rem;
display: flex;
justify-content: space-around;
align-items: center;

}
button{
	margin: .5rem;
}

.total-price{
	font-size: 1rem;

}
.item-btn{
		 position:  absolute;
	 bottom: 0rem;
	 width: 100%;
font-size: 1rem;
display: flex;
justify-content: center;

}
.delete{
	background-color:#F51720 ;
	border: .1px white;
	 border-radius: .5rem;
	 box-shadow: 6px 3px 20px -3px rgba(0,0,0,0.66);
-webkit-box-shadow: 6px 3px 20px -3px rgba(0,0,0,0.66);
-moz-box-shadow: 6px 3px 20px -3px rgba(0,0,0,0.66);
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