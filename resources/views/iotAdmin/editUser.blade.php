@extends('iotAdmin.layouts.app')

@section('content')
<!-- row -->
<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="card">
								<div class="card-body">
									<div class="main-content-label mg-b-5">
										Edit User
									</div>
									<p class="mg-b-20">Edit User</p>
                  <a href="{{route('userlist')}}" >	<button style="float: right; margin: -50px 0px;" class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">View Users</button></a>
                 <!-- validation error show here -->
                  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <!-- Form start  -->
                  <form action="{{route('updateUser')}}" method="post">
                  @csrf
									<div class="pd-30 pd-sm-40 bg-gray-200">
										<div class="row row-xs align-items-center mg-b-20">
											<div class="col-md-4">
												<label class="form-label mg-b-0">Name</label>
											</div>
											<div class="col-md-8 mg-t-5 mg-md-t-0">
												<input class="form-control" name="name" required value="{{$user->name}}" type="text">
												<input class="form-control" name="id" value="{{$user->id}}" type="hidden">

											</div>
										</div>
										<div class="row row-xs align-items-center mg-b-20">
											<div class="col-md-4">
												<label class="form-label mg-b-0">Email</label>
											</div>
											<div class="col-md-8 mg-t-5 mg-md-t-0">
												<input class="form-control" name="email" required value="{{$user->email}}" type="email">
											</div>
										</div>
										<button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5" type="submit">Update</button>
									</div>
								</div>
</form>
<!-- form end  -->
							</div>
						</div>
					</div>
					<!-- /row -->
@endsection