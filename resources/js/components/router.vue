<template>
		<div  class='router-container'>

	<router-link to='/vue1' class='btn-r' >VEG</router-link>
	<router-link to='/vue1/2' class
	='btn-r'>FRUIT</router-link>
{{showfruit}}
{{showveg}}
  </div>
</template>
<!-- <template>
	<div  class='flex_container'>
		<button class="btn " @click='showveg()' > Vegetable</button>
    <button class="btn " @click='showfruit()'> fruit</button>

  </div>

</template> -->
<script type="text/javascript">
	export default {
		 computed:{
		 	showfruit(){
		 		console.log(window.location.pathname);
		 		
		 		},
		 			showveg(){
		 		console.log(window.location.pathname);
		 		
		 		}

		 }
	}
</script>
<style type="text/css" scoped>
	.btn-r{
		 height: 7rem;
		width: 50vw;
 text-align: center;
 border-radius:10rem;
  font-size: 5rem;
	background-color: white;
	padding: 1rem 0;
	line-height: 1;
color: black;
 	}
	.router-container{
		 width: 100%;
		 display: flex;

	}
	.btn-r.router-link-exact-active
	{
		 background-color:  darkorange;
	}

a{
	  text-decoration: none;
}
	


</style>