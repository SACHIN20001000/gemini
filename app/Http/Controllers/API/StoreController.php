<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Http\Resources\Stores\StoreResource;
class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $stores = Store::orderBy('id', 'asc')->get();
        return  StoreResource::collection($stores);

    }

    public function show(Store $store)
    {
        return  new StoreResource($store);

    }
}
