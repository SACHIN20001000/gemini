@extends('admin.layouts.app')

@section('content')
<div class="container">
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Import</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Add New</span>
            </div>
        </div>
<a href="{{route('chowhub-import.create')}}" class="btn btn-info">Export here</a>
    </div>
    <!-- breadcrumb -->
    <!--Row-->
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                       Add New
                    </div>
                    

                    <!--  start  --> 
                    <form  id="store-add-edit" action="{{ route('chowhub-import.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ isset($store) ? method_field('PUT'):'' }}
                        <div class="pd-30 pd-sm-40 bg-gray-200">
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Import File (Upload only csv file) </label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input type="file" name="product_csv"  class="dropify"accept="csv">
                               <br> <a href="/csv/sampleproduct.csv" class="btn btn-info">View Sample file </a>
                            </div>
                              
                                
                              
                            </div>
  
                            <button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5 " type="submit">Upload</button>
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
<script>
   $('.dropify').dropify();
</script>