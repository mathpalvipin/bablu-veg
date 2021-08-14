export default{
	namespaced:true,
state(){
return {
cart:[],
total:0
}
},
getters:{
getitems(state){
  
      


// if (localStorage.getItem("cart") !== null) {
//  return JSON.parse(localStorage.getItem("cart"));
// }
	
	// }else if(localStorage.getItems{
	// 	console.log('state');
 //    return localStorage.getItem("cart");
	// }
	
	return state.cart;
// return JSON.parse(localStorage.getItem("cart"));
},
gettotal(state){
	
	return state.total;

}
}, 
mutations:{
additemstocart(state,payload){
state.cart.unshift(payload);

 //localStorage.setItem("cart",JSON.stringify(state.cart));

},
deleteitem(state,payload){
	console.log(state.cart);
	state.cart =state.cart.filter(id=>{
		return id.cartid!==payload})
	//console.log(state.cart);
	
	
 //localStorage.setItem("cart",JSON.stringify(state.cart));
}

},
actions:{
	additemstocart(context,payload){
		console.log('additemstocart');
		   const clone = JSON.parse(JSON.stringify(payload));
		const d= new Date();
		 let id=d.getDate();
		 
id+=""+d.getMonth();
id+= ""+d.getFullYear();
id+=""+d.getHours();
id+= ""+d.getMinutes();
id+= ""+d.getSeconds();
id+= ""+d.getMilliseconds();
clone.cartid=id;
console.log(id);

context.commit('additemstocart',clone);
	},
	 deleteitem(context,payload){
		console.log('deleteitemfromcart');
	     context.commit('deleteitem',payload);
	}

}
};
