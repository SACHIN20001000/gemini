@extends('admin.layouts.app')

@section('content')
<div class="container" style="padding: 20px;">
	<!-- breadcrumb -->
	<div class="breadcrumb-header justify-content-between">
						<div class="my-auto">
							<div class="d-flex">
								<h4 class="content-title mb-0 my-auto">Page List</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Pageslist</span>
							</div>
						</div>
						<a href="{{route('addPages')}}" class="btn btn-main-primary ml_auto">	Add Pages</a>
					</div>
					<!-- breadcrumb -->
		<!--Row-->
    <div class="row row-sm">
						<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
							<div class="card">
								<div class="card-header pb-0">
									<div class="d-flex justify-content-between">
										<h4 class="card-title mg-b-0">PAGES TABLE</h4>
										<i class="mdi mdi-dots-horizontal text-gray"></i>
									</div>
									<p class="tx-12 tx-gray-500 mb-2">Listing of All Pages...</p>
								</div>
							
								<div class="card-body">

<!-- Listing all data in user tables -->
									<div class="table-responsive border-top userlist-table">
										<table class="table card-table table-striped table-vcenter  mb-0" id="datatable">
											<thead>
												<tr>
												<th class="wd-lg-20p"><span>User</span></th>
												<th class="wd-lg-20p"><span>Title</span></th>
									      <th class="wd-lg-20p"><span>Type</span></th>
                        <th class="wd-lg-20p"><span>Status</span></th>
               

                        <th class="wd-lg-20p"><span>Action</span></th>
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
								<!-- row closed  -->
			
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script> 
<script type="text/javascript">
    $(document).ready(function () {

        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('pages') }}",
            columns: [
                {data: 'users.name', name: 'users.name'},
                {data: 'title', name: 'title'},
								{data: 'type', name: 'type'},
                {data: 'status', name: 'status', orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

    });
</script>
@endsection