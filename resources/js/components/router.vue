<template>
		<div  class='flex_container'>

	<router-link to='/vue1' class='btn'>veg</router-link>
	<router-link to='/vue1/2' class
	='btn'>fruit</router-link>

  </div>
</template>
<!-- <template>
	<div  class='flex_container'>
		<button class="btn " @click='showveg()' > Vegetable</button>
    <button class="btn " @click='showfruit()'> fruit</button>

  </div>

</template>
<script type="text/javascript">
	export default {
		 methods:{
		 	showfruit(){
		 		console.log(window.location.host);
		 		window.location.href='/fruitpage'; 
		 		},
		 			showveg(){
		 		console.log(window.location.host);
		 		window.location.href='/vegpage'; 
		 		}

		 }
	}
</script> -->