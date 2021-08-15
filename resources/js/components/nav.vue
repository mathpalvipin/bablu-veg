<template>
 
<nav class="navbar " >
	
  <div><a class="navbar-brand" href="/">BABLU</a></div>
<div class="cartoption">
	<h4 class="total">Total: {{total}}</h4>
  <button  @click='togglecart'  class='btn-cart'>CART</button>
</div>
<div class="gap" style=" height: 50px; width: 100%; background-color: #EEEDE7;"></div>
 <!--  <router-link    style="width: 100px; float:left;" class="btn btn-primary"  to='/vue1/4'>Order</router-link> -->
 
<!--   <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
    	<ul >
  <li v-for="list in lists"  class="nav-item ">
   <label> {{ list.name }} </label>
    {{list.quantity*list.price}} RS
  </li>
</ul>
	<div class="flex">

<div class="name">TOTAL</div>
<div class="space"></div>
<div class="name">{{total}}</div>
	</div>

     
    </div>
  </div>
 --></nav>
</template>
<script type="text/javascript">
	export default {
		props:{
         total:0,
        lists:[],
        
		},
		methods:{
         togglecart(){
         	 this.$emit('togglecart');
         }
		
		}
   
  
   
   
    
	}

</script>
<style type="text/css" scoped>
	.name{
	flex: 1;
	}
	.space{
		flex: 1;
	}
	.flex{
		display: flex;
	}
	.navbar-brand{
		 font-size: 3rem;

	}
	.navbar{
		display: flex;
		justify-content: space-between;
		flex-direction: column;
		align-items: center;
		 background-color: #EEEDE7;
		

	}
	.cartoption {
		 width: 60vw;
		flex-direction: row;
		display: flex;
		justify-content: space-between;
		align-items: center;

		
	}
	.total{
		 margin-right: 1rem;
		 font-size: 2rem;
		 padding: .6rem ;
	}
	.btn-cart{
		background-color: yellow;
		height: 4rem;
		font-size: 2rem;
		width:10rem ;}
		a{
			text-decoration: none;
		}
	
</style>