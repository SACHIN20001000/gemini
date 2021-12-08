@extends('admin.layouts.app')
@section('content')
<div class="container">
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Categories</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ {{isset($category) ? $category->name : 'Add New' }}</span>
            </div>
        </div>
        <a class="btn btn-main-primary ml_auto" href="{{ route('categories.index') }}">View Categories</a>
    </div>
    <!-- breadcrumb -->
    <!--Row-->
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        {{isset($category) ? 'Update # '.$category->id : 'Add New' }}
                    </div>
                    

                    <!--  start  --> 
                    <form  id="category-add-edit" action="{{isset($category) ? route('categories.update',$category->id) : route('categories.store')}}" method="POST">
                        @csrf
                        {{ isset($category) ? method_field('PUT'):'' }}
                        <div class="pd-30 pd-sm-40 bg-gray-200">
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Name</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="name"  placeholder="Enter your name" type="text" value="{{isset($category) ? $category->name : '' }}">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Parent Category</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <select name="parent_id"  class="form-control">
                                        <option value="0">Choose Below..</option>
                                        @foreach($categories as $item)
                                        <option {{ (isset($category) && $category->parent_id  == $item->id) ? 'selected' : '' }}  value="{{$item->id}}">  {{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5" type="submit">{{isset($category) ? 'Update' : 'Save' }}</button>
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
@if(isset($category))
{!! JsValidator::formRequest('App\Http\Requests\Admin\Category\UpdateCategory','#category-add-edit') !!}
@else
{!! JsValidator::formRequest('App\Http\Requests\Admin\Category\AddCategory','#category-add-edit') !!}
@endif

@endsection


