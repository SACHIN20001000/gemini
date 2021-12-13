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
                    

                    <!--  start  --> 
                    <form  id="product-add-edit" action="{{isset($product) ? route('products.update',$product->id) : route('products.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ isset($product) ? method_field('PUT'):'' }}
                        <div class="pd-30 pd-sm-40 bg-gray-200">
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Category</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <select name="category"  class="form-control">
                                        <option value="0">Choose Below..</option>
                                        @foreach($categories as $category)
                                        <option {{ (isset($product) && $product->category  == $category->id) ? 'selected' : '' }}  value="{{$category->id}}">  {{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">SKU</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="sku"  placeholder="Enter your sku" type="text" value="{{isset($product) ? $product->sku : '' }}">
                                </div>
                            </div>
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
                                    <label class="form-label mg-b-0">Description</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <textarea name="description" class="form-control"   cols="30" rows="10">{{isset($product) ? $product->description : '' }}</textarea>
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Quantity</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="quantity"  placeholder="Enter quantity" type="number" value="{{isset($product) ? $product->quantity : '' }}">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Weight</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="weight"  placeholder="Enter weight" type="number" value="{{isset($product) ? $product->weight : '' }}">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Price</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="price"  placeholder="Enter your price" type="number" value="{{isset($product) ? $product->price : '' }}">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Sale Price</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="sale_price"  placeholder="Enter your sale price" type="number" value="{{isset($product) ? $product->sale_price : '' }}">
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
                                    <label class="form-label mg-b-0">Featured</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="featured"  placeholder="Enter your featured" type="number" value="{{isset($product) ? $product->featured : '' }}">
                                </div>
                            </div>
                            <button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5" type="submit">{{isset($product) ? 'Update' : 'Save' }}</button>
                        </div>
                </div>
                </form>
                <!-- form end  -->
            </div>
        </div>
    </div>
    <!-- /row -->
</div>


@endsection

@section('scripts')
@if(isset($product))
{!! JsValidator::formRequest('App\Http\Requests\Admin\Product\UpdateProduct','#product-add-edit') !!}
@else
{!! JsValidator::formRequest('App\Http\Requests\Admin\Product\AddProduct','#product-add-edit') !!}
@endif

@endsection


