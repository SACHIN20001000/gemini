@extends('admin.layouts.app')

@section('content') 

<div class="container">
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Settings</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ list</span>
            </div>
        </div>
        <a class="btn btn-main-primary ml_auto" href="{{ route('settings.create') }}">Add New</a>
    </div>
    <!-- breadcrumb -->
   
    <div class="row row-sm">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card">
                <div class="card-header pb-0">
                    <p class="tx-12 tx-gray-500 mb-2">Listing of All Settings...</p>
                </div>
                <div class="card-body">

                    <!-- Listing all data in user tables -->
                    <div class="table-responsive border-top userlist-table">
                        <table class="table card-table table-striped table-vcenter text-nowrap mb-0" id="datatable">
                            <thead>
                                <tr>
                                    <th class="wd-lg-20p"><span>Site Title</span></th>
                                    <th class="wd-lg-20p"><span>Site Email</span></th>
                                    <th class="wd-lg-20p"><span>Phone</span></th>
                                    <th class="wd-lg-20p"><span>Facebook</span></th>
                                    <th class="wd-lg-20p"><span>Instagram</span></th>
                                    <th class="wd-lg-20p"><span>Youtube</span></th>
                                    <th class="wd-lg-20p"><span>Linkedin</span></th>
                                    <th class="wd-lg-20p"><span>Copyright</span></th>
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
            ajax: "{{ route('settings.index') }}",
            columns: [
                {data: 'site_title', name: 'site_title'},
                {data: 'site_email', name: 'site_email'},
                {data: 'phone', name: 'phone'},
                {data: 'facebook', name: 'facebook'},
                {data: 'insta', name: 'insta'},
                {data: 'youtube', name: 'youtube'},
                {data: 'linkedin', name: 'linkedin'},
                {data: 'copyright', name: 'copyright'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

    });
</script>
@endsection
