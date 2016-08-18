 @extends('layouts.master')

 @section('content')
<div id="product">  <!-- Modal Trigger -->
Hello @{{ inputDataProduct }}
  <a class="modal-trigger btn-floating btn-large waves-effect waves-light red" @click="addProduct" href="#modal1">Add<i class="material-icons"></i></a>


   <table class="striped">
        <thead>
          <tr>
              <th data-field="id">Name</th>
              <th data-field="name">Stock</th>
              <th data-field="price">Price</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="p in dataProduct">
            <td>@{{ p.name }}</td>
            <td>@{{ p.stock }}</td>
            <td>@{{ p.price }}</td>
            <td>
              <a class="modal-trigger waves-effect waves-light btn blue" @click="editProduct(p)" href="#modal1">Edit</a>
              <a class="modal-trigger waves-effect waves-light btn red" @click="deleteProduct(p)" href="#modal1">Hapus</a>
            </td>
          </tr>
        </tbody>
      </table>


  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
        <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12">
          <input id="name" type="text" class="validate" v-model='inputDataProduct.name'>
          <label for="name">Product Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="stock" type="number" class="validate" v-model='inputDataProduct.stock'>
          <label for="stock">Stock</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="price" type="number" class="validate" v-model='inputDataProduct.price'>
          <label for="price">Price</label>
        </div>
      </div>
    </form>
  </div>
    </div>
    <div class="modal-footer">
      <a v-if="enable" class="waves-effect waves-light btn" @click="saveProduct(inputDataProduct)">Save</a>
       <a v-else="enable" class="waves-effect waves-light btn" @click="updateProduct(inputDataProduct)">Update</a>
    </div>
  </div>
  </div>

@push('script')
<script type="text/javascript">
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#_token').getAttribute('value');
  new Vue({
    el:"#product",
    ready:function(){
    this.getProduct();
    },
    data:function(){
      return  {
        nama:"Aditya",
        dataProduct:[],
        inputDataProduct:{},
        enable:false
      }
    },
    methods: {
      getProduct:function(){
        this.$http.get('api')
          .then(function(response){
            this.$set('dataProduct',response.data);
        });
    },
      addProduct:function(){
        this.enable = true;
        this.inputDataProduct = {};
         $('.modal-trigger').leanModal();
      },
      saveProduct:function(product){  
        this.$http.post('api/product',product);
        this.dataProduct.push({
          'name'  :product.name,
          'stock' :product.stock,
          'price' :product.price
        })
        $('#modal1').closeModal();
      },
      editProduct:function(product){
        $('.modal-trigger').leanModal();
        this.enable=false;
        this.inputDataProduct={};
        this.index=this.dataProduct.indexOf(product);
        this.inputDataProduct.id=product.id;
        this.inputDataProduct.name=product.name;
        this.inputDataProduct.stock=product.stock;
        this.inputDataProduct.price=product.price;
      },
      updateProduct:function(product){
        this.dataProduct[this.index].name=product.name;
        this.dataProduct[this.index].stock=product.stock;
        this.dataProduct[this.index].price=product.price;
        this.$http.patch('product/edit/'+product.id,product);
        $('#modal1').closeModal();
      },
      deleteProduct:function(product){
        var result = confirm('Are You sure want to delete this?');
        if(result){
          this.index = this.dataProduct.indexOf(product);
          this.dataProduct.splice(this.index,1);
          this.$http.delete('product/delete/'+product.id);
        }
      }
    }
  })

  </script>
  @endpush
 
@endsection
        