@extends('admin.layouts.app')
@section('content')
<div class="container">
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Settings</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ {{isset($setting) ? $setting->name : 'Add New' }}</span>
            </div>
        </div>
        <!-- <a class="btn btn-main-primary ml_auto" href="{{ route('settings.index') }}">View Settings</a> -->
    </div>
    <!-- breadcrumb -->
    <!--Row-->
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        {{isset($setting) ? 'Update # '.$setting->id : 'Add New' }}
                    </div>
                    

                    <!--  start  --> 
                    <form  id="setting-add-edit" action="{{isset($setting) ? route('settings.update',$setting->id) : route('settings.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ isset($setting) ? method_field('PUT'):'' }}
                        <div class="pd-30 pd-sm-40 bg-gray-200">
                       
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Site Title</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="site_title"  placeholder="Enter your site title" type="text" value="{{isset($setting) ? $setting->site_title : '' }}">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Site Email</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="site_email"  placeholder="Enter your site email" type="email" value="{{isset($setting) ? $setting->site_email : '' }}">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Logo</label>
                                </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="logo"  type="file">
                                    @if(!empty($setting->logo))
                                    <a href="{{$setting->logo}}" target="_blank"><img src="{{$setting->logo}}"  height="50" width="50"></a>
                                    @endif                                    
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Phone</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="phone"  placeholder="Enter your phone" type="number" value="{{isset($setting) ? $setting->phone : '' }}">

                                </div>
                            </div>
                            <label class="form-label mg-b-0">Social links</label>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Facebook</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="facebook"  placeholder="Enter facebook" type="text" value="{{isset($setting) ? $setting->facebook : '' }}">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Instagram</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="insta"  placeholder="Enter insta" type="text" value="{{isset($setting) ? $setting->insta : '' }}">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Youtube</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="youtube"  placeholder="Enter your youtube" type="text" value="{{isset($setting) ? $setting->youtube : '' }}">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Linkedin</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="linkedin"  placeholder="Enter your linkedin" type="text" value="{{isset($setting) ? $setting->linkedin : '' }}">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Copyright</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="copyright"  placeholder="Enter your copyright" type="text" value="{{isset($setting) ? $setting->copyright : '' }}">
                                
                                </div>
                            </div>
                           
                            <button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5" type="submit">{{isset($setting) ? 'Update' : 'Save' }}</button>
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
@if(isset($setting))
{!! JsValidator::formRequest('App\Http\Requests\Admin\Setting\UpdateSetting','#setting-add-edit') !!}
@else
{!! JsValidator::formRequest('App\Http\Requests\Admin\Setting\AddSetting','#setting-add-edit') !!}
@endif

@endsection


