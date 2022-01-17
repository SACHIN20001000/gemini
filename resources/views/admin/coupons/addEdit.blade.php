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
                                    <label class="form-label mg-b-0">Code</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="code" id="code" readOnly placeholder="Enter your code" type="text" value="{{isset($coupon) ? $coupon->code : '' }}"> <i class="fas fa-sync" onClick="generateRandomString(8)"></i>

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
                                    <label class="form-label mg-b-0">Applies To </label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input type="radio" id="apply_to" {{ (isset($coupon) && $coupon->apply_to  == 'entire_orders') ? 'Checked' : '' }} name="apply_to" value="entire_orders">
                                    <label for="age1">Entire order</label><br>
                                    <input type="radio" id="apply_to" {{ (isset($coupon) && $coupon->apply_to  == 'specific_category') ? 'Checked' : '' }} name="apply_to" value="specific_category">
                                    <label for="age2">Specific collections</label><br>
                                    <input type="radio"  id="apply_to"   {{ (isset($coupon) && $coupon->apply_to  == 'specific_product') ? 'Checked' : '' }} name="apply_to" value="specific_product">
                                    <label for="age3">Specific products</label><br>

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
<script>

function generateRandomString(length) {
  var text = "";
  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

  for (var i = 0; i < length; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));
    $('#code').val('TPPS'+text+text);
}
function addNumber() {
    var x = document.getElementById("type").value;
    // console.log(x)
    if(x === 'percentage'){
        $("input[type='number']").prop('max',100);
    }else{
        $("input[type='number']").removeAttr('max');
    }

}
function validation_percentage() {
            var input = document.getElementById('value');
           var max= $('#value').attr('max');
        //    console.log(max)
           if(max == 100){
            var n = input.value;
            n = Number(n);
            if (n < 0) {
                $('#validation_show').html('Type number between 0-100');
                input.value = 0;
            } else if (n > 100) {
                $('#validation_show').html('Type number between 0-100');
                input.value = 100;
            }
           }

        }


</script>
@if(isset($coupon))
{!! JsValidator::formRequest('App\Http\Requests\Admin\Coupon\UpdateCoupon','#coupon-add-edit') !!}
@else
{!! JsValidator::formRequest('App\Http\Requests\Admin\Coupon\AddCoupon','#coupon-add-edit') !!}
@endif

@endsection


