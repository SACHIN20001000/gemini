
@extends('admin.layouts.app')
@section('content')
<div class="container">
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Rating</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ {{isset($rating) ? $rating->name : 'Add New' }}</span>
            </div>
        </div>
        <a class="btn btn-main-primary ml_auto" href="{{ route('ratings.index') }}">View Rating</a>
    </div>
    <!-- breadcrumb -->
    <!--Row-->
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        {{isset($rating) ? 'Update # '.$rating->id : 'Add New' }}
                    </div>


                    <!--  start  -->
                    <form  id="rating-add-edit" action="{{isset($rating) ? route('ratings.update',$rating->id) : route('ratings.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ isset($rating) ? method_field('PUT'):'' }}
                        <div class="pd-30 pd-sm-40 bg-gray-200">
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Product</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <select class="form-control select2"  name="product_id"  >
                                     @if(isset($products))
                                     @foreach($products as $product)
                                            <option value="{{$product->id}}" {{ (isset($rating) && $rating->product_id  == $product->id) ? 'Selected' : '' }}>{{$product->productName}}</option>
                                      @endforeach
                                      @endif
                                </select>
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Rating</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <div class="col-sm-6 col-md-6">
							<div class="card custom-card" style="width: 650px;">
								<div class="card-body">

									<div class="rating-stars block" id="rating">
                                    <input class="form-control rating-value"readonly="readonly" name="rating"  id="rating-stars-value" placeholder="Enter your rating" type="number" value="{{isset($rating) ? $rating->rating : '' }}">

										<div class="rating-stars-container">
											<div class="rating-star">
												<i class="fa fa-star"></i>
											</div>
											<div class="rating-star">
												<i class="fa fa-star"></i>
											</div>
											<div class="rating-star">
												<i class="fa fa-star"></i>
											</div>
											<div class="rating-star">
												<i class="fa fa-star"></i>
											</div>
											<div class="rating-star">
												<i class="fa fa-star"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Title</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="title"  placeholder="Enter your title" type="text" value="{{isset($rating) ? $rating->title : '' }}">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Description</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{isset($rating) ? $rating->description : '' }}</textarea>
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Do You recommend this product?</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input type="radio" {{ (isset($rating) && $rating->status  == 1) ? 'Checked' : '' }} name="status" value="1">
                                    <label for="age1">Yes</label><br>
                                    <input type="radio"  {{ (isset($rating) && $rating->status  == 0) ? 'Checked' : '' }} name="status" value="0">
                                    <label for="age2">No</label><br>


                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Images</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <div class="card">
                                  <div class="card-body">
                                <input id="product-galary" type="file" name="images" accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" multiple>
                                                            <ul id="product-galary-items"></ul>
                                                            @if(isset($ratingGallery))
                                                            @foreach($ratingGallery as $images)
                                                            <a href="{{$images->image_path}}" target="_blank" data-item-id="{{$images->id}}"> <img src="{{$images->image_path}}"  alt="" height=50 width=50></a>
                                                           @endforeach
                                                            @endif
                                                            </div>
                            </div>
                                </div>
                            </div>
                            <button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5" type="submit">{{isset($rating) ? 'Update' : 'Save' }}</button>
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
    $('#description').summernote({
      height: 250
   });
   $.ajaxSetup({
             headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
             });
  });

  $(function() {
             var counter = 1;
             $('#product-galary').FancyFileUpload({
             url:'/admin/save-image',
                     fileupload : {
                     maxChunkSize : 1000000
                     },
                     uploadcompleted : function(e, data) {

                     $("#product-galary-items").prepend('<li id="galary-item' + counter + '"><img class="imageSize" src="' + data.result.image + '" /><i class="fas fa-trash-alt" onclick="productsEvent.removeProductGalaryImage(' + counter + ')"></i><input type="hidden"  value="' + data.result.image + '" name="image[]"  /></li>');
                     counter ++
                             data.ff_info.RemoveFile();
                     }
             });
             });
</script>
@if(isset($rating))
{!! JsValidator::formRequest('App\Http\Requests\Admin\Rating\UpdateRating','#rating-add-edit') !!}
@else
{!! JsValidator::formRequest('App\Http\Requests\Admin\Rating\AddRating','#rating-add-edit') !!}
@endif

@endsection


