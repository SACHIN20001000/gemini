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

			<div class="variable_pricing">
				<p class="form-field variable_regular_price_0_field form-row form-row-first">
		<label for="variable_regular_price_0">Regular price (₹)</label><input type="text" class="short wc_input_price" style="" name="variable_regular_price[0]" id="variable_regular_price_0" value="" placeholder="Variation price (required)"> </p><p class="form-field variable_sale_price0_field form-row form-row-last">
		<label for="variable_sale_price0">Sale price (₹) <a href="#" class="sale_schedule">Schedule</a><a href="#" class="cancel_sale_schedule hidden">Cancel schedule</a></label><input type="text" class="short wc_input_price" style="" name="variable_sale_price[0]" id="variable_sale_price0" value="" placeholder=""> </p><div class="form-field sale_price_dates_fields hidden">
					<p class="form-row form-row-first">
						<label>Sale start date</label>
						<input type="text" class="sale_price_dates_from hasDatepicker" name="variable_sale_price_dates_from[0]" value="" placeholder="From… YYYY-MM-DD" maxlength="10" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" id="dp1639464879571">
					</p>
					<p class="form-row form-row-last">
						<label>Sale end date</label>
						<input type="text" class="sale_price_dates_to hasDatepicker" name="variable_sale_price_dates_to[0]" value="" placeholder="To…  YYYY-MM-DD" maxlength="10" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" id="dp1639464879572">
					</p>
				</div>			</div>

							<div class="show_if_variation_manage_stock" style="">
					<p class="form-field variable_stock0_field form-row form-row-first">
		<label for="variable_stock0">Stock quantity</label><span class="woocommerce-help-tip"></span><input type="number" class="short wc_input_stock" style="" name="variable_stock[0]" id="variable_stock0" value="0" placeholder="" step="any"> </p><input type="hidden" name="variable_original_stock[0]" value="0">	<p class="form-row form-row-last form-field variable_backorders0_field">
		<label for="variable_backorders0">Allow backorders?</label>
					<span class="woocommerce-help-tip"></span>				<select style="" id="variable_backorders0" name="variable_backorders[0]" class="select short">
			<option value="no" selected="selected">Do not allow</option><option value="notify">Allow, but notify customer</option><option value="yes">Allow</option>		</select>
			</p>
	<p class="form-field variable_low_stock_amount0_field form-row">
		<label for="variable_low_stock_amount0">Low stock threshold</label><span class="woocommerce-help-tip"></span><input type="number" class="short" style="" name="variable_low_stock_amount[0]" id="variable_low_stock_amount0" value="" placeholder="Store-wide threshold (2)" step="any"> </p>				</div>
			
			<div>
					<p class="form-row form-row-full variable_stock_status form-field variable_stock_status0_field" style="display: none;">
		<label for="variable_stock_status0">Stock status</label>
					<span class="woocommerce-help-tip"></span>				<select style="" id="variable_stock_status0" name="variable_stock_status[0]" class="select short">
			<option value="instock">In stock</option><option value="outofstock">Out of stock</option><option value="onbackorder" selected="selected">On backorder</option>		</select>
			</p>
	<p class="form-field variable_weight0_field form-row form-row-first hide_if_variation_virtual" style="display: none;">
		<label for="variable_weight0">Weight (kg)</label><span class="woocommerce-help-tip"></span><input type="text" class="short wc_input_decimal" style="" name="variable_weight[0]" id="variable_weight0" value="" placeholder="12"> </p>					<p class="form-field form-row dimensions_field hide_if_variation_virtual form-row-last" style="display: none;">
						<label for="product_length">
							Dimensions (L×W×H) (cm)						</label>
						<span class="woocommerce-help-tip"></span>						<span class="wrap">
							<input id="product_length" placeholder="12" class="input-text wc_input_decimal" size="6" type="text" name="variable_length[0]" value="">
							<input placeholder="12" class="input-text wc_input_decimal" size="6" type="text" name="variable_width[0]" value="">
							<input placeholder="12" class="input-text wc_input_decimal last" size="6" type="text" name="variable_height[0]" value="">
						</span>
					</p>
								</div>

			<div>
				<p class="form-row hide_if_variation_virtual form-row-full" style="display: none;">
					<label>Shipping class</label>
					<select name="variable_shipping_class[0]" id="variable_shipping_class[0]" class="postform">
	<option value="-1" selected="selected">Same as parent</option>
</select>
				</p>

							</div>
			<div>
				<p class="form-field variable_description0_field form-row form-row-full">
		<label for="variable_description0">Description</label><span class="woocommerce-help-tip"></span><textarea class="short" style="" name="variable_description[0]" id="variable_description0" placeholder="" rows="2" cols="20"></textarea> </p>			</div>
			<div class="show_if_variation_downloadable" style="">
				<div class="form-row form-row-full downloadable_files">
					<label>Downloadable files</label>
					<div>
								</div><div>
								</div><table class="widefat">
						<thead>
							<tr><th>Name <span class="woocommerce-help-tip"></span></th>
								<th colspan="2">File URL <span class="woocommerce-help-tip"></span></th>
								<th>&nbsp;</th>
							
						</tr></thead>
						<tbody>
													</tbody>
						<tfoot>
							<tr><th colspan="4">
									<a href="#" class="button insert" data-row="
									<tr>
	<td class=&quot;file_name&quot;>
		<input type=&quot;text&quot; class=&quot;input_text&quot; placeholder=&quot;File name&quot; name=&quot;_wc_variation_file_names[18][]&quot; value=&quot;&quot; />
		<input type=&quot;hidden&quot; name=&quot;_wc_variation_file_hashes[18][]&quot; value=&quot;&quot; />
	</td>
	<td class=&quot;file_url&quot;><input type=&quot;text&quot; class=&quot;input_text&quot; placeholder=&quot;http://&quot; name=&quot;_wc_variation_file_urls[18][]&quot; value=&quot;&quot; /></td>
	<td class=&quot;file_url_choose&quot; width=&quot;1%&quot;><a href=&quot;#&quot; class=&quot;button upload_file_button&quot; data-choose=&quot;Choose file&quot; data-update=&quot;Insert file URL&quot;>Choose file</a></td>
	<td width=&quot;1%&quot;><a href=&quot;#&quot; class=&quot;delete&quot;>Delete</a></td>
</tr>
									">Add file</a>
								</th>
							
						</tr></tfoot>
					</table>
				</div>
			</div>
			<div class="show_if_variation_downloadable" style="">
				<p class="form-field variable_download_limit0_field form-row form-row-first">
		<label for="variable_download_limit0">Download limit</label><span class="woocommerce-help-tip"></span><input type="number" class="short" style="" name="variable_download_limit[0]" id="variable_download_limit0" value="" placeholder="Unlimited" step="1" min="0"> </p><p class="form-field variable_download_expiry0_field form-row form-row-last">
		<label for="variable_download_expiry0">Download expiry</label><span class="woocommerce-help-tip"></span><input type="number" class="short" style="" name="variable_download_expiry[0]" id="variable_download_expiry0" value="" placeholder="Never" step="1" min="0"> </p>			</div>
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


