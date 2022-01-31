
@extends('admin.layouts.app')
@section('content')
<div class="container">
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Pet</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ {{isset($rating) ? $rating->name : 'Add New' }}</span>
            </div>
        </div>
        <a class="btn btn-main-primary ml_auto" href="{{ route('users.show', $pet->user_id ) }}">View Pets</a>
    </div>
    <!-- breadcrumb -->
    <!--Row-->
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        {{isset($pet) ? 'Update # '.$pet->id : 'Add New' }}
                    </div>


                    <!--  start  -->
                    <form  id="pet-add-edit" action="{{isset($pet) ? route('update',$pet->id) :  ''}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ isset($pet) ? method_field('PUT'):'' }}
                        <div class="pd-30 pd-sm-40 bg-gray-200">
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Pet Name</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="name"   placeholder="Enter your Pet name" type="text" value="{{isset($pet) ? $pet->name : '' }}">

                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Pet Age</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="age"   placeholder="Enter your Pet age" type="text" value="{{isset($pet) ? $pet->age : '' }}">

                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Pet type</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <select name="type" id="">

                                <option value="dog" {{ (isset($pet) && $pet->type  == 'dog') ? 'selected' : '' }}>Dog</option>
                                <option value="cat" {{ (isset($pet) && $pet->type  == 'cat') ? 'selected' : '' }}>Cat</option>

                            </select>

                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Images</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <div class="card">
                                  <div class="card-body">

                                @if(!empty($pet->image))
                            <input  type="file" class="dropify"  name="image" accept=".jpg, .png, image/jpeg, image/png" data-default-file="{{$pet->image}}">
                            @else
                            <input  type="file" class="dropify"  name="image" accept=".jpg, .png, image/jpeg, image/png" >

                            @endif

                                    </div>
                            </div>
                                </div>
                            </div>
                            <button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5" type="submit">{{isset($pet) ? 'Update' : 'Save' }}</button>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function () {
    $("select").select2();

   $.ajaxSetup({
             headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
             });
  });

</script>
@if(isset($pet))
{!! JsValidator::formRequest('App\Http\Requests\Admin\Pet\PetRequest','#pet-add-edit') !!}
@else

@endif

@endsection


