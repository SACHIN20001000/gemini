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
								<a href="{{route('addPages')}}" style="margin-left: 888px;">	<button style=" margin-right: 60px;float:right; "  class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">Add Pages</button></a>
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
							<h4 class="tx-success tx-semibold mg-b-20">Page Updated Successfully!</h4>
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
										<table class="table card-table table-striped table-vcenter  mb-0" id="table">
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
                       @foreach($data as $page)
                        <tr>
                          <td>{{$page->users->name}}</td>
                          <td>{{$page->title}}</td>
                          <td>{{$page->type}}</td>
                          <td> <input data-id="{{$page->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $page->status ? 'checked' : '' }}></td>
													<td> <a href="{{url('/',$page->slug)}}" class="btn btn-sm btn-info btn-b"><i class="fa fa-eye" aria-hidden="true"></i></a>
															 <a href="{{route('editPage',$page->id)}}" class="btn btn-sm btn-info btn-b"><i class='las la-pen'></i></a>
                               <a href='#' onclick= 'showModalFunction({{$page->id}});' class='btn btn-sm btn-danger'><i class='las la-trash'></i></a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script> 
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet"> 
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> 
<link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<script type="text/JavaScript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script type="text/JavaScript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script>
   $(function() { 

$('.toggle-class').change(function() { 

    var status = $(this).prop('checked') == true ? 1 : 0;  

    var user_id = $(this).data('id');  

     console.log(status); 

    $.ajax({ 

        type: "GET", 

        dataType: "json", 

        url: "{{route('postChangeStatus')}}", 

        data: {'status': status, 'user_id': user_id}, 

        success: function(data){ 

          console.log(data.success) 

        } 

    }); 

}) 

}); 
</script>
<script>
   $(document).ready(function () {
        $('#table').DataTable();
    });
  	function showModalFunction(id) {
   
	$('#deleteAlert').modal("show");
	$('#delete_confirm').attr('data-id', id);
		}
	$("#delete_confirm").on('click', function() {
  var id = $(this).data("id");
	var pageURL = window.location.href;
						pageURL = pageURL.slice(0, pageURL.lastIndexOf('/'));
				  window.location.href=pageURL+"/delPage/"+id;
});
</script>


@endsection