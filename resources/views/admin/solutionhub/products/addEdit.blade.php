
@extends('admin.layouts.app')
@section('content')

<style>.imageSize{height: 100px;width: 100px;} .tag{color:black !important;background-color: aqua;font-size: 15px;}</style>
<div class="container">
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Products</h4>

                <span class="text-muted mt-1 tx-13 ms-2 mb-0">/ {{isset($product) ? $product->name : 'Add New' }}</span>


            </div>
        </div>

        <a class="btn btn-main-primary ml_auto" href="{{ route('solutionhub-products.index') }}">View Products</a>
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

                    <form  id="product-add-edit" action="{{isset($product) ? route('solutionhub-products.update',$product->id) : route('solutionhub-products.store')}}" method="POST" enctype="multipart/form-data">


                        @csrf

                        {{ isset($product) ? method_field('PUT'):'' }}

                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="form-label mg-b-0">Title</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="productName"  placeholder="Enter your name" type="text" value="{{isset($product) ? $product->productName : '' }}">

                                        </div>
                                    </div>
                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="form-label mg-b-0">Backend Tags</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">

                                            <input type="text" name="backend_tag" placeholder="Tags" value="{{isset($product) ? $product->availBackendTags : '' }}" data-role="tagsinput" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="form-label mg-b-0">Tags</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">

                                            <input type="text" name="tag" placeholder="Tags" value="{{isset($product) ? $product->availTags : '' }}" data-role="tagsinput" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="form-label mg-b-0">Brand</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">

                                            <input type="text" name="brand" placeholder="Brand" value="{{isset($product) ? $product->availBrands : '' }}" data-role="tagsinput" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="form-label mg-b-0">Description </label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">

                                            <textarea name="description"  id="hiddenDescription">{{isset($product) ? $product->description : '' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="form-label mg-b-0">Feature Image(619px*577px) </label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            @if(!empty($product->feature_image))
                                            <input type="file" class="dropify" data-default-file="{{$product->feature_image}}"   name="feature_image"  id="feature_image">

                                            @else
                                            <input type="file" class="dropify"  name="feature_image"   id="feature_image">


                                            @endif
                                        </div>
                                    </div>


                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="form-label mg-b-0">Status</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <select name="status" class="form-control">
                                                <option value="1" {{ (isset($product) && $product->status  == 1) ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ (isset($product) && $product->status  == 0) ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Shipping</h4>
                                        <div class="row row-xs align-items-center mg-b-20">
                                            <div class="col-md-4">
                                                <label class="form-label mg-b-0">Separation anxiety</label>
                                            </div>
                                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input type="radio"  name="separation_anxiety" value="1" {{ (isset($product) && $product->separation_anxiety  == 1) ? 'Checked' : '' }}>
                                                <label for="age1">Yes</label><br>
                                                <input type="radio"  name="separation_anxiety" value="0" {{ (isset($product) && $product->separation_anxiety  == 0) ? 'Checked' : '' }}>
                                                <label for="age2">No</label><br>
                                            </div>
                                        </div>

                                        <div class="row row-xs align-items-center mg-b-20">
                                            <div class="col-md-4">
                                                <label class="form-label mg-b-0">Teething </label>
                                            </div>
                                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input type="radio"  name="teething" value="1" {{ (isset($product) && $product->teething  == 1) ? 'Checked' : '' }}>
                                                <label for="age1">Yes</label><br>
                                                <input type="radio"  name="teething" value="0" {{ (isset($product) && $product->teething  == 0) ? 'Checked' : '' }}>
                                                <label for="age2">No</label><br>
                                            </div>
                                        </div>
                                        <div class="row row-xs align-items-center mg-b-20">
                                            <div class="col-md-4">
                                                <label class="form-label mg-b-0">Aggressive Chewers</label>
                                            </div>
                                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input type="radio"  name="aggressive_chewers" value="1" {{ (isset($product) && $product->aggressive_chewers  == 1) ? 'Checked' : '' }}>
                                                <label for="age1">Yes</label><br>
                                                <input type="radio"  name="aggressive_chewers" value="0" {{ (isset($product) && $product->aggressive_chewers  == 0) ? 'Checked' : '' }}>
                                                <label for="age2">No</label><br>
                                            </div>
                                        </div>
                                        <div class="row row-xs align-items-center mg-b-20">
                                            <div class="col-md-4">
                                                <label class="form-label mg-b-0">Boredom</label>
                                            </div>
                                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input type="radio"  name="boredom" value="1" {{ (isset($product) && $product->boredom  == 1) ? 'Checked' : '' }}>
                                                <label for="age1">Yes</label><br>
                                                <input type="radio"  name="boredom" value="0" {{ (isset($product) && $product->boredom  == 0) ? 'Checked' : '' }}>
                                                <label for="age2">No</label><br>
                                            </div>
                                        </div>
                                        <div class="row row-xs align-items-center mg-b-20">
                                            <div class="col-md-4">
                                                <label class="form-label mg-b-0">Disabled</label>
                                            </div>
                                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input type="radio"  name="disabled" value="1" {{ (isset($product) && $product->disabled  == 1) ? 'Checked' : '' }}>
                                                <label for="age1">Yes</label><br>
                                                <input type="radio"  name="disabled" value="0" {{ (isset($product) && $product->disabled  == 0) ? 'Checked' : '' }}>
                                                <label for="age2">No</label><br>
                                            </div>
                                        </div>
                                        <div class="row row-xs align-items-center mg-b-20">
                                            <div class="col-md-4">
                                                <label class="form-label mg-b-0">Energetic</label>
                                            </div>
                                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input type="radio"  name="energetic" value="1" {{ (isset($product) && $product->energetic  == 1) ? 'Checked' : '' }}>
                                                <label for="age1">Yes</label><br>
                                                <input type="radio"  name="energetic" value="0" {{ (isset($product) && $product->energetic  == 0) ? 'Checked' : '' }}>
                                                <label for="age2">No</label><br>
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


    @endsection

    @section('scripts')

    <link rel="stylesheet" href="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <script src="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
         $(document).ready(function() {
             $("#select").select2({
                multiple:true
                });
                $(".dog").select2({ });

  });
//validate image height width
// function CheckDimensionFeatureImage() {
//      var fileUpload = document.getElementById("feature_image");
//         if (typeof (fileUpload.files) != "undefined") {
//             var reader = new FileReader();
//             reader.readAsDataURL(fileUpload.files[0]);
//             reader.onload = function (e) {
//                 var image = new Image();
//                 image.src = e.target.result;
//                 image.onload = function () {
//                     var height = this.height;
//                     var width = this.width;
//                     if (height != 619  || width != 577) {
//                         swal("Image size should be 619px*577px.Please again upload image! ");
//                         $("#feature_image").val('');
//                         return false;
//                     }
//                     return true;
//                 };
//             }
//         } else {
//             alert("This browser does not support HTML5.");
//             return false;
//         }
// }
// trext editor section
                                            $('#hiddenDescription').summernote({
                                                toolbar: [
                                                ['font', ['bold', 'italic', 'underline', 'clear']],
                                                ['insert', ['link','image', 'doc', 'video']],
                                                ['misc', ['codeview']],
                                                ],
                                            height: 400
                                            });
                                            //product js



    </script>

    @if(isset($product))
    {!! JsValidator::formRequest('App\Http\Requests\Admin\Solutionhub\Product\UpdateProduct','#product-add-edit') !!}
    @else
    {!! JsValidator::formRequest('App\Http\Requests\Admin\Solutionhub\Product\AddProduct','#product-add-edit') !!}
    @endif

    @endsection
