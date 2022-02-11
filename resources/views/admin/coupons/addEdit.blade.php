
@extends('admin.layouts.app')
@section('content')
<div class="container">
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Coupons</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ {{isset($coupon) ? $coupon->name : 'Add New' }}</span>
            </div>
        </div>
        <a class="btn btn-main-primary ml_auto" href="{{ route('coupons.index') }}">View Coupons</a>
    </div>
    <!-- breadcrumb -->
    <!--Row-->
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        {{isset($coupon) ? 'Update # '.$coupon->id : 'Add New' }}
                    </div>


                    <!--  start  -->
                    <form  id="coupon-add-edit" action="{{isset($coupon) ? route('coupons.update',$coupon->id) : route('coupons.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ isset($coupon) ? method_field('PUT'):'' }}
                        <div class="pd-30 pd-sm-40 bg-gray-200">
                        <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Name</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="name" id="name"  placeholder="Enter your name" type="text" value="{{isset($coupon) ? $coupon->name : '' }}">

                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Code</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="code" id="code"  placeholder="Enter your code" type="text" value="{{isset($coupon) ? $coupon->code : '' }}">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Discount Code</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                   <select onclick="addNumber()" class="form-control" name="type" id="type">
                                        <option value="">Select Below</option>
                                        <option  value="percentage"{{ (isset($coupon) && $coupon->type  == 'percentage') ? 'selected' : '' }} >Percentage</option>
                                        <option value="numeric" {{ (isset($coupon) && $coupon->type  == 'numeric') ? 'selected' : '' }}>Numeric</option>

                                   </select>
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Discount Value</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <p id="validation_show" style="color: green;"></p>
                                    <input class="form-control" name="value" id="value" onclick="validation_percentage();"  placeholder="Enter your value" type="number" value="{{isset($coupon) ? $coupon->value : '' }}">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Count Value</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <p id="validation_show" style="color: green;"></p>
                                    <input class="form-control" name="count" id="count"  placeholder="Enter your Count Value" type="number" value="{{isset($coupon) ? $coupon->count : '' }}">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Started From</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <p id="validation_show" style="color: green;"></p>
                                    <input class="form-control" name="started_at"   placeholder="Enter your starting date " type="date" value="{{isset($coupon) ? $coupon->started_at : '' }}">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20 expire">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Expired Date</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <p id="validation_show" style="color: green;"></p>
                                    <input class="form-control" name="expired_at" id="expired_at"   placeholder="Enter your expired date " type="date" value="{{isset($coupon) ? $coupon->expired_at : '' }}">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Coupon Don't expire</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <p id="validation_show" style="color: green;"></p>
                                    <input id="checkbox" name="lifetime_coupon"onchange="valueChanged()" value="1" {{ (isset($coupon) && $coupon->lifetime_coupon  == 1) ? 'Checked' : '' }} type="checkbox"> if checked, Coupon Don't expire
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Applies To </label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input type="radio" id="entire" {{ (isset($coupon) && $coupon->apply_to  == 'entire_orders') ? 'Checked' : '' }} name="apply_to" value="entire_orders">
                                    <label for="age1">Entire order</label><br>
                                    <input type="radio" id="categories" {{ (isset($coupon) && $coupon->apply_to  == 'specific_category') ? 'Checked' : '' }} name="apply_to" value="specific_category">
                                    <label for="age2">Specific Category</label><br>
                                    <input type="radio"  id="products"   {{ (isset($coupon) && $coupon->apply_to  == 'specific_product') ? 'Checked' : '' }} name="apply_to" value="specific_product">
                                    <label for="age3">Specific Products</label><br>
                                   

                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20" id="category_id">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Specific Category</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                   <select  class="form-control multi" id="specific_category" multiple name="category_id[]" >
                                        <option value="">Select Below</option>
                                      @foreach($categories as $category)
                                            <option value="{{$category->id}}" <?php if(isset($coupon->category_id)){ if(in_array($category->id, json_decode($coupon->category_id))){echo "Selected";}}?>>{{$category->name}}</option>
                                      @endforeach
                                   </select>
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20" id="product_id">
                                    <div class="col-md-4">
                                        <label class="form-label mg-b-0">Specific Product</label>
                                    </div>
                                    <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <div style="overflow: auto;" >
                                    <select class="form-control select2 multi" multiple  id="specific_product"  name="product_id[]"  >
                                        @if(isset($products))
                                        <option value="0">Select Below</option>
                                        @foreach($products as $product)
                                                <option  value="{{$product->id}}" <?php if(isset($coupon->product_id)){ if(in_array($product->id, json_decode($coupon->product_id))){echo "selected";}}?>>{{$product->productName}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    </div>
                                  </div>
                            </div>

                            <button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5" type="submit">{{isset($coupon) ? 'Update' : 'Save' }}</button>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>

    // hide show feild
  $(document).ready(function () {
    $("select").select2();
    $("#product_id").hide();
     $("#category_id").hide();



    $("#categories").click(function () {
        $("#product_id").hide();
        $("#specific_product option").prop("selected", false);

        $("#category_id").show();

    });
    $("#users").click(function () {
        $("#product_id").hide();
        $("#specific_product option").prop("selected", false);
        $("#category_id").hide();
        $("#specific_category option").prop("selected", false);
        $("#user_id").show();

    });
    $("#products").click(function () {

        $("#specific_category option").prop("selected", false);
        $("#product_id").show();

        $("#category_id").hide();
    });
    $(".chownhub").click(function () {

        $("#specific_category option").prop("selected", false);
        $("#product_id").show();
        $("#category_id").hide();
        });

    $("#entire").click(function () {
        $("#product_id").hide();

        $("#specific_category option").prop("selected", false);
        $("#specific_product option").prop("selected", false);

        $("#category_id").hide();
    });
    if($("#categories").is(":checked")) {
        $("#product_id").hide();
        $("#category_id").show();

  }
  if($("#products").is(":checked")) {
     $("#product_id").show();
     $("#category_id").hide();


  }
  if($("#users").is(":checked")) {
     $("#product_id").hide();
     $("#category_id").hide();


  }
  $(".multi").select2({
                multiple:true
                });


  //search


// // run ajax to get product
// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
//    });
// $('input:radio[name="product_type"]').change(function(){
//     $('#specific_product').find('option').remove();
//   var product_type=$(this).val();
//         $.ajax({
//                         url:"{{route('getProductByAjax')}}",
//                         method:"POST",
//                         data:{product_type:product_type},
//                         success:function(data){
//                             $.each(data.data, function (index, value) {
//                             $('#specific_product').append($('<option/>', {
//                                 value: value.id,
//                                 text : value.productName
//                             }));
//                             });
//                         }
//                 });
// });

});

    //generate code
// function generateRandomString(length) {
//   var text = "";
//   var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

//   for (var i = 0; i < length; i++)
//     text += possible.charAt(Math.floor(Math.random() * possible.length));
//     var x= text;
//     $('#code').val('TPPS'+text+x);
// }
// function addNumber() {
//     var x = document.getElementById("type").value;

//     if(x === 'percentage'){
//         $("input[type='number']").prop('max',100);
//     }else{
//         $("input[type='number']").removeAttr('max');
//     }

// }
// function validation_percentage() {
//             var input = document.getElementById('value');
//            var max= $('#value').attr('max');

//            if(max == 100){
//             var n = input.value;
//             n = Number(n);
//             if (n < 0) {
//                 $('#validation_show').html('Type number between 0-100');
//                 input.value = 0;
//             } else if (n > 100) {
//                 $('#validation_show').html('Type number between 0-100');
//                 input.value = 100;
//             }
//            }

//         }


</script>
@if(isset($coupon))
{!! JsValidator::formRequest('App\Http\Requests\Admin\Coupon\UpdateCoupon','#coupon-add-edit') !!}
@else
{!! JsValidator::formRequest('App\Http\Requests\Admin\Coupon\AddCoupon','#coupon-add-edit') !!}
@endif

@endsection


