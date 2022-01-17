@extends('admin.layouts.app')

@section('content')

<div class="container" style="padding: 20px;">
	<!-- breadcrumb -->
	<div class="breadcrumb-header justify-content-between">
						<div class="my-auto">
							<div class="d-flex">
								<h4 class="content-title mb-0 my-auto">Add Pages</h4>
							</div>
						</div>
						<a href="{{url('admin/page')}}" class="btn btn-main-primary ml_auto" >	View Pages</a>

					</div>
					<!-- breadcrumb -->
		<!--Row-->
<!-- row -->
<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="card">
								<div class="card-body">
									<div class="main-content-label mg-b-5">
										Add Pages
									</div>

									<p class="mg-b-20">Add Pages</p>
					<!-- form start  -->
                  <form action="{{route('storePage')}}" method="post" id="page-add" enctype="multipart/form-data">
                  @csrf
									<div class="pd-30 pd-sm-40 bg-gray-200">
										<div class="row row-xs align-items-center mg-b-20">
											<div class="col-md-2">
												<label class="form-label mg-b-0">Page Title</label>
											</div>
											<div class="col-md-10 mg-t-5 mg-md-t-0">
												<input class="form-control" name="title"  placeholder="Enter your Page Title" type="text">
											</div>
										</div>
									
										<div class="row row-xs align-items-center mg-b-20">
											<div class="col-md-2">
												<label class="form-label mg-b-0">Content</label>
											</div>
											<div class="col-md-10 mg-t-5 mg-md-t-0">
                        <textarea name="content" class="form-control"  cols="30" rows="10"></textarea>
												
											</div>
										</div>
										<div class="row row-xs align-items-center mg-b-20">
											<div class="col-md-2">
												<label class="form-label mg-b-0">Css</label>
											</div>
											<div class="col-md-10 mg-t-5 mg-md-t-0">
                        <textarea name="css" class="form-control"  cols="30" rows="10"></textarea>
												
											</div>
										</div>
										<div class="row row-xs align-items-center mg-b-20">
											<div class="col-md-2">
												<label class="form-label mg-b-0">Category</label>
											</div>
                      <div class="col-md-10 mg-t-5 mg-md-t-0">
                      <select name="category"   class="form-control">
													<option value="">Choose Below..</option>
													@foreach($category as $categories)
													<option value="{{$categories->id}}">{{$categories->name}}</option>
                         
													@endforeach
												</select>
                </div>
								</div>
								<div class="row row-xs align-items-center mg-b-20">
											<div class="col-md-2">
												<label class="form-label mg-b-0">Status</label>
											</div>
                      <div class="col-md-10 mg-t-5 mg-md-t-0">
                      <select name="status"   class="form-control">
													<option value="">Choose Below..</option>
													<option value="1">Active</option>
                          <option value="0">Inactive</option>
												</select>
                </div>
								</div>
								<div class="row row-xs align-items-center mg-b-20">
											<div class="col-md-2">
												<label class="form-label mg-b-0">Feature Image</label>
											</div>
                      <div class="col-md-10 mg-t-5 mg-md-t-0">
											<input class="form-control" name="feature_image"  type="file">
                                    
                </div>
								</div>
										<button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5" type="submit">Add</button>
								
                  </div>
								</div>
</form>
<!-- form end  -->


<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script>

 CKEDITOR.config.fillEmptyBlocks = false; 
 CKEDITOR.config.basicEntities = false; 
 CKEDITOR.config.entities_greek = false; 
 CKEDITOR.config.entities_latin = false; 
 CKEDITOR.config.allowedContent = true;


						CKEDITOR.replace( 'content' );
            CKEDITOR.replace( 'css' );
					

                </script>
@endsection
@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\Admin\Page\PagesRequest','#page-add') !!}
@endsection


