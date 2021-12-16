@extends('admin.layouts.app')
@section('content')

<div class="container">
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Attributes</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ {{isset($attribute) ? $attribute->name : 'Add New' }}</span>
            </div>
        </div>
        <a class="btn btn-main-primary ml_auto" href="{{ route('attributes.index') }}">View Attributes</a>
    </div>
    <!-- breadcrumb -->
    <!--Row-->
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        {{isset($attribute) ? 'Update # '.$attribute->id : 'Add New' }}
                    </div>
                    

                    <!--  start  --> 
                    <form  id="attribute-add-edit" action="{{isset($attribute) ? route('attributes.update',$attribute->id) : route('attributes.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ isset($attribute) ? method_field('PUT'):'' }}
                        <div class="pd-30 pd-sm-40 bg-gray-200">
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Name</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="name"  placeholder="Enter your name" type="text" value="{{isset($attribute) ? $attribute->name : '' }}">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Value</label>
                                </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="value"  placeholder="Enter your value" type="text" value="{{isset($attribute) ? $attribute->variationAttributeName->name : '' }}">
                                                                       
                                </div>
                            </div>
                            <button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5" type="submit">{{isset($attribute) ? 'Update' : 'Save' }}</button>
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
@if(isset($attribute))
{!! JsValidator::formRequest('App\Http\Requests\Admin\Attributes\UpdateAttributes','#attribute-add-edit') !!}
@else
{!! JsValidator::formRequest('App\Http\Requests\Admin\Attributes\AddAttributes','#attribute-add-edit') !!}
@endif

@endsection


