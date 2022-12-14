@extends('admin.layouts.app')
@section('content')

<div class="container">
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">User</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ {{isset($user) ? $user->email : 'Add New' }}</span>
            </div>
        </div>
        <a class="btn btn-main-primary ml_auto" style="margin-left: 740px;" href="{{ route('users.index') }}">View User</a>
        @isset($user)
        <a class="btn btn-main-primary ml_auto" href="{{ route('users.show', $user->id ) }}">View Pets</a>
        @endisset

    </div>
    <!-- breadcrumb -->
    <!--Row-->
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        {{isset($user) ? 'Update # '.$user->id : 'Add New' }}
                    </div>


                    <!--  start  -->
                    <form  id="user-add-edit" action="{{isset($user) ? route('users.update',$user->id) : route('users.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ isset($user) ? method_field('PUT'):'' }}
                        <div class="pd-30 pd-sm-40 bg-gray-200">
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Name</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="name"  placeholder="Enter your name" type="text" value="{{isset($user) ? $user->name : '' }}">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Email</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="email"  placeholder="Enter your email" type="email" value="{{isset($user) ? $user->email : '' }}">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Password</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="password"  placeholder="Enter your password" type="password" value="">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Role</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <select name="role"  class="form-control">
                                      <option value="">Choose Below..</option>
                                      @foreach($role as $roles)
                                      <option value="{{$roles->name}}" {{ (isset($user) && $roles->name == @$user->roles[0]->name) ? 'selected' : '' }}>{{$roles->name}}</option>
                                      @endforeach
                              </select>
                                </div>
                            </div>



                            <button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5" type="submit">{{isset($user) ? 'Update' : 'Save' }}</button>
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
@if(isset($user))
{!! JsValidator::formRequest('App\Http\Requests\Admin\User\UpdateUserRequest','#user-add-edit') !!}
@else
{!! JsValidator::formRequest('App\Http\Requests\Admin\User\StoreUserRequest','#user-add-edit') !!}
@endif

@endsection


