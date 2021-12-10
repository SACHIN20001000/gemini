@extends('admin.layouts.app')
@section('content')
<div class="container">
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Brands</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ {{isset($brand) ? $brand->name : 'Add New' }}</span>
            </div>
        </div>
        <a class="btn btn-main-primary ml_auto" href="{{ route('brands.index') }}">View Brands</a>
    </div>
    <!-- breadcrumb -->
    <!--Row-->
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        {{isset($brand) ? 'Update # '.$brand->id : 'Add New' }}
                    </div>
                    

                    <!--  start  --> 
                    <form  id="brand-add-edit" action="{{isset($brand) ? route('brands.update',$brand->id) : route('brands.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ isset($brand) ? method_field('PUT'):'' }}
                        <div class="pd-30 pd-sm-40 bg-gray-200">
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Name</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="name"  placeholder="Enter your name" type="text" value="{{isset($brand) ? $brand->name : '' }}">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Logo</label>
                                </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="logo"  type="file">
                                    @if(!empty($brand->logo))
                                    <a href="{{$brand->logo}}" _blank><img src="{{$brand->logo}}"  height="50" width="50"></a>
                                    @endif                                    
                                </div>
                            </div>
                            <button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5" type="submit">{{isset($brand) ? 'Update' : 'Save' }}</button>
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
@if(isset($brand))
{!! JsValidator::formRequest('App\Http\Requests\Admin\Brands\UpdateBrandS','#brand-add-edit') !!}
@else
{!! JsValidator::formRequest('App\Http\Requests\Admin\Brands\AddBrandS','#brand-add-edit') !!}
@endif

@endsection


