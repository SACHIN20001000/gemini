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
                    <form  id="category-add-edit" action="{{isset($category) ? route('categories.update',$category->id) : route('categories.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ isset($category) ? method_field('PUT'):'' }}
                        <div class="pd-30 pd-sm-40 bg-gray-200">
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Name</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="name"  placeholder="Enter your name" type="text" value="{{isset($category) ? $category->name : '' }}">
                                    <input  name="type" type="hidden" value="Product">

                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Feature Image</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                               
                                @if(!empty($category->feature_image))
                                <input type="file" class="dropify" data-default-file="{{$category->feature_image}}" name="feature_image"  id="feature_image">

                                @else
                                <input type="file" class="dropify"  name="feature_image" id="feature_image">


                                @endif
                                  
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Parent Category</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <select name="parent"  class="form-control">
                                        <option value="0">Choose Below..</option>
                                        @foreach($categories as $item)
                                        <option {{ (isset($category) && $category->parent  == $item->id) ? 'selected' : '' }}  value="{{$item->id}}">  {{$item->name}}</option>
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
                                        <option value="1" {{ (isset($category) && $category->status  == 1) ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ (isset($category) && $category->status  == 0) ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Order</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="order"  placeholder="Enter your order" type="number" value="{{isset($category) ? $category->order : '' }}">
                                   

                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Color</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input type="color" name="color" placeholder="Enter Your color"  class="form-control" value="{{isset($category) ? $category->color : '' }}" >
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Tag Line</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                              
                                <input type="text" name="tag_line"  class="form-control" placeholder="Enter Your tag line" value="{{isset($category) ? $category->tag_line : '' }}" >

                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Description</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <textarea name="description"  >{{isset($category) ? $category->description : '' }}</textarea>
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
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
$('textarea').summernote({
                                            toolbar: [
                                            ['font', ['bold', 'italic', 'underline', 'clear']],
                                            ['insert', ['link','image', 'doc', 'video']],
                                            ['misc', ['codeview']],
                                            ],
                                        height: 250
                                        });
                                        $('.dropify').dropify();
</script>
@if(isset($category))
{!! JsValidator::formRequest('App\Http\Requests\Admin\Category\UpdateCategory','#category-add-edit') !!}
@else
{!! JsValidator::formRequest('App\Http\Requests\Admin\Category\AddCategory','#category-add-edit') !!}
@endif

@endsection


