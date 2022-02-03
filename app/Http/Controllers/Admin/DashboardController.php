<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ChowhubProduct;
use App\Models\Rating;
use App\Models\User;

use App\Models\Order;
class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * dashboard view
     * @return type
     */
    public function index()
    {
            $category=Category::where(['type' => 'Product','status'=>1])->count();
            $product=Product::where(['status'=>1])->count();
            $chowhubproduct=ChowhubProduct::where(['status'=>1])->count();
            $order=Order::count();
            $orderpending=Order::where('status','pending')->count();
            $orderprocessing=Order::where('status','processing')->count();
            $ordercompleted=Order::where('status','completed')->count();
            $rating=Rating::count();
            $user=User::with('roles')->whereHas(
                'roles', function($q){
                    $q->where('name','!=','IotAdmin');
                })
            ->count();





        return view('admin.dashboard',compact('category','user','product','chowhubproduct','order','rating','orderpending','orderprocessing','ordercompleted'));
    }

}
