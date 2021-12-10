@extends('admin.layouts.app')

@section('content') 
	<!-- container opened -->
  <div class="container">

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
  <div class="my-auto">
    <div class="d-flex">
      <h4 class="content-title mb-0 my-auto">Edit-Profile</h4>
    </div>
  </div>

</div>
<!-- breadcrumb -->

<!-- row -->
<div class="row row-sm">
  <!-- Col -->
  <div class="col-lg-4">
    <div class="card mg-b-20">
      <div class="card-body">
        <div class="ps-0">
          <div class="main-profile-overview">
            <div class="main-img-user profile-user">
            @if(!empty(Auth::user()->profile))
            <img alt="" src="{{Auth::user()->profile}}">      
                                @else
                                <img src="../../assets/img/faces/6.jpg" alt="img">
                                @endif
            </div>
            <div class="d-flex justify-content-between mg-b-20">
              <div>
                <h5 class="main-profile-name">{{Auth::user()->name}}</h5>
                <p class="main-profile-name-text">{{Auth::user()->email}}</p>
              </div>
            </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  <!-- Col -->
  <div class="col-lg-8">
    <div class="card">
      <div class="card-body">
        <div class="mb-4 main-content-label">Personal Information</div>
        <form class="form-horizontal" id="profile-add-edit" action="{{route('updateUserProfile' , Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
        @csrf   
        <div class="mb-4 main-content-label">Name</div>
          <div class="form-group ">
            <div class="row">
              <div class="col-md-3">
                <label class="form-label">User Name</label>
              </div>
              <div class="col-md-9">
                <input type="text" class="form-control" name="name" placeholder="User Name" value="{{Auth::user()->name}}">
              </div>
            </div>
          </div>
          <div class="form-group ">
            <div class="row">
              <div class="col-md-3">
                <label class="form-label">User profile</label>
              </div>
              <div class="col-md-9">
                <input type="file" class="form-control" name="profile" >
              </div>
            </div>
          </div>
         
       
          <div class="mb-4 main-content-label">Contact Info</div>
          <div class="form-group ">
            <div class="row">
              <div class="col-md-3">
                <label class="form-label">Email<i>(required)</i></label>
              </div>
              <div class="col-md-9">
                <input type="text" class="form-control" readonly name="email" value="{{Auth::user()->email}}">
              </div>
            </div>
          </div>
          <div class="form-group ">
            <div class="row">
              <div class="col-md-3">
                <label class="form-label">Password</label>
              </div>
              <div class="col-md-9">
                <input type="password" class="form-control" name="password"  placeholder="Password" >
              </div>
            </div>
          </div>
          <div class="form-group ">
            <div class="row">
              <div class="col-md-3">
                <label class="form-label">Confirm Password</label>
              </div>
              <div class="col-md-9">
                <input type="password" class="form-control" name="confirm_password"  placeholder="Password" >
              </div>
            </div>
          </div>
            </div>
          </div>
          <div class="card-footer">
        <button type="submit" class="btn btn-primary waves-effect waves-light">Update Profile</button>
      </div>
        </form>
      </div>
     
    </div>
  </div>
  <!-- /Col -->
</div>
<!-- row closed -->
</div>
<!-- Container closed -->
@endsection


@section('scripts')

{!! JsValidator::formRequest('App\Http\Requests\Admin\Profile\UpdateUserProfile','#profile-add-edit') !!}


@endsection


