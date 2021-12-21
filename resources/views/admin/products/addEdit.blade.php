@extends('admin.layouts.app')
@section('content')
<style>.imageSize{height: 100px;width: 100px;}</style>
<div class="container">
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Products</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ {{isset($product) ? $product->name : 'Add New' }}</span>
            </div>
        </div>
        <a class="btn btn-main-primary ml_auto" href="{{ route('products.index') }}">View Products</a>
    </div>
    <!-- breadcrumb -->
    <!--Row-->
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        {{isset($product) ? 'Update # '.$product->id : 'Add New' }}
                    </div>
                
                    <form  id="product-add-edit"  action="javascript:void(0)"  method="POST" enctype="application/x-www-form-urlencoded">
                        @csrf
                        {{ isset($product) ? method_field('PUT'):'' }}
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                        <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Title</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="productName"  placeholder="Enter your name" type="text" value="{{isset($product) ? $product->productName : '' }}">
                                </div>
                            </div>
                      
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Description </label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <textarea name="description" id="description" cols="30" rows="10">{{isset($product) ? $product->description : '' }}</textarea>
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                    <label class="form-label mg-b-0">Media </label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                            
                              <div id="imageAddFeild"></div>
                                    <!-- <input id="demo" type="file" name="image[]" accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" multiple> -->
                                
                                </div>
                            </div>
                        </div>
                    </div>
                                </div>
                            </div>
                           
                         
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Category</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <select name="category_id"  class="form-control">
                                        <option value="">Choose Below..</option>
                                        @foreach($categories as $category)
                                        <option {{ (isset($product) && $product->category_id  == $category->id) ? 'selected' : '' }}  value="{{$category->id}}">  {{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Status</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <select name="status" class="form-control">
                                    <option value="">Choose Below..</option>
                                    <option value="1" {{ (isset($product) && $product->status  == 1) ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ (isset($product) && $product->status  == 0) ? 'selected' : '' }}>Inactive</option>
                                </select>
                                </div>
                            </div>
                            </div>
                            </div>
                        </div>
                            <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                <h4>Pricing</h4>
                            <div class="row row-xs align-items-center mg-b-20" >
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Regular price (₹)</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="real_price" value="{{isset($product) ? $product->real_price : '' }}" type="number" >
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20" >
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Sale Price</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="sale_price" value="{{isset($product) ? $product->sale_price : '' }}" type="number" >
                                </div>
                            </div>
                            </div>
                            </div>
                            </div>
            <div class="col-lg-12 col-md-12">
                <div class="card">
                     <div class="card-body">
                                <h4>Inventory</h4>
                                <div class="row row-xs align-items-center mg-b-20" id="sku">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">SKU</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="sku" value="{{isset($product) ? @$product->productSku[0]->sku : '' }}" type="text" >
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20" >
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Stock quantity</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="qty" value="{{isset($product) ? @$product->productSku[0]->qty : '' }}" type="number" >
                                </div>
                            </div>
                  </div>
             </div>
         </div>

         <div class="col-lg-12 col-md-12">
                <div class="card">
                     <div class="card-body">
                                <h4>Shipping</h4>
                                <div class="row row-xs align-items-center mg-b-20">
                                    <div class="col-md-4">
                                        <label class="form-label mg-b-0">Weight</label>
                                    </div>
                                    <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="weight" value="{{isset($product) ? $product->weight : '' }}" type="number">
                                    </div>
                                </div>

                  </div>
             </div>
         </div>
         <div class="col-lg-12 col-md-12">
                <div class="card">
                     <div class="card-body">
                                <h4>Attributes</h4>
                                <table class="table table-bordered" id="attributes_fields">
                                    <tr>
                                         <td>
                                             <input type="text"  id="name_attributes" placeholder="Enter your Name" class="form-control tableData" />
                                    
                                            </td>
                                         <td><input type="text"   id="value_attributes" placeholder="Enter your value with (,) seperated" class="form-control tableData" />
                                         </td>
                                         <td><button type="button" name="add" onclick="productsEvent.addAttributes()"  id="add" class="btn btn-success">Save</button></td>

                                    </tr>
                               </table>


                  </div>
             </div>
         </div>

         <div class="col-lg-12 col-md-12">
                <div class="card">
                     <div class="card-body">
                                <h4>Variants</h4>
                                              
                                   
                                    <table class="table table-bordered" >
                                        <thead id="variations_heading"> 
                                            
                                        </thead>
                                        <tbody id="variations_fields">

                                        </tbody>
                                    </table>
                                  
                                    

                  </div>
             </div>
         </div>

    <button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5" type="submit">{{isset($product) ? 'Update' : 'Save' }}</button>
</form>
                <!-- form end  -->

                <!-- ajax image form  -->

                <form method="POST" enctype="multipart/form-data" id="upload_image_form" action="javascript:void(0)" >
                  
                
                  <div class="row row-xs align-items-center mg-b-20">
                                      <div class="col-md-4">
                                          <label class="form-label mg-b-0">Add Media </label>
                                      </div>
                                      <div class="col-md-8 mg-t-5 mg-md-t-0">
                                          <div class="row">
                                              <div class="col-lg-12 col-md-12">
                                                  <div class="card">
                                                      <div class="card-body">


                                                      <input type="file" name="images" placeholder="Choose image" id="image">

                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                      
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    
            </form>


                <!-- ajax image form end  -->
            </div>
        </div>
    </div>
    <!-- /row -->
</div>
<link href="https://transloadit.edgly.net/releases/uppy/v1.6.0/uppy.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>

 
<script src="https://transloadit.edgly.net/releases/uppy/v1.6.0/uppy.min.js"></script>

<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

<script type="text/javascript">
  
CKEDITOR.replace( 'description' );

var productsEvent;
(function() {
    var attributes =[];
    var variations =[];
    productsEvent = {
        initialize: function() {
            //productsEvent.addAttributes();
        },
        getAllAttributes()
        {

        },
        addAttributes:function()
        {

            let attributeName = $("#name_attributes").val();
            let value_attributes = $("#value_attributes").val();
         
          if(value_attributes.length != 0  && attributeName.length != 0 ){
            var removeLastQuama = value_attributes.charAt(value_attributes.length-1);
            if(removeLastQuama != ','){
                let attributeValues = value_attributes.split(",");
           attributes[attributeName] = attributeValues;
           productsEvent.displayAttributes();
           productsEvent.createVariations();
            }else(
                alert('Their is not (,) at the last of your value')
            )


            }else{
                alert('Both Feild is Required')
            }
           

        },
        displayAttributes:function() {
            $(".dynamic_attributes").remove();
            for (const [attr, values] of Object.entries(attributes))
            {
                let cellValue = values.toString();
                $("#attributes_fields").prepend('<tr class="dynamic_attributes" id="row'+attr +'"><td><input type="text" disabled="true" name="attributes[name][]"  value="'+attr+'" placeholder="Enter your Name" class="form-control tableData" /></td><td><input type="text" disabled="true" value="'+cellValue+'" name="attributes[value][]"  placeholder="Enter your value with (,) seperated" class="form-control tableData" /></td><td><button type="button" name="remove" onclick="productsEvent.removeAttributes(\''+attr+'\')" class="btn btn-danger btn_remove">X</button></td></tr>');
            }
            $("#name_attributes").val('');
            $("#value_attributes").val('');
        },
        createVariations:function() {
            let attrs = [];
            if(Object.keys(attributes).length)
            {
            for (const [attr, values] of Object.entries(attributes))
              attrs.push(values.map(v => ({[attr]:v})));
            attrs = attrs.reduce((a, b) => a.flatMap(d => b.map(e => ({...d, ...e}))));

            $.each(attrs, function( index, value ) {
                attrs[index]['Qty'] = {value:0,placeholder:"Qty",type:'number',customClass:""};
                attrs[index]['Regular Price'] = {value:0,placeholder:"Regular Price",type:'number',customClass:""};
                attrs[index]['Sale Price'] = {value:0,placeholder:"Sale Price",type:'number',customClass:""};
                attrs[index]['Sku'] = {value:0,placeholder:"Sku",type:'text',customClass:""};
                attrs[index]['Image'] = {value:null,placeholder:"Image",type:'file',customClass:"dropify"};
            });
            variations = attrs;
            productsEvent.displayVariations();
            }
        },
        displayVariations:function() {
            $("#variations_fields").empty();
            $("#variations_heading").empty();
            if(variations && Object.keys(variations).length)
            {
            let headings = Object.keys(variations[0]);
            $.each(headings, function( index, value ) {
                $("#variations_heading").append('<th>'+value+'</th>');
            });
            $.each(variations, function( index, value ) {
                let testdata = {};
                let htmlString = '<tr class="variation-tr">';

              for (const [name, variation] of Object.entries(value))
                {
                    if(typeof variation === 'object' && variation !== null)
                    {
                        htmlString +='<td><input  name="variations['+name+'][]" class="form-control tableData '+variation.customClass+'" type="'+variation.type+'" onchange="productsEvent.updateVariationvalue(\''+index+'\',\''+name+'\',this.value)"  value="'+variation.value+'" placeholder="'+variation.placeholder+'"></td>';
                    }
                    else
                    {
                        htmlString +='<td><input name="variations['+name+'][]" class="form-control tableData" type="text" disabled="true" value="'+variation+'" placeholder="'+variation+'"></td>';
                    }
                    
                }
                
                htmlString += '<td><button type="button" name="remove" onclick="productsEvent.removeVariation(\''+index+'\')" class="btn btn-danger btn_remove">X</button></td>';
                htmlString += '</tr>';
                $("#variations_fields").append(htmlString);
            });
            }
        },
        removeAttributes:function(attribute_name)
        {
            delete attributes[attribute_name];
            productsEvent.displayAttributes();
            productsEvent.createVariations();
        },
        removeVariation:function(index)
        {
            variations.splice(index,1);
            productsEvent.displayVariations();
        },
        updateVariationvalue:function(index,key,value)
        {
            variations[index][key].value = value;
        },
        
    };

    productsEvent.initialize();

})();

// ajax product form submit 

$(document).ready(function (e) {
  
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $('#product-add-edit').submit(function(e) {
      e.preventDefault();
      $('.tableData').prop("disabled", false); // Element(s) are now enabled.
      var formData = new FormData(this);

      $.ajax({
          type:'POST',
          url: "{{isset($product) ? route('products.update',$product->id) : route('products.store')}}",
          data: formData,
          cache:false,
          contentType: false,
          processData: false,
         
          success:function(data)  {
              console.log(data)
            $('input[type="text"],texatrea, select', this).val('');
            var url ="{{ route('products.create') }}"; 
            $(location).attr('href', url);
          },
          error: function(data){
              console.log(data);
          
          }
      });
  });
});


//ajax image sent   

$(document).ready(function (e) {
  
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $('#upload_image_form').submit(function(e) {
      e.preventDefault();

      var formData = new FormData(this);

      $.ajax({
          type:'POST',
          url: "{{ route('save_photo')}}",
          data: formData,
          dataType: 'JSON',
          cache:false,
          contentType: false,
          processData: false,
         
          success: function(data){
           var counter = 0
              counter ++
            $("#imageAddFeild").prepend('<div id="row'+counter +'"><img class="imageSize" src="'+data.image+'" /><i class="fas fa-trash-alt btn_remove" id="'+counter+'"></i><input type="hidden"  value="' + data.image + '" name="image[]"  /> </div>');
            alert('Image Upload SuccessFully')
          },
          error: function(data){
              console.log(data);
          }
      });
  });
});
$(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
                 
});


// $(".btn-main-primary").click(function(event){
//    event.preventDefault();
//    $('.tableData').prop("disabled", false); // Element(s) are now enabled.
// });
</script>
@endsection

@section('scripts')
@if(isset($product))
{!! JsValidator::formRequest('App\Http\Requests\Admin\Product\UpdateProduct','#product-add-edit') !!}
@else
{!! JsValidator::formRequest('App\Http\Requests\Admin\Product\AddProduct','#product-add-edit') !!}
@endif

@endsection
