@extends('admin.layouts.app')
@section('content')
<style>.imageSize{height: 100px;width: 100px;}</style>
<div class="container">
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Stores</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ {{isset($store) ? $store->name : 'Add New' }}</span>
            </div>
        </div>
        <a class="btn btn-main-primary ml_auto" href="{{ route('stores.index') }}">View Stores</a>
    </div>
    <!-- breadcrumb -->
    <!--Row-->
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        {{isset($store) ? 'Update # '.$store->id : 'Add New' }}
                    </div>
                    

                    <!--  start  --> 
                    <form  id="store-add-edit" action="{{isset($store) ? route('stores.update',$store->id) : route('stores.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ isset($store) ? method_field('PUT'):'' }}
                        <div class="pd-30 pd-sm-40 bg-gray-200">
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Name</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="name"  placeholder="Enter your name" type="text" value="{{isset($store) ? $store->name : '' }}">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="form-label mg-b-0">Description </label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <textarea name="description"  id="hiddenDescription">{{isset($store) ? $store->description : '' }}</textarea>
                                        </div>
                            </div>
                            
                            <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="form-label mg-b-0">Media </label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <input id="store-galary" type="file" name="images" accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" multiple>
                                                            <ul id="store-galary-items"></ul>
                                                            @if(isset($store))


                                                            @foreach($store->storeGallery as $image)
                                                            <div id="imgDel{{$image->id}}"><a href="{{$image->image_path}}" target="_blank" data-item-id="{{$image->id}}"> <img src="{{$image->image_path}}"  alt="" height=50 width=50></a><i class="fas fa-trash-alt"  onclick='delImage({{$image->id}})'></i></div>

                                                            @endforeach
                                                            @endif


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                   
                           
                            <div class="row row-xs align-items-center mg-b-20" >
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Address</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <textarea name="address" id="" class="form-control">
                                    {{isset($store) ? $store->address : '' }}
                                    </textarea>
                                   
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20" >
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">City</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="city" value="{{isset($store) ? $store->city : '' }}" type="text" >
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20" >
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">State</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="state" value="{{isset($store) ? $store->state : '' }}" type="text" >
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20" >
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Country</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="country" value="{{isset($store) ? $store->country : '' }}" type="text" >
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20" >
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Zip code</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="zip_code" value="{{isset($store) ? $store->zip_code : '' }}" type="text" >
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20" >
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Url</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="url" value="{{isset($store) ? $store->url : '' }}" type="text" >
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20" >
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Direction Link</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="direction_link" value="{{isset($store) ? $store->direction_link : '' }}" type="text" >
                                </div>
                            </div>
                                 
                            <button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5" type="submit">{{isset($store) ? 'Update' : 'Save' }}</button>
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
<link rel="stylesheet" href="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<script src="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<!-- summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
       $(document).ready(function () {
                    $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });
                    });
 $('#hiddenDescription').summernote({
                toolbar: [
        ['font', ['bold', 'italic', 'underline', 'clear']],
        ['insert', ['link','image', 'doc', 'video']],
        ['misc', ['codeview']],
        ],
             height: 400
             });
$(function() {
var counter = 1;
$('#store-galary').FancyFileUpload({
url:'/admin/save-store-images',
        fileupload : {
        maxChunkSize : 1000000
        },
        uploadcompleted : function(e, data) {

        $("#store-galary-items").prepend('<div class="card-draggable"><li id="galary-item' + counter + '"><img class="imageSize" src="' + data.result.image + '" /><i class="fas fa-trash-alt" onclick="productsEvent.removeProductGalaryImage(' + counter + ')"></i><input type="hidden"  value="' + data.result.image + '" name="image[]"  /></li></div>');
        counter ++
                data.ff_info.RemoveFile();
        }
});
});
function delImage(id){
var data = 'id=' + id;
if (confirm('Are You Sure You Want To Delete This Image')) {
$.ajax({
type:'POST',
        url:'/admin/delete-store-photo',
        data: data,
        success:function(data){
        $('#imgDel' + id + '').remove();
        }
});
}

}
</script>
@if(isset($store))
{!! JsValidator::formRequest('App\Http\Requests\Admin\Stores\UpdateStores','#store-add-edit') !!}
@else
{!! JsValidator::formRequest('App\Http\Requests\Admin\Stores\AddStores','#store-add-edit') !!}
@endif

@endsection


