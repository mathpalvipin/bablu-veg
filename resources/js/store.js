import cartmodule from './module/cart.js';

	export default{
		modules:{
cart:cartmodule
		},
	state(){
		return {
			vegs:'',
			fruits:''

		}
	},
	getters:{
		getvegs(state){
			return state.vegs;
		},
		getfruits(state){

			return state.fruits;
		}
	},
	mutations:{
		setvegs(state,payload){

         state.vegs=payload;
		},setfruits(state,payload){

         state.fruits=payload;
		}
		},
		actions:{
             setvegs(context,payload){
             	// console.log(payload);
             context.commit('setvegs',payload);

             }, setfruits(context,payload){
             	// console.log(payload);
             context.commit('setfruits',payload);

             }
		}
};
