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
                                    <label class="form-label mg-b-0">Product data</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">

			                    <select class="form-control" id="product_type" name="product_type">
                               
									<option selected="selected" value="simple">Simple product</option>
									<option value="grouped">Grouped product</option>
									<option value="external">External/Affiliate product</option>
									<option value="variable" >Variable product</option>
							
                                            </select>
                                </div>
                                </div>

                    <div class="d-md-flex">
		<div class="">
			<div class="panel panel-primary tabs-style-4">
				<div class="tab-menu-heading">
					<div class="tabs-menu ">
						<!-- Tabs -->
						<ul class="nav panel-tabs">
							<li class="general"><a href="#general" class="active" data-bs-toggle="tab"><i class="fa fa-laptop"></i> General</a></li>
							<li class="inventory"><a href="#inventory" data-bs-toggle="tab"><i class="fa fa-cube"></i> Inventory</a></li>
							<li class="shipping"><a href="#shipping" data-bs-toggle="tab"><i class="fa fa-cogs"></i> Shipping</a></li>
							<li class="linked_product"><a href="#linked_product" data-bs-toggle="tab"><i class="fa fa-tasks"></i>Linked Product</a></li>
							<li class="attributes"><a href="#attributes" data-bs-toggle="tab"><i class="fa fa-tasks"></i>Attributes</a></li>
							<li class="advanced"><a href="#advanced" data-bs-toggle="tab"><i class="fa fa-tasks"></i>Advanced</a></li>
							<li class="variations"><a href="#variations" data-bs-toggle="tab"><i class="fa fa-tasks"></i>Variations</a></li>

							
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="tabs-style-4">
			<div class="panel-body tabs-menu-body">
				<div class="tab-content">
					<div class="tab-pane active" id="general">
                    <div class="row row-xs align-items-center mg-b-20"  id="product_url">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Product URL</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="product_url"  type="text">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20" id="button_text">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Button text</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="button_text"  type="text" >
                                </div>
                            </div>
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
                           <input type="checkbox" class="checkbox" style="" name="stock_individual"  value="yes" checked="checked"> 
                           <span class="description">Enable this to only allow one of this item to be bought in a single order</span>
                            <br>
                            </div>
					</div>
					<div class="tab-pane" id="shipping">
                    <div class="row row-xs align-items-center mg-b-20"  id="weight">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Weight (kg)</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="weight"  type="text">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20" id="dimension">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Dimensions (cm)</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="dimension"  type="text" >
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20" id="shipping class">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Shipping class</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="shipping class"  type="number" >
                                </div>
                            </div>
					</div>
					<div class="tab-pane" id="linked_product">
                    <div class="row row-xs align-items-center mg-b-20"  id="upsells">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Upsells</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="upsells"  type="text">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20" id="cross_sells">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Cross-sells</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="cross_sells"  type="text" >
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20" id="grouped_products">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Grouped products</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="grouped_products"  type="number" >
                                </div>
                            </div>
  
					</div>
                    <div class="tab-pane" id="attributes">
                                     
                          
                           <table class="table table-bordered" id="dynamic_field">  
                                    <tr>  
                                         <td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>  
                                         <td><input type="text" name="value[]" placeholder="Enter your value" class="form-control value_list" /></td>  
                                         <td><input type="checkbox" class="checkbox" style="" name="visibile"  value="yes" checked="checked"> <span class="description">Visible on the product page</span></td>
                                         <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                    </tr>  
                               </table> 
                               
                            
					</div>
                    <div class="tab-pane" id="advanced">
                    <div class="row row-xs align-items-center mg-b-20" id="menu_order">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Menu order</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="menu_order"  type="number" >
                                </div>
                            </div>
                            <div id="reviews">
                            <label lass="form-label mg-b-0" for="reviews">Enable reviews</label>
                           <input type="checkbox" class="checkbox" style="" name="reviews"  value="yes" checked="checked">
                           </div>
					</div>
                    <div class="tab-pane" id="variations">
                        <!-- variation start  -->
                    
		
			
				<input type="file" name="variation_image[]" class="form-control">
				
			
			
		<label for="variable_sku0">SKU</label><input type="text" class="form-control"  name="variable_sku[0]" id="variable_sku"  placeholder="sku_001"> 			<p class="form-row form-row-full options">
				<label>
					Enabled					<input type="checkbox" class="checkbox" name="variable_enabled[0]" checked="checked">
				</label>
				<label class="tips">
					Downloadable					<input type="checkbox" class="checkbox variable_is_downloadable" name="variable_is_downloadable[0]">
				</label>
				<label class="tips">
					Virtual					<input type="checkbox" class="checkbox variable_is_virtual" name="variable_is_virtual[0]">
				</label>

									<label class="tips">
						Manage stock?						<input type="checkbox" class="checkbox variable_manage_stock" name="variable_manage_stock[0]">
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
                                <div class="row row-xs align-items-center mg-b-20" id="low_stock">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Low stock threshold</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="low_stock"  type="number" >
                                </div>
                                <div class="row row-xs align-items-center mg-b-20" id="low_stock">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Description</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                   <textarea name="desc" id="desc" class="form-control"cols="20" rows="10"></textarea>
                                </div>

			<div>
			
			<div class="show_if_variation_downloadable" style="">
				<p class="form-field variable_download_limit0_field form-row form-row-first">
		<label for="variable_download_limit0">Download limit</label><span class="woocommerce-help-tip"></span><input type="number" class="form-control" style="" name="variable_download_limit[0]" id="variable_download_limit0" value="" placeholder="Unlimited" step="1" min="0"> </p><p class="form-field variable_download_expiry0_field form-row form-row-last">
		<label for="variable_download_expiry0">Download expiry</label><span class="woocommerce-help-tip"></span><input type="number" class="form-control" style="" name="variable_download_expiry[0]" id="variable_download_expiry0" value="" placeholder="Never" step="1" min="0"> </p>			</div>
					</div>
                  <!-- variation  -->
					</div>
				</div>
			</div>
		</div>
	</div>
    <button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5" type="submit">{{isset($product) ? 'Update' : 'Save' }}</button>
</form>
           
                <!-- form end  -->
            </div>
        </div>
    </div>
    <!-- /row -->
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script> 
<script type="text/javascript">
    jQuery(function($) {
  $('#product_type').change(function () {
    var val = $(this).val();

  if (val === 'simple') {

            $('#product_url').hide();
            $('#button_text').hide();
            $('#grouped_products').hide();


    }
    else if (val === 'grouped') {
        $('#regular_price').hide();
            $('#sale_price').hide();

            $('#product_url').hide();
            $('#button_text').hide();

            $('#stock_individual').hide();
            $('#cross_sells').hide();
            $('.general').hide();
            $('#general').hide();

            $('#shipping').hide();
            $('.shipping').hide();


    }
    else if (val === 'external') {

            $('#stock_individual').hide();
            $('#shipping').hide();
            $('.shipping').hide();
            $('#grouped_products').hide();
            $('#cross_sells').hide();




    }
    else if (val === 'variable') {
        $('#regular_price').hide();
            $('#sale_price').hide();
       
            $('#product_url').hide();
            $('#button_text').hide();
      
            $('#general').hide();
            $('.general').hide();
      
            $('#grouped_products').hide();


    }
   
  });
});
$(document).ready(function(){  
var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><input type="text" name="value[]" placeholder="Enter your value" class="form-control value_list" /></td><td><input type="checkbox" class="checkbox" style="" name="visibile"  value="yes" checked="checked"><span class="description">Visible on the product page</span></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');


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


