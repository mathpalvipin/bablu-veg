<template>
	<div class="footer">
		<div class="total">  {{total}}
</div>	
  <router-link    style="width: 100px; float:left;" class="btn "  to='/vue1/4'>Order</router-link>

</div>
</template>
<script type="text/javascript">
	 export default{
	 	 props:[
	 	   'total']
	 }
</script>
<style type="text/css" scoped>
	.footer{
		height: 4rem;
		display: flex;
		justify-content: space-evenly;
		width: 100%;
		align-items: center;
		   background-color: #EEEDE7;
	}
	.btn{
		 background: #F8D210;
		 border-radius: 1rem;
		 font-size: 1.2rem;
	}
	.total{

	}
</style>