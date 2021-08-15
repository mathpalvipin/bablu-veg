<template>
	
<div>
	
		
		 <div class="form-group">
    <label  >Name</label>
    <input type="text" class="form-control"  v-model="name">
  @csrf
  </div>
   <div class="form-group">
    <label  >add</label>
    <input type="text" class="form-control"  v-model="add">
  
  </div>
   <div class="form-group">
    <label  >price</label>
    <input type="number" class="form-control"  v-model="price">
  
  </div> 
  <div class="form-group">
    <label  >stock</label>
    <input type="number" class="form-control"  v-model="stock">
  
  </div>
   <div class="form-group">
    <label  >id</label>
    <input type="number" class="form-control"  v-model="id">
  
 
  

  <button   @click="fun()" class="btn btn-primary">Submit</button>

</div>
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
			 	id:"",
			name:"",
			price:0,
			stock:0,
			add:''
			 }
		},

		methods:{
			fun(){
		
		
					
				axios.post('/add',{
					name:this.name,
					price:this.price,
					stock:this.stock,
					id:this.id,
					add:this.add
					
				}).then((re)=>{console.log(re)});
			}
		}
}
</script>