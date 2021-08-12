<template>
 
<nav class="navbar navbar-expand-lg navbar-light bg-light" >
	<div></div>
  <a class="navbar-brand" href="/">BABLU</a>
  <button  @click='togglecart'  style="width: 100px;background-color: yellow;" class='btn'>Payment   </button>
  <router-link    style="width: 100px; float:left;" class="btn btn-primary"  to='/vue1/4'>Order</router-link>
 
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
         total:'',
        lists:[],
        
		},
		methods:{
         togglecart(){
         	 this.$emit('togglecart');
         }
		},
   
  
   
   
    
	}

</script>
<style type="text/css">
	.name{
	flex: 1;
	}
	.space{
		flex: 1;
	}
	.flex{
		display: flex;
	}
</style>