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
                  <a href="{{url('admin/page')}}" >	<button style="float: right; margin: -20px 0px;" class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">View Pages</button></a>

									<p class="mg-b-20">Add Pages</p>
                  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- after adding user this model will open  -->
@if (\Session::has('success'))
					@if(session()->get('success'))
					<div class="modal" id="userCreatedModal">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content tx-size-sm">
						<div class="modal-body tx-center pd-y-20 pd-x-20">
							<button aria-label="Close" onclick= "hideFunction()" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button> <i class="icon ion-ios-checkmark-circle-outline tx-100 tx-success lh-1 mg-t-20 d-inline-block"></i>
							<h4 class="tx-success tx-semibold mg-b-20">Created Successfully!</h4>
							<a href="#">	<button  aria-label="Close" class="btn ripple btn-success pd-x-25" onclick= "hideFunction()" data-bs-dismiss="modal" id="close"  type="submit" >Continuous</button> </a>

						</div>
					</div>
				</div>
			</div>
						<script>
							document.getElementById("userCreatedModal").style.display = 'block';
							function hideFunction() {
								document.getElementById("userCreatedModal").style.display = 'none';
									}
					</script>
					@endif
					@endif
					<!-- model end -->
					<!-- form start  -->
                  <form action="{{route('storePage')}}" method="post">
                  @csrf
									<div class="pd-30 pd-sm-40 bg-gray-200">
										<div class="row row-xs align-items-center mg-b-20">
											<div class="col-md-2">
												<label class="form-label mg-b-0">Page Title</label>
											</div>
											<div class="col-md-10 mg-t-5 mg-md-t-0">
												<input class="form-control" name="title" required placeholder="Enter your Page Title" type="text">
											</div>
										</div>
									
										<div class="row row-xs align-items-center mg-b-20">
											<div class="col-md-2">
												<label class="form-label mg-b-0">Content</label>
											</div>
											<div class="col-md-10 mg-t-5 mg-md-t-0">
                        <textarea name="content" class="form-control" required cols="30" rows="10"></textarea>
												
											</div>
										</div>
										<div class="row row-xs align-items-center mg-b-20">
											<div class="col-md-2">
												<label class="form-label mg-b-0">Type</label>
											</div>
                      <div class="col-md-10 mg-t-5 mg-md-t-0">
                      <select name="type" required  class="form-control">
													<option value="">Choose Below..</option>
													<option value="POST">POST</option>
                          <option value="PAGES">PAGES</option>
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
													<option value="1">Active</option>
                          <option value="0">Inactive</option>
												</select>
                </div>
								</div>
										<button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5" type="submit">Add</button>
								
                  </div>
								</div>
</form>
<!-- form end  -->


<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script>
                        CKEDITOR.replace( 'content' );
                </script>
@endsection