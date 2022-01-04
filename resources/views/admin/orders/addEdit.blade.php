@extends('admin.layouts.app')
@section('content')
<div class="container">
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Order</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ {{isset($order) ? $order->name : 'Add New' }}</span>
            </div>
        </div>
        <a class="btn btn-main-primary ml_auto" href="{{ route('orders.index') }}">View Orders</a>
    </div>
    <!-- breadcrumb -->
    <!--Row-->
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        {{isset($order) ? 'Update # '.$order->id : 'Add New' }}
                    </div>
                    

                    <!--  start  --> 
                    <form  id="order-add-edit" action="{{isset($order) ? route('orders.update',$order->id) : route('orders.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ isset($order) ? method_field('PUT'):'' }}
                        <div class="pd-30 pd-sm-40 bg-gray-200">
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Product Name</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="products"  placeholder="Enter your product name" type="text" value="{{isset($order) ? $order->products : '' }}">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Price</label>
                                </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <input class="form-control" name="totalPrice"  placeholder="Enter your product price" type="text" value="{{isset($order) ? $order->totalPrice : '' }}">

                                                              
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">User Name</label>
                                </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <input class="form-control" name="name"  placeholder="Enter your name" type="text" value="{{isset($order) ? $order->name : '' }}">

                                                              
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Address</label>
                                </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <input class="form-control" name="address"  placeholder="Enter your address" type="text" value="{{isset($order) ? $order->address : '' }}">

                                                              
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Transaction Id	</label>
                                </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <input class="form-control" name="transactionID"  placeholder="Enter your transactionID	" type="text" value="{{isset($order) ? $order->transactionID : '' }}">

                                                              
                                </div>
                            </div>
                            <button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5" type="submit">{{isset($order) ? 'Update' : 'Save' }}</button>
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
@if(isset($order))
{!! JsValidator::formRequest('App\Http\Requests\Admin\Orders\UpdateOrders','#order-add-edit') !!}
@else
{!! JsValidator::formRequest('App\Http\Requests\Admin\orders\Addorders','#order-add-edit') !!}
@endif

@endsection


