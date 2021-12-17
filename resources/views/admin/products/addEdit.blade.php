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
                    <form  id="product-add-edit" action="{{isset($product) ? route('products.update',$product->id) : route('products.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ isset($product) ? method_field('PUT'):'' }}
                        <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Name</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="name"  placeholder="Enter your name" type="text" value="{{isset($product) ? $product->name : '' }}">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Feature Image</label>
                                </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="feature_image"  type="file">
                                    @if(!empty($product->feature_image))
                                    <a href="{{$product->feature_image}}" _blank><img src="{{$product->feature_image}}"  height="50" width="50"></a>
                                    @endif
                            </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Description </label>
                                </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                             <textarea name="description" id="description" cols="30" rows="10"></textarea>
                            </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Product data</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">

			                    <select class="form-control" id="product_type" name="product_type">
                                <option selected="selected"  >Choose below...</option>
									<option  value="simple_product_section">Simple product</option>
									<option value="variable_product_section" >Variable product</option>
							
                                            </select>
                                </div>
                                </div>
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
					<div class="tab-pane active" id="general">
               
                            <div class="row row-xs align-items-center mg-b-20" id="regular_price">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Regular price (₹)</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="regular_price"  type="number" >
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20" id="sale_price">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Sale Price</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="sale_price"  type="number" >
                                </div>
                            </div>
					</div>
					<div class="tab-pane" id="inventory">
                    <div class="row row-xs align-items-center mg-b-20" id="sku">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">SKU</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="sku"  type="text" >
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20" id="stoke_quantity">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Stock quantity</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="stoke_quantity"  type="number" >
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20" id="backorders">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Allow backorders?</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">

			                        <select class="form-control" name="Allow_backorders">  
				
									<option value="Allow">Allow</option>
									<option value="Do Not Allow">Do Not Allow</option>
									<option value="Allow, But Notify Customer">Allow, But Notify Customer</option>
                                     </select>
                                </div>
                                </div>
                                <div class="row row-xs align-items-center mg-b-20" id="low_stock">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Low stock threshold</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="low_stock"  type="number" >
                                </div>
                            </div>
                            <div id="stock_individual">
                           <label lass="form-label mg-b-0" for="stock_individual">Sold individually</label>
                           <input type="checkbox" class="checkbox" style="" name="stock_individual"  value="yes" > 
                           <span class="description">Enable this to only allow one of this item to be bought in a single order</span>
                            <br>
                            </div>
					</div>
				
                    <div class="tab-pane" id="attributes">
                                     
                          
                           <table class="table table-bordered" id="dynamic_field">  
                                    <tr>  
                                         <td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>  
                                         <td><input type="text" name="value[]" placeholder="Enter your value" class="form-control value_list" /></td>  
                                         <td><input type="checkbox" class="checkbox" style="" name="visibile[]"  value="yes" > <span class="description">Visible on the product page</span></td>
                                         <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                    </tr>  
                               </table> 
                               
                            
					</div>
                    
               
                    </div>
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
                                    <input class="form-control" name="sku" id="sku_variable_product_section" type="text" >
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20" >
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Stock quantity</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="stoke_quantity"  type="number" >
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Allow backorders?</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">

			                        <select class="form-control" name="Allow_backorders">  
				
									<option value="Allow">Allow</option>
									<option value="Do Not Allow">Do Not Allow</option>
									<option value="Allow, But Notify Customer">Allow, But Notify Customer</option>
                                     </select>
                                </div>
                                </div>
                                <div class="row row-xs align-items-center mg-b-20" >
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Low stock threshold</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="low_stock"  type="number" >
                                </div>
                            </div>
                          
                           <label lass="form-label mg-b-0" for="stock_individual">Sold individually</label>
                           <input type="checkbox" class="checkbox" style="" name="stock_individual"  value="yes" > 
                           <span class="description">Enable this to only allow one of this item to be bought in a single order</span>
                            <br>
                            
					</div>
                    <!-- inventory ends  -->
				<!-- attribute start  -->
                    <div class="tab-pane" id="attribute">
                                     
                          
                           <table class="table table-bordered" id="attribute_field">  
                                    <tr>  
                                         <td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>  
                                         <td><input type="text" name="value[]" placeholder="Enter your value" class="form-control value_list" /></td>  
                                         <td><input type="checkbox" class="checkbox" style="" name="visibile[]"  value="yes" > <span class="description">Visible on the product page</span></td>
                                         <td><button type="button" name="add" id="adds" class="btn btn-success">Add More</button></td>  
                                    </tr>  
                               </table> 
                               
                            
					</div>
                    <!-- attributes ends  -->
                    <div class="tab-pane" id="variations">
           <!-- variation start  -->

           <input type="file" name="variation_image[]" class="form-control">
          
   <label for="variable_product_section_sku0">SKU</label><input type="text" class="form-control"  name="variable_product_section_sku" id="variable_product_section_sku"  placeholder="sku_001"> 			
   <p class="form-row form-row-full form-control options">
      <label>
          Enabled					<input type="checkbox" class="checkbox" name="variable_product_section_enabled" >
      </label>
    </p>
   
                  <div class="row row-xs align-items-center mg-b-20" id="regular_price">
                      <div class="col-md-4">
                          <label class="form-label mg-b-0">Regular price (₹)</label>
                      </div>
                      <div class="col-md-8 mg-t-5 mg-md-t-0">
                          <input class="form-control" name="regular_price"  type="number" >
                      </div>
                  </div>
                  <div class="row row-xs align-items-center mg-b-20" id="sale_price">
                      <div class="col-md-4">
                          <label class="form-label mg-b-0">Sale Price</label>
                      </div>
                      <div class="col-md-8 mg-t-5 mg-md-t-0">
                          <input class="form-control" name="sale_price"  type="number" >
                      </div>
                  </div>
   
                  <div class="row row-xs align-items-center mg-b-20" id="stoke_quantity">
                      <div class="col-md-4">
                          <label class="form-label mg-b-0">Stock quantity</label>
                      </div>
                      <div class="col-md-8 mg-t-5 mg-md-t-0">
                          <input class="form-control" name="stoke_quantity"  type="number" >
                      </div>
                  </div>
                  <div class="row row-xs align-items-center mg-b-20" id="backorders">
                      <div class="col-md-4">
                          <label class="form-label mg-b-0">Allow backorders?</label>
                      </div>
                      <div class="col-md-8 mg-t-5 mg-md-t-0">
   
                          <select class="form-control" name="Allow_backorders">  
      
                          <option value="Allow">Allow</option>
                          <option value="Do Not Allow">Do Not Allow</option>
                          <option value="Allow, But Notify Customer">Allow, But Notify Customer</option>
                  
                                  </select>
                      </div>
                      </div>  
                      
                      <div class="row row-xs align-items-center mg-b-20" id="backorders">
                      <div class="col-md-4">
                          <label class="form-label mg-b-0">Low stock threshold</label>
                      </div>
                      <div class="col-md-8 mg-t-5 mg-md-t-0">
                      <input class="form-control" name="low_stock"  type="number" >
                      </div>
                      </div>
                     
                      <div class="row row-xs align-items-center mg-b-20" id="backorders">
                      <div class="col-md-4">
                          <label class="form-label mg-b-0">Description</label>
                      </div>
                      <div class="col-md-8 mg-t-5 mg-md-t-0">
                      <textarea name="desc"  class="form-control"cols="30" rows="10"></textarea>
                      </div>
                      </div>
    

                 <!-- variation  end-->
                <div>


 
    
                    </div>
                    </div>
                    </div>
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
  if (val === 'simple_product_section') {
    $('#variable_product_section').hide();
    $('#simple_product_section').show();
    }  
    else if (val === 'variable_product_section') {       
            $('#simple_product_section').hide();
            $('#variable_product_section').show();
           
            $('#sku_variable_product_section').show();

    }
    else if (val === 'Choose below...') {       
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
           $('#dynamic_field').append('<tr id="row'+counter +'"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><input type="text" name="value[]" placeholder="Enter your value" class="form-control value_list" /></td><td><input type="checkbox" class="checkbox" style="" name="visibile[]"  value="yes" ><span class="description">Visible on the product page</span></td><td><button type="button" name="remove" id="'+counter+'" class="btn btn-danger btn_remove">X</button></td></tr>');
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      }); 
    });
      $(document).ready(function(){  
var conts =1;  
      $('#adds').click(function(){  
        conts ++;  
           $('#attribute_field').append('<tr id="row'+conts +'"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><input type="text" name="value[]" placeholder="Enter your value" class="form-control value_list" /></td><td><input type="checkbox" class="checkbox" style="" name="visibile[]"  value="yes" ><span class="description">Visible on the product page</span></td><td><button type="button" name="remove" id="'+conts+'" class="btn btn-danger btn_remove">X</button></td></tr>');
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      }); 
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


