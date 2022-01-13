@extends('admin.layouts.app')

@section('content') 

<div class="container">
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Order</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Single Order</span>
            </div>
        </div>
        <!-- <a class="btn btn-main-primary ml_auto" href="{{ route('brands.create') }}">Add New</a> -->
    </div>
    <!-- breadcrumb -->
   
    <div class="row row-sm">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card">
                <div class="card-header pb-0">
                   
                </div>
                <div class="card-body">
    
  <div class="row">
    <div class="col-sm">
    Name : {{$orders->user->name}}
    </div>
 
    <div class="col-sm">
    Email : {{$orders->user->email}}
    </div>
    <div class="col-sm">
    Address : {{$orders->user->address}},City: {{$orders->user->city}},
     {{$orders->user->state}},{{$orders->user->country}},({{$orders->user->zip_code}})

    </div>
  </div>
  <br><br><br>
  <div class="row">
    <div class="col-sm">
      Order Details :
      Transaction : {{$orders->transaction_id}},Status :  {{$orders->status}},
     

    </div>
    <div class="col-sm">
    Payment Method : {{$orders->payment_method}}
    </div>
    <div class="col-sm">
    Remarks: {{$orders->remark}}
    </div>
  </div>

<br><br><br>
  <div class="row">
    <div class="col-sm">
    Shipping Details :
      Name : {{$orders->shipping->sh_name}},Phone :  {{$orders->shipping->sh_phone}},
    </div>
    <div class="col-sm">
     Email : {{$orders->shipping->sh_email}}
    </div>
    <div class="col-sm">
     Address : {{$orders->shipping->sh_address}},City: {{$orders->shipping->sh_city}},
     {{$orders->shipping->sh_state}},{{$orders->shipping->sh_country}},({{$orders->shipping->sh_zip_code}})
    </div>
  </div>

                  

                </div>
            </div>
        </div>
        <!-- COL END -->
    </div>

</div>

<!-- model end -->



@endsection

