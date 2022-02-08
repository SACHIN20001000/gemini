@extends('admin.layouts.app')

@section('content')
<!-- container opened -->
<div class="container">

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Order</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Order</span>
        </div>
    </div>

    </div>
</div>
<!-- breadcrumb -->

<!-- row -->
<div class="row row-sm">
    <div class="col-md-12 col-xl-12">
        <div class=" main-content-body-invoice">
            <div class="card card-invoice">
                <div class="card-body">
                    <div class="invoice-header">
                        <h1 class="invoice-title">Order Detail</h1>
                        <div class="billed-from">
                            <h6>{{$order->user->name}}</h6>
                            <p>{{$order->user->address}}<br>
                            @if(!empty($order->user->phone))
                            Tel No: {{$order->user->phone}} <br>
                            @endif
                            Email: {{$order->user->email}}</p>
                        </div><!-- billed-from -->
                    </div><!-- invoice-header -->
                    <div class="row mg-t-20">
                        <div class="col-md">
                            <label class="tx-gray-600">Billed To</label>
                            <div class="billed-to">
                                <h6>{{$order->shipping->sh_name}}</h6>
                                <p>{{$order->shipping->sh_address}}<br>
                                Tel No: {{$order->shipping->sh_phone}}<br>
                                Email: {{$order->shipping->sh_email}}</p>
                            </div>
                        </div>
                        <div class="col-md">
                            <label class="tx-gray-600">Invoice Information</label>
                            <p class="invoice-info-row"><span>Order No</span> <span>{{$order->id}}</span></p>
                            <p class="invoice-info-row"><span>Order Date:</span> <span>{{$order->created_at}}</span></p>
                           @if(!empty($order->transaction_id))
                            <p class="invoice-info-row"><span>Transaction No:</span> <span>{{$order->transaction_id}}</span></p>
                            @endif
                            <p class="invoice-info-row"><span>Status</span> <span>{{$order->status}}</span></p>
                            <p class="invoice-info-row"><span>Shipping Method</span> <span>{{$order->shippingmethod}}</span></p>

                        </div>
                    </div>
                    <div class="table-responsive mg-t-40">
                        <table class="table table-invoice border text-md-nowrap mb-0">
                            <thead>
                                <tr>
                                <th class="wd-40p">Image</th>
                                    <th class="wd-20p">Name</th>
                                    <th class="tx-center">QNTY</th>
                                    <th class="tx-right">Unit Price</th>
                                    <th class="tx-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->orderItems as $orderItem)
                                <tr>
                                <td class="tx-12">
                                    <img src="{{$orderItem->products->feature_image}}" height = 100 width = 100 alt="">
                                </td>
                                    <td>{{$orderItem->products->productName}}</td>

                                    <td class="tx-center">{{$orderItem->quantity}}</td>
                                    <td class="tx-right">${{$orderItem->unit_price}}</td>
                                    <td class="tx-right">${{$orderItem->total_price}}</td>
                                </tr>
                                @endforeach

                                <tr>
                                    <td class="valign-middle" colspan="2" rowspan="4">
                                        <div class="invoice-notes">
                                            <label class="main-content-label tx-13">Notes</label>
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                        </div><!-- invoice-notes -->
                                    </td>
                                    <td class="tx-right">Sub-Total</td>
                                    <td class="tx-right" colspan="2">${{$order->grand_total}}</td>
                                </tr>
                                <!-- <tr>
                                    <td class="tx-right">Tax (5%)</td>
                                    <td class="tx-right" colspan="2">$287.50</td>
                                </tr>
                                <tr>
                                    <td class="tx-right">Discount</td>
                                    <td class="tx-right" colspan="2">-$50.00</td>
                                </tr> -->
                                <!-- <tr>
                                    <td class="tx-right tx-uppercase tx-bold tx-inverse">Total Due</td>
                                    <td class="tx-right" colspan="2">
                                        <h4 class="tx-primary tx-bold">$5,987.50</h4>
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                    <hr class="mg-b-40">
                    <!-- <a class="btn btn-purple float-end mt-3 ms-2" href="">
                        <i class="mdi mdi-currency-usd me-1"></i>Pay Now
                    </a>
                    <a href="#" class="btn btn-danger float-end mt-3 ms-2"  onclick="javascript:window.print();">
                        <i class="mdi mdi-printer me-1"></i>Print
                    </a>
                    <a href="#" class="btn btn-success float-end mt-3">
                        <i class="mdi mdi-telegram me-1"></i>Send Invoice
                    </a> -->
                </div>
            </div>
        </div>
    </div><!-- COL-END -->
</div>
<!-- row closed -->
</div>
<!-- Container closed -->


@endsection

