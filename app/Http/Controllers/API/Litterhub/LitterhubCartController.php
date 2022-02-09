<?php

namespace App\Http\Controllers\API\Litterhub;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChowhubCart;
use App\Models\ChowhubProduct;
use App\Models\ChowhubProductVariation;
use App\Models\ChowhubCartItem;
use App\Models\Order;
use App\Http\Resources\Carts\ChowhubCartResource;
use App\Http\Resources\Carts\ChowhubCartItemsResource;
use App\Http\Requests\API\ChowhubCartIdRequest;
use App\Http\Requests\API\CheckoutRequest;
use App\Http\Requests\API\ChowhubCartAddProductRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Coupon;
use App\Models\OrderItem;
use App\Models\Shipping;

class LitterhubCartController extends Controller
{

}
