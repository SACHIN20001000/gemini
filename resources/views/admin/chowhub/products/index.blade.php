@extends('admin.layouts.app')

@section('content')

<div class="container">
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Products</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ list</span>
            </div>
        </div>
        <a class="btn btn-main-primary ml_auto" href="{{ route('chowhub-products.create') }}">Add New</a>
    </div>
    <!-- breadcrumb -->

    <div class="row row-sm">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card">
                <div class="card-header pb-0">
                    <p class="tx-12 tx-gray-500 mb-2">Listing of All Products...</p>
                </div>
                <div class="card-body">

                    <!-- Listing all data in user tables -->
                    <div class="table-responsive border-top userlist-table">
                        <table class="table card-table table-striped table-vcenter text-nowrap mb-0" id="datatable">
                            <thead>
                                <tr>
                                    <th class="wd-lg-20p"><span>Name</span></th>
                                    <th class="wd-lg-20p"><span>Pet Type</span></th>
                                    <th class="wd-lg-20p"><span>Brand</span></th>
                                    <th class="wd-lg-20p"><span>Backend Tags</span></th>

                                    <th class="wd-lg-20p"><span>Store</span></th>
                                    <th class="wd-lg-20p"><span>Status</span></th>
                                    <th class="wd-lg-20p"><span>Created At</span></th>
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
            ajax: "{{ route('chowhub-products.index') }}",
            columns: [
                {data: 'productName', name: 'productName' },
                {data: 'pet_type', name: 'pet_type' },
                {data: 'availBrands', name: 'availBrands', orderable: false },
                {data: 'availBackendTags', name: 'availBackendTags', orderable: false },


                {data: 'store.name', name: 'store.name', orderable: false},
                {data: 'status', name: 'status'},

                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

    });
</script>
@endsection
