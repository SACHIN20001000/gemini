@extends('iotAdmin.layouts.table')

@section('content')

<div class="container">
	<!-- breadcrumb -->
	<div class="breadcrumb-header justify-content-between">
						<div class="my-auto">
							<div class="d-flex">
								<h4 class="content-title mb-0 my-auto">User List</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Userlist</span>
							</div>
						</div>
					</div>
					<!-- breadcrumb -->
		<!--Row-->
    <div class="row row-sm">
						<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
							<div class="card">
								<div class="card-header pb-0">
									<div class="d-flex justify-content-between">
										<h4 class="card-title mg-b-0">USERS TABLE</h4>
										<i class="mdi mdi-dots-horizontal text-gray"></i>
									</div>
									<p class="tx-12 tx-gray-500 mb-2">Listing of All Users...</p>
								</div>
								<a href="{{route('addUser')}}">	<button style=" float:right; "  class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">Add User</button></a>
								<div class="card-body">


		<!-- After deleting  or editing below model popup  -->
								@if (\Session::has('success'))
					@if(session()->get('success') == 'Deleted')
					<div class="modal" id="Modal">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content tx-size-sm">
						<div class="modal-body tx-center pd-y-20 pd-x-20">
							<button aria-label="Close" onclick= "hideFunction()" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button> <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
							<h4 class="tx-danger mg-b-20">Delected Successfully</h4>
							<a href="#">	<button  aria-label="Close" class="btn ripple btn-danger pd-x-25" onclick= "hideFunction()" data-bs-dismiss="modal" id="close"  type="submit" >Continuous</button> </a>

						</div>
					</div>
				</div>
			</div>
			@else
			<div class="modal" id="Modal">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content tx-size-sm">
						<div class="modal-body tx-center pd-y-20 pd-x-20">
							<button aria-label="Close" onclick= "hideFunction()" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button> <i class="icon ion-ios-checkmark-circle-outline tx-100 tx-success lh-1 mg-t-20 d-inline-block"></i>
							<h4 class="tx-success tx-semibold mg-b-20">User Updated Successfully!</h4>
							<a href="#">	<button  aria-label="Close" class="btn ripple btn-success pd-x-25" onclick= "hideFunction()" data-bs-dismiss="modal" id="close"  type="submit" >Continuous</button> </a>

						</div>
					</div>
				</div>
			</div>
			@endif
						<script>
							document.getElementById("Modal").style.display = 'block';
							function hideFunction() {
								document.getElementById("Modal").style.display = 'none';
		}

					</script>

					@endif
<!-- Listing all data in user tables -->
									<div class="table-responsive border-top userlist-table">
										<table class="table card-table table-striped table-vcenter text-nowrap mb-0" id="table">
											<thead>
												<tr>
												<th class="wd-lg-20p"><span>Email</span></th>
												<th class="wd-lg-20p"><span>Role</span></th>
												<th class="wd-lg-20p"><span>Created</span></th>
												<th class="wd-lg-20p">Action</th>
												</tr>
											</thead>
											<tbody>
                        @foreach ($data as $users)
											
												<tr>
												<td>
														<a href="#">{{$users->email}}</a>
													</td>
													<td>
														<a >{{$users->roles[0]->name}}</a>
													</td>
													<td>
														{{$users->created_at}}
													</td>


													<td>
													 <a href="{{route('editUser',$users->id)}}" class="btn btn-sm btn-info btn-b">
															<i class="las la-pen"></i>
														</a>
														<a href="#" onclick= "showModalFunction({{$users->id}})" class="btn btn-sm btn-danger">
															<i class="las la-trash"></i>
														</a>
													</td>
												</tr>
											@endforeach
											</tbody>
										</table>
									</div>
								
								</div>
							</div>
						</div>
						<!-- COL END -->
					</div>
								<!-- row closed  -->
					<!-- Before Delete  below model open for validation -->
					<div class="modal" id="deleteAlert">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content tx-size-sm">
										<div class="modal-body tx-center pd-y-20 pd-x-20">
											<button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button> <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
											<h4 class="tx-danger mg-b-20">Are You Really Want To Delete This Records?</h4>
											<a href="#">	<button  class="btn ripple btn-danger pd-x-25" data-id="" data-bs-dismiss="modal" id="delete_confirm" type="submit" >Continue</button> </a>
											<a href="#">	<button  aria-label="Close" class="btn ripple btn-danger pd-x-25"  data-bs-dismiss="modal"  type="submit" >Cancel</button> </a>

										</div>
									</div>
								</div>
							</div>
							</div>
						
							<!-- model end -->
		<link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script type="text/JavaScript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script type="text/JavaScript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
 <script>

      $(document).ready(function() {
        $("#table").dataTable({
				// 	"processing": true,
        // "serverSide": true,
				});
      });

    </script>
<script>

function showModalFunction(id) {
	$('#deleteAlert').modal("show");
	$('#delete_confirm').attr('data-id', id);
		}
	$("#delete_confirm").on('click', function() {
  var id = $(this).data("id");
	var pageURL = window.location.href;
						pageURL = pageURL.slice(0, pageURL.lastIndexOf('/'));
				  window.location.href=pageURL+"/delUser/"+id;
});
</script>


@endsection
