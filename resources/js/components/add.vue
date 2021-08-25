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
file:'',
upload:false

			 }
		},

		methods:{
			
			fun(){
				console.log(this.add);
         
         if(!this.valid())
{
	return ;

}
    


				axios.post('/add',{
					name:this.name,
					price:this.price,
					stock:this.stock,
					id:this.id,
					add:this.add,
					imagelink:this.imagelink
					
				}).then((re)=>{console.log(re)
				 if(re.status==201)
            {
            	 const data={
            'message':"added sucessful",

             'for':'sucessful'}

	this.$emit('shownotification',data);
           }
           else{
 	 const data={
            'message':"unsucessful try again",

             'for':'unsucessful'}

	this.$emit('shownotification',data);
             }

	
});
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

               const datafile = new FormData();
                datafile.append('file', this.file);
              
                if(!this.valid())
{
	return ;

}
datafile.append('addto',this.add);
                axios.post('/upload',datafile, config)
                    .then(function (res) {
                    	console.log(res.status);
                    	this.upload=res.status==200?true:false;
                    	
                        existingObj.success = res.data.success;
                    })
                    .catch(function (err) {
                        existingObj.output = err;
                    });
console.log(this.upload);
 if(this.upload)
            {
            	 const data={
            'message':"added sucessful",

             'for':'sucessful'}

	this.$emit('shownotification',data);
           }
           else{
 	 const data={
            'message':"unsucessful try again",

             'for':'unsucessful'}

	this.$emit('shownotification',data);
             }

                
            },
            valid(){
            
            	if(this.file==''){
         		 const data={
            'message':'Select image first',
              'for':'error'}

            this.$emit('shownotification',data);
           return false;
         	}
         	if(this.add==''){
         		 const data={
            'message':' ADD  field Required',
              'for':'error'}

            this.$emit('shownotification',data);
           return  false;
         	}
         		if(this.name==''||this.price==0||this.stock==0||this.id==''){
         		 const data={
            'message':'fill Required field',
              'for':'error'}

            this.$emit('shownotification',data);
              return false  ;
         	}
         	return true;
            }

		}
}
</script>
