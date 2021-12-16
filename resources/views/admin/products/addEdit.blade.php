@extends('admin.layouts.app')
@section('content')
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
                    <form  id="product-add-edit" action="{{isset($product) ? route('products.update',$product->id) : route('products.store')}}" method="POST" enctype="application/x-www-form-urlencoded">
                        @csrf
                        {{ isset($product) ? method_field('PUT'):'' }}
                        <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Name</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="productName"  placeholder="Enter your name" type="text" value="{{isset($product) ? $product->productName : '' }}">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Feature Image</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                        <input class="form-control" name="feature_image"  type="file">
                                        @if(!empty($product->feature_image))
                                        <a href="{{$product->feature_image}}" target="_blank" ><img src="{{$product->feature_image}}"  height="50" width="50"></a>
                                        @endif
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
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Product data</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">

                                <select class="form-control" id="product_type" name="type">
                                <option selected="selected" value=""  >Choose below...</option>
                                    <option  value="Single Product" {{ (isset($product) && @$product->type == 'Single Product') ? 'selected' : '' }} >Simple product</option>
                                    <option value="Variation" {{ (isset($product) && @$product->type == 'Variation') ? 'selected' : '' }}>Variable product</option>

                                            </select>
                                </div>
                            </div>
<!-- simple product section start   -->
            <div id="simple_product_section">

            <div class="panel panel-primary tabs-style-4">
                <div class="tab-menu-heading">
                    <div class="tabs-menu ">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs">
                            <li ><a href="#general" class="active" data-bs-toggle="tab"><i class="fa fa-laptop"></i> General</a></li>
                            <li ><a href="#inventory" data-bs-toggle="tab"><i class="fa fa-cube"></i> Inventory</a></li>
                            <li ><a href="#attributes" data-bs-toggle="tab"><i class="fa fa-tasks"></i>Attributes</a></li>


                        </ul>
                    </div>
                </div>
            </div>
                <style>
                    ul.nav.panel-tabs{grid-gap:10px;}
                    .tabs-style-4 .nav.panel-tabs li {width: auto;}
                    .tabs-style-4 .tab-menu-heading { width: 100%;}
                </style>


            <div class="tabs-style-4">
            <div class="panel-body ">
                <div class="tab-content">
                    <!-- general start  -->
                    <div class="tab-pane active" id="general">

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
                    <!-- general end  -->
                    <!-- inventory start   -->
                    <div class="tab-pane" id="inventory">
                            <div class="row row-xs align-items-center mg-b-20" id="sku">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">SKU</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="sku" value="{{isset($product) ? $product->productSku[0]->sku : '' }}" type="text" >
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20" >
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Stock quantity</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="qty" value="{{isset($product) ? $product->productSku[0]->qty : '' }}" type="number" >
                                </div>
                            </div>
                    
                    </div>
                    <!-- inventory start  -->
    <!-- attribut start  -->
                    <div class="tab-pane" id="attributes">


                            <table class="table table-bordered" id="dynamic_field">
                                    <tr>
                                            <td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>
                                            <td><input type="text" name="value[]" placeholder="Enter your value" class="form-control value_list" /></td>
                                            <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                                    </tr>
                                </table>


                    </div>

    <!-- attributes ends  -->
                    </div>
                </div>
            </div>
          </div>        
    <!-- simple_product_section ends  -->

    <!-- variable_product_section  -->

        <div id="variable_product_section">
			<div class="panel panel-primary tabs-style-4">
				<div class="tab-menu-heading">
					<div class="tabs-menu ">
						<!-- Tabs -->
						<ul class="nav panel-tabs">
							<li ><a href="#inventor" data-bs-toggle="tab"><i class="fa fa-cube"></i> Inventory</a></li>
							<li ><a href="#attribute" data-bs-toggle="tab"><i class="fa fa-tasks"></i>Attributes</a></li>
							<li ><a href="#variations" data-bs-toggle="tab"><i class="fa fa-tasks"></i>Variations</a></li>
						</ul>
					</div>
				</div>
			</div>
        <div class="tabs-style-4">
			<div class="panel-body ">
			  <div class="tab-content">
			<!-- inventory start  -->
					    <div class="tab-pane" id="inventor">
                            <div class="row row-xs align-items-center mg-b-20" >
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">SKU</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">

                                    <input class="form-control" name="variation_sku" value="{{isset($product) ? $product->productSku[0]->sku : '' }}" type="text" >
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20" >
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Stock quantity</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="variation_qty" value="{{isset($product) ? $product->productSku[0]->qty : '' }}"  type="number" >
                                </div>
                            </div>
                        </div>
                    <!-- inventory ends  -->
				<!-- attribute start  -->
                    <div class="tab-pane" id="attribute">
                                <table class="table table-bordered" id="attribute_field">
                                    <tr>
                                         <td><input type="text" name="name"  placeholder="Enter your Name" class="form-control name_list" /></td>
                                         <td><input type="text" name="value"  id="value_attributes" placeholder="Enter your value with (,) seperated" class="form-control value_list" /></td>
                                         <td><button type="button" name="add"  id="adds" class="btn btn-success">Add</button></td>
                                    </tr>
                               </table>
                    </div>
                    <!-- attributes ends  -->
                <div class="tab-pane" id="variations">
                <!-- variation start  -->
                <div class="row row-xs align-items-center mg-b-20" >
                      <div class="col-md-4">
                          <label class="form-label mg-b-0">Variation attributes</label>
                      </div>
                      <div class="col-md-8 mg-t-5 mg-md-t-0">
                      <select class="form-control selectAttribute" id="variation_attributes"  name="variation_attributes">
                    <option value="">Choose below..</option>
                    </select>     
                      </div>
                  </div>
               
                  <div id='dynamic_attribut' style="border-style: inset;">
               
                  </div>
                  <div id ="addingFeild" ></div>
                </div>
                <!-- variation  end-->
          
                </div>
            </div>
        </div>
    </div>             

                    <!-- variable_product_section end  -->

    <button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5" type="submit">{{isset($product) ? 'Update' : 'Save' }}</button>
</form>

                <!-- form end  -->
            </div>
        </div>
    </div>
    <!-- /row -->
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

<script type="text/javascript">
    // description editor code
    CKEDITOR.replace( 'description' );
    CKEDITOR.replace( 'desc' );


    // hide show product sectio
       $('#variable_product_section').hide();
    $('#simple_product_section').hide();
    jQuery(function($) {
  $('#product_type').change(function () {
    var val = $(this).val();
  if (val === 'Single Product') {
    $('#variable_product_section').hide();
    $('#simple_product_section').show();
    }
    else if (val === 'Variation') {
            $('#simple_product_section').hide();
            $('#variable_product_section').show();

            $('#sku_variable_product_section').show();

    }
    else if (val === '') {
       $('#simple_product_section').hide();
       $('#variable_product_section').hide();
}
  });
});
// add multi ple feild
$(document).ready(function(){
var counter =1;
      $('#add').click(function(){
        counter ++;
           $('#dynamic_field').append('<tr id="row'+counter +'"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><input type="text" name="value[]" placeholder="Enter your value" class="form-control value_list" /></td><td><button type="button" name="remove" id="'+counter+'" class="btn btn-danger btn_remove">X</button></td></tr>');
      });
      $(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           $('#row'+button_id+'').remove();
      });
    });




 //ADMING ATTRIBUTES FEILD
    $("#adds").click(function(){
       
        var selectValues= document.getElementById('value_attributes').value;
        var arr = selectValues.split(',');

                var $mySelect = $('#variation_attributes');
               
            
                $.each(arr, function(key, value) {
  var $option = $("<option/>", {
    value: value,
    text: value
  });
  $mySelect.append($option);
});
               
    }); 

//ADD DYNAMIC VARIATION 
var counter = 1;
        $(".selectAttribute").change(function(){
            var id=$(this).val();
            if(id){
                var newTextBoxDiv = $("<div>").attr("id", 'dynamic_attribut' + counter);
                newTextBoxDiv.html('<p style="font-size: 20px;">'+id+' </p><input type="hidden" name="variation_attributes[]" value="'+id+'"> <div class="row row-xs align-items-center mg-b-20" ><div class="col-md-4"> <label class="form-label mg-b-0">Variation Name</label> </div><div class="col-md-8 mg-t-5 mg-md-t-0"><input type="text" name="variation_name[]" value="{{isset($product) ? $product->productVariation[0]->variation_name : '' }}" class="form-control"></div></div><div class="row row-xs align-items-center mg-b-20" ><div class="col-md-4"><label class="form-label mg-b-0">Image</label></div><div class="col-md-8 mg-t-5 mg-md-t-0"><input type="file" name="image[]" class="form-control">@if(!empty($product->productVariation[0]->image))<a href="{{$product->productVariation[0]->image}}" target="_blank"><img src="{{$product->productVariation[0]->image}}"  height="50" width="50"></a>@endif</div></div><div class="row row-xs align-items-center mg-b-20" ><div class="col-md-4"><label class="form-label mg-b-0">SKU</label></div><div class="col-md-8 mg-t-5 mg-md-t-0"><input type="text" class="form-control" value="{{isset($product) ? $product->productSku[0]->sku : '' }}"  name="variation_sku[]"   placeholder="sku_001"></div></div><div class="row row-xs align-items-center mg-b-20" ><div class="col-md-4"><label class="form-label mg-b-0">Regular price (₹)</label></div><div class="col-md-8 mg-t-5 mg-md-t-0"><input class="form-control" name="variation_real_price[]" value="{{isset($product) ? $product->productVariation[0]->real_price : '' }}"  type="number" ></div></div><div class="row row-xs align-items-center mg-b-20" id="sale_price"><div class="col-md-4"><label class="form-label mg-b-0">Sale Price</label></div><div class="col-md-8 mg-t-5 mg-md-t-0"><input class="form-control" name="variation_sale_price[]" value="{{isset($product) ? $product->productVariation[0]->sale_price : '' }}" type="number" ></div></div>');
                newTextBoxDiv.appendTo("#addingFeild");
                counter++;
            }
    });
</script>
@endsection

@section('scripts')
@if(isset($product))
{!! JsValidator::formRequest('App\Http\Requests\Admin\Product\UpdateProduct','#product-add-edit') !!}
@else
{!! JsValidator::formRequest('App\Http\Requests\Admin\Product\AddProduct','#product-add-edit') !!}
@endif

@endsection
