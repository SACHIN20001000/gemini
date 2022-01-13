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
                                    <label class="form-label mg-b-0">User Name</label>
                                </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <input class="form-control" name="sh_name"  placeholder="Enter your name" type="text" value="{{isset($order) ? $order->shipping->sh_name : '' }}">
                            <input clas name="id"  type="hidden" value="{{isset($order) ? $order->shipping->id : '' }}">


                                                              
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Phone</label>
                                </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <input class="form-control" name="sh_phone"  placeholder="Enter your phone" type="text" value="{{isset($order) ? $order->shipping->sh_phone : '' }}">

                                                              
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Email</label>
                                </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <input class="form-control" name="sh_email"  placeholder="Enter your email" type="email" value="{{isset($order) ? $order->shipping->sh_email : '' }}">

                                                              
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Address</label>
                                </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <input class="form-control" name="sh_address"  placeholder="Enter your address" type="text" value="{{isset($order) ? $order->shipping->sh_address : '' }}">

                                                              
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">PinCode</label>
                                </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <input class="form-control" name="sh_zip_code"  placeholder="Enter your address" type="text" value="{{isset($order) ? $order->shipping->sh_zip_code : '' }}">

                                                              
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">City</label>
                                </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <input class="form-control" name="sh_city"  placeholder="Enter your address" type="text" value="{{isset($order) ? $order->shipping->sh_city : '' }}">

                                                              
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">State</label>
                                </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <input class="form-control" name="sh_state"  placeholder="Enter your address" type="text" value="{{isset($order) ? $order->shipping->sh_state : '' }}">

                                                              
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Country</label>
                                </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <input class="form-control" name="sh_country"  placeholder="Enter your address" type="text" value="{{isset($order) ? $order->shipping->sh_country : '' }}">

                                                              
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Status</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                   <select name="status" class="form-control"  >
                                       <option value="pending" {{$order->status == 'pending' ? 'Selected' : '' }}>pending</option>
                                       <option value="processing"{{$order->status == 'processing' ? 'Selected' : '' }}>processing</option>
                                       <option value="completed"{{$order->status == 'completed' ? 'Selected' : '' }}>completed</option>
                                       <option value="decline"{{$order->status == 'decline' ? 'Selected' : '' }}>decline</option>

                                   </select>
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


