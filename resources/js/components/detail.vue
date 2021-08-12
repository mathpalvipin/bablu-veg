<template>
	
<div>
	
		
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

</template>

		<style type="text/css">
	label{
		margin-bottom: 0px;
	}
</style>
<script type="text/javascript">
	export default {
		data(){
			 return {
			 	phone:"",
			address:"",
			name:"",
			lists:[],
			 }
		},

		methods:{
			fun(){
		
		
					
				axios.post('/order',{
					name:this.name,
					address:this.address,
					phone:this.phone,
					items:JSON.stringify(this.lists)
				}).then((re)=>{console.log(re)});
			}
		}
}
</script>