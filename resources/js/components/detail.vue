<template>
	<div class="order-page">
<div class="order-detail"
>
	
		
		 <div class="form-group">
    <label  >Name</label>
    <input type="text" class="form-control"  v-model="name">
  @csrf
  </div>
  <div class="form-group">
    <label  >Phone No</label><br><small  style="color:red" pattern="^\d{10}">you will have an order confirmation call</small>
    <input type="text" class="form-control" required v-model="phone">
  
  </div>
  <div class="form-group">
    <label >Address</label>
    <input type="text"   class="form-control " v-model="address" >
  </div>
  

  <button   @click="fun()" class="btn btn-primary">Submit</button>
</div>
<div class="cart-item">
		
<h2>Cart</h2>
	 	<ul  >
  <li v-for="list in lists" >
  	<div class="cartitem">
  		<h2 class="name"> {{list.name}}</h2>
  		<div class="price-item">
  		<div class="orderquantity">{{list.quantity}}<span>&#215;</span>{{list.price}}RS=</div>
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

<div >TOTAL  {{total}}</div>
	</div>
</div>

</div>


</template>

		<style type="text/css" scoped>
	label{
		margin-bottom: 0px;
	}
	.order-page{
		width: 100%;
display: flex;
justify-content: space-around;

	}
	.order-detail{
		
		width: 40vw;
	}
	.cart-item{
			width: 40vw;
			height: auto;
		position:relative;

		
	}.totalfooter{
		position: absolute;
		bottom: 0;
		width: 10rem;
	}
	.cartitem{
	 display:flex;
	 flex-wrap: wrap;
	 width: 100%;
	 height: 5rem;

}
.name{
	padding: 0;
	margin: 0;
	
	
}
.price-item{
	height: 2rem;
	width: 50%;
	
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
	.totalfooter{
position: absolute;
bottom: 5rem;
left: 1rem;
display: flex;
justify-content: space-between;
	}
</style>
<script type="text/javascript">
	export default {
		props:['lists' ,'total'],
		data(){
			 return {
			 	phone:"",
			address:"",
			name:""
			 }
		},

		methods:{
			fun(){
		
		
					console.log(this.lists);
				axios.post('/order',{
					name:this.name,
					address:this.address,
					phone:this.phone,
					items:JSON.stringify(this.lists)
				}).then((re)=>{
         if(re.status==201)
            {
            	 const data={
            'message':"ordered sucessful",

             'for':'order'}
	this.$emit('shownotification',data);
            }
				});
			},

			 delete1(item){
            
            const clone = JSON.parse(JSON.stringify(item));
this.$store.dispatch('cart/deleteitem',item.cartid).then(res=>{

	if(res.status='ok')
{console.log(clone);
	 const data={
            'item':clone,

             'for':'delete'}
	this.$emit('shownotification',data);

}
});
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
          	
          	this.$store.dispatch('cart/edititem',data).then(res=>{
          		if(res.status=='ok'){
          			 const data={
            'item':item, 
            'for':'edit'}
	this.$emit('shownotification',data);
          		}
          	});
          }
 		
 			
		}
}
</script>


