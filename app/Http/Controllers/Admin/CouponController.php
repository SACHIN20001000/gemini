<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Category;
use App\Models\Product;
use App\Models\ChowhubProduct;
use DataTables;
use App\Http\Requests\Admin\Coupon\AddCoupon;
use App\Http\Requests\Admin\Coupon\UpdateCoupon;
use Storage;

class CouponController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax())
        {
            $data = Coupon::all();

            return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function ($row)
                            {

                                $action = '<span class="action-buttons">
                                    <a  href="' . route("coupons.edit", $row) . '" class="btn btn-sm btn-info btn-b"><i class="las la-pen"></i>
                                    </a>

                                    <a href="' . route("coupons.destroy", $row) . '"
                                            class="btn btn-sm btn-danger remove_us"
                                            title="Delete User"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            data-method="DELETE"
                                            data-confirm-title="Please Confirm"
                                            data-confirm-text="Are you sure that you want to delete this coupons?"
                                            data-confirm-delete="Yes, delete it!">
                                            <i class="las la-trash"></i>
                                        </a>
                                ';
                                return $action;
                            })
                            ->rawColumns(['action'])
                            ->make(true)
            ;
        }

        return view('admin.coupons.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('name', 'id')->where(['parent' => 0, 'type' => 'Product'])->get();
        $products = Product::select('productName', 'id')->get();

        return view('admin.coupons.addEdit', compact('categories', 'products'));
    }

    /**
     * coupons a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCoupon $request)
    {


        $inputs = $request->all();
        foreach ($inputs['product_id'] as $key => $value)
        {

            $inputs['product_id'] = $value;
            Coupon::create($inputs);
        }


        return back()->with('success', 'Coupon addded successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = Coupon::find($id);
        $categories = Category::with('childrens')->where(['parent' => 0, 'type' => 'Product'])->get();

        $coupons = Coupon::where('id', '!=', $id)->get();

        if ($coupon['product_type'] == 'product')
        {
            $products = Product::select('productName', 'id')->get();
        } else
        {
            $products = ChownhubProduct::select('productName', 'id')->get();
        }

        return view('admin.coupons.addEdit', compact('coupons', 'coupon', 'categories', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCoupon $request, Coupon $coupon)
    {

        $inputs = $request->all();
        foreach ($inputs['product_id'] as $key => $value)
        {

            $inputs['product_id'] = $value;
            $coupon->update($inputs);
        }
        return back()->with('success', 'Coupon updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();

        return back()->with('success', 'Coupon deleted successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getProductByAjax(Request $request)
    {
        if ($request->product_type == 'product')
        {
            $product = Product::Select('id', 'productName')->get();
            return Response()->json([
                        "success" => true,
                        "data" => $product,
            ]);
        } else
        {
            $product = ChowhubProduct::Select('id', 'productName')->get();
            return Response()->json([
                        "success" => true,
                        "data" => $product,
            ]);
        }
    }

}
