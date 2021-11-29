@extends('iotAdmin.layouts.app')
@section('content')
<!-- row -->
<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="card">
								<div class="card-body">
									<div class="main-content-label mg-b-5">
										Add User
									</div>
									<p class="mg-b-20">Add User</p>
                  <a href="{{route('userlist')}}" >	<button style="float: right; margin: -50px 0px;" class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">View Users</button></a>
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
					<div class="modal" id="modaldemo4">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content tx-size-sm">
						<div class="modal-body tx-center pd-y-20 pd-x-20">
							<button aria-label="Close" onclick= "hideFunction()" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button> <i class="icon ion-ios-checkmark-circle-outline tx-100 tx-success lh-1 mg-t-20 d-inline-block"></i>
							<h4 class="tx-success tx-semibold mg-b-20">User Added Successfully!</h4>
							<a href="#">	<button  aria-label="Close" class="btn ripple btn-success pd-x-25" onclick= "hideFunction()" data-bs-dismiss="modal" id="close"  type="submit" >Continuous</button> </a>

						</div>
					</div>
				</div>
			</div>
						<script>
							document.getElementById("modaldemo4").style.display = 'block';
							function hideFunction() {
								document.getElementById("modaldemo4").style.display = 'none';
									}
					</script>
					@endif
					@endif
					<!-- model end -->
					<!-- form start  -->
                  <form action="{{route('addNewUser')}}" method="post">
                  @csrf
									<div class="pd-30 pd-sm-40 bg-gray-200">
										<div class="row row-xs align-items-center mg-b-20">
											<div class="col-md-4">
												<label class="form-label mg-b-0">Name</label>
											</div>
											<div class="col-md-8 mg-t-5 mg-md-t-0">
												<input class="form-control" name="name" required placeholder="Enter your name" type="text">
											</div>
										</div>
										<div class="row row-xs align-items-center mg-b-20">
											<div class="col-md-4">
												<label class="form-label mg-b-0">Email</label>
											</div>
											<div class="col-md-8 mg-t-5 mg-md-t-0">
												<input class="form-control" name="email" required placeholder="Enter your email" type="email">
											</div>
										</div>
										<div class="row row-xs align-items-center mg-b-20">
											<div class="col-md-4">
												<label class="form-label mg-b-0">Password</label>
											</div>
											<div class="col-md-8 mg-t-5 mg-md-t-0">
												<input class="form-control" name="password" required placeholder="Enter Password" type="Password">
											</div>
										</div>
										<button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5" type="submit">Add</button>
									</div>
								</div>
</form>
<!-- form end  -->
							</div>
						</div>
					</div>
					<!-- /row -->

@endsection