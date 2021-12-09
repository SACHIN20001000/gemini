@extends('admin.layouts.app')

@section('content')

<div class="container" style="padding: 20px;">
	<!-- breadcrumb -->
	<div class="breadcrumb-header justify-content-between">
						<div class="my-auto">
							<div class="d-flex">
								<h4 class="content-title mb-0 my-auto">Edit Pages</h4>
							</div>
						</div>
					</div>
					<!-- breadcrumb -->
		<!--Row-->
<!-- row -->
<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="card">
								<div class="card-body">
									<div class="main-content-label mg-b-5">
										Edit Pages
									</div>
                  <a href="{{url('admin/page')}}" >	<button style="float: right; margin: -20px 0px;" class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">View Pages</button></a>

									<p class="mg-b-20">Edit Pages</p>
                  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif				
					<!-- form start  -->
                  <form action="{{route('updatePage')}}" method="post">
                  @csrf
									<div class="pd-30 pd-sm-40 bg-gray-200">
										<div class="row row-xs align-items-center mg-b-20">
											<div class="col-md-2">
												<label class="form-label mg-b-0">Page Title</label>
											</div>
											<div class="col-md-10 mg-t-5 mg-md-t-0">
                      <input  name="id" value="{{$post->id}}"  type="hidden">
											
                      <input class="form-control" name="title" value="{{$post->title}}" required placeholder="Enter your Page Title" type="text">
											</div>
										</div>
									
										<div class="row row-xs align-items-center mg-b-20">
											<div class="col-md-2">
												<label class="form-label mg-b-0">Content</label>
											</div>
											<div class="col-md-10 mg-t-5 mg-md-t-0">
                        <textarea name="content" class="form-control" required id="" cols="30" rows="10">{{$post->content}}</textarea>
												
											</div>
										</div>
										<div class="row row-xs align-items-center mg-b-20">
											<div class="col-md-2">
												<label class="form-label mg-b-0">Type</label>
											</div>
                      <div class="col-md-10 mg-t-5 mg-md-t-0">
                      <select name="type" required  class="form-control">
													<option value="">Choose Below..</option>
													<option value="POST" {{ $post->type == 'POST' ? 'selected' : '' }} >POST</option>
                          <option value="PAGES"{{ $post->type == 'PAGES' ? 'selected' : '' }}>PAGES</option>
												</select>
                </div>
</div>
<div class="row row-xs align-items-center mg-b-20">
											<div class="col-md-2">
												<label class="form-label mg-b-0">Status</label>
											</div>
                      <div class="col-md-10 mg-t-5 mg-md-t-0">
                      <select name="status" required  class="form-control">
													<option value="">Choose Below..</option>
													<option value="1"{{ $post->status == 1 ? 'selected' : '' }}>Active</option>
                          <option value="0"{{ $post->status == 0 ? 'selected' : '' }}>Inactive</option>
												</select>
                </div>
								</div>
               
										<button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5" type="submit">Update</button>
								
                  </div>
								</div>
</form>
<!-- form end  -->


<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script>
                        CKEDITOR.replace( 'content' );
                </script>
@endsection