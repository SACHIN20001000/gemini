@extends('admin.layouts.app')

@section('content') 

<div class="container">
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Orders</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ list</span>
            </div>
        </div>
        <!-- <a class="btn btn-main-primary ml_auto" href="{{ route('brands.create') }}">Add New</a> -->
    </div>
    <!-- breadcrumb -->
   
    <div class="row row-sm">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card">
                <div class="card-header pb-0">
                    <p class="tx-12 tx-gray-500 mb-2">Listing of All Orders...</p>
                </div>
                <div class="card-body">

                    <!-- Listing all data in user tables -->
                    <div class="table-responsive border-top userlist-table">
                        <table class="table card-table table-striped table-vcenter text-nowrap mb-0" id="datatable">
                            <thead>
                                <tr>
                                    <th class="wd-lg-20p"><span>Order Id</span></th>
                                    <th class="wd-lg-20p"><span>User Name</span></th>
                                    <th class="wd-lg-20p"><span>Total</span></th>
                                    <th class="wd-lg-20p"><span>Discount</span></th>
                                    <th class="wd-lg-20p"><span>Item Count</span></th>
                                    <th class="wd-lg-20p"><span>Payment Method</span></th>

                                    <th class="wd-lg-20p"><span>Shippping Method</span></th>
                                    <th class="wd-lg-20p"><span>Fulfillment Status</span></th>
                                    <th class="wd-lg-20p"><span>Payment Status</span></th>


                                    
                                    <th class="wd-lg-20p">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <!-- COL END -->
    </div>

</div>

<!-- model end -->



@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {

        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('orders.index') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'user.name', name: 'user.name'},
                {data: 'grand_total', name: 'grand_total'},
                {data: 'discount', name: 'discount'},
                {data: 'item_count', name: 'item_count'},
                {data: 'status', name: 'status'},            
                {data: 'is_paid', name: 'is_paid'}, 
                {data: 'payment_method', name: 'payment_method'},

                {data: 'shippingmethod', name: 'shippingmethod'},            
                           

                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

    });
</script>
@endsection
