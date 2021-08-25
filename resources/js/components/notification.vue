<template>
	<transition  name="shownot" >
	<div class="notification" v-if="data">
		<h2 > {{data.message}}
	</h2>
	<h2 v-if="data.name">{{data.name}}
	</h2>
	
	
 <div class="orderquantity" v-show='data.quantity'>
 	{{data.quantity}}
<span>&#215;</span>{{data.price}}RS= {{data.price*data.quantity}}RS
</div>
</div>
</transition>
</template>
<script type="text/javascript">
	export default{
		 props:['notificationdata'],
 computed:{
 	data(){
 		console.log('asdf');
  return this.notificationdata.item?this.notificationdata.item:this.notificationdata; 
},

 }
	}

</script>
<style type="text/css" scoped>

.notification{
	position: fixed;
	top: 1rem;
	right:1rem;
	height: 5rem;
	width: 15rem;
	background-color: green;
	z-index: 50;
	box-shadow: 18px 7px 27px -9px rgba(0,0,0,0.77);
-webkit-box-shadow: 18px 7px 27px -9px rgba(0,0,0,0.77);
-moz-box-shadow: 18px 7px 27px -9px rgba(0,0,0,0.77);
color: white;
animation-fill-mode: forwards; 

}
@keyframes showto{
0%{
right: -15rem;
}
50%{
	right: 1rem;

}
100%{
	right: 1rem;
}
}

@keyframes showleav{
0%{
right: 1rem;
}

100%{
	right: -15rem;
}
}
/*.show{
animation: show 1s;
 }*/

.shownot-enter-active{
	animation: showto .7s ;
	animation-fill-mode: forwards; 
}
.shownot-leave-active{
animation: showleav .3s forwards;	
}
	
</style>