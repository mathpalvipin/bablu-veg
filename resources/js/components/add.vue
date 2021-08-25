<template>
	
<div class="add">
	
	

		
		 <div class="form-group">
    <label  >Name</label>
    <input type="text" class="form-control"  v-model="name">
  @csrf
  </div>
   <div class="form-group">
    <label  >add</label>
    <select class="Addto" v-model="add">
  <option value="fruit">Fruit</option>
  <option value="veg">veg</option>
 </select>
   <!--  <input type="text" class="form-control"  v-model="add"> -->
  
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
 </div>
	
  <form @submit="formSubmit" enctype="multipart/form-data">
                            <input type="file" class="form-control" v-on:change="onChange">
                            <button class="btn  btn-block">Upload</button>
                        </form>
 
  

  <button   @click="fun()" class="btn btn-primary">Submit</button>



</div>


</template>

		<style type="text/css">
	label{
		margin-bottom: 0px;
	}
	.add{
		margin-bottom:5rem;
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
			add:'',
imagelink:'',
file:''
			 }
		},

		methods:{
			
			fun(){
         	
				axios.post('/add',{
					name:this.name,
					price:this.price,
					stock:this.stock,
					id:this.id,
					add:this.add,
					imagelink:this.imagelink
					
				}).then((re)=>{console.log(re)});
			},
			onChange(e) {
                this.file = e.target.files[0];
                console.log( e.target.files[0]);
              this.imagelink=e.target.files[0].name; 
                         },
            formSubmit(e) {
                e.preventDefault();
                let existingObj = this;

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }

                let data = new FormData();
                data.append('file', this.file);
data.append('addto',this.add);
                axios.post('/upload', data, config)
                    .then(function (res) {
                    	console.log(res);
                        existingObj.success = res.data.success;
                    })
                    .catch(function (err) {
                        existingObj.output = err;
                    });
            }

		}
}
</script>
