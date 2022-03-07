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
        <div>
        <a class="btn btn-main-primary ml_auto" href="{{ route('litterhub-products.create') }}">Add New</a>
        <a class="btn btn-main-primary ml_auto export-btn"  href="#">Export</a>
        <a class="btn btn-main-primary ml_auto"  href="{{ route('litterhub-import.index') }}">Import</a>
        </div>
       
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
                                <th class="wd-lg-20p"><span><input type="checkbox" name="export"  class="form-check-input allchecked"></span></th>
                                <th class="wd-lg-20p"><span>Id</span></th>
                                    <th class="wd-lg-20p"><span>Name</span></th>
                                    <th class="wd-lg-20p"><span>Store</span></th>
                                    <th class="wd-lg-20p"><span>Brand</span></th>
                                    <th class="wd-lg-20p"><span>Tags</span></th>
                                    <th class="wd-lg-20p"><span>Backend Tags</span></th>
                                    <th class="wd-lg-20p"><span>Status</span></th>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            order: [ 1, 'desc' ],
            ajax: "{{ route('litterhub-products.index') }}",
            columns: [
                {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false },
                {data: 'id', name: 'id' },
                {data: 'productName', name: 'productName' },
                {data: 'store.name', name: 'store.name',orderable: false,},
                {data: 'availBrands', name: 'availBrands' },
                {data: 'availTags', name: 'availTags' },
                {data: 'availBackendTags', name: 'availBackendTags' }, 

                {data: 'status', name: 'status'},

      
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $(".allchecked").click(function(){
        if ($(this).is(':checked'))
            {
                $(".checkbox").prop('checked', true);
            }else{
                $(".checkbox").prop('checked', false);
            }              
        });
        $(".export-btn").click(function(){
           
            if ($('.checkbox').is(':checked'))
            {
                var id=[];
                $('input[name="export"]:checked').each(function() {
                    id.push(this.value);
                });
              
                var data = 'id=' + id;
                $.ajax({
                    type:'POST',
                            url:'/admin/litterhub-product-export',
                            data: data,
                            cache: false,
                            xhrFields:{
                                responseType: 'blob'
                            },

                            success:function(data){
                               
                                var link = document.createElement('a');
                                link.href = window.URL.createObjectURL(data);
                                link.download = `ExportProducts.csv`;
                                link.click();
                            }
                    });
            }else{
                swal("Please Select Products For Export...");
            }     
        });
      
    });
  
</script>
@endsection
