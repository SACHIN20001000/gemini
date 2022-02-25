<?php

namespace App\Http\Controllers\Admin\Chowhub;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChowhubProduct;
use App\Models\ChowhubProductVariation;
use App\Models\ChowhubProductGallery;
use App\Models\ChowhubVariationAttribute;
use App\Models\ChowhubVariationAttributeValue;
use App\Models\Category;
use App\Models\ChowhubTag;
use App\Models\ChowhubBrand;
use App\Models\ChowhubProductBrand;

use App\Models\ChowhubBackendTag;
use App\Models\ChowhubProductBackendTag;
use App\Models\ChowhubProductTag;
use App\Models\ChowhubProductDescriptionImage;
use App\Models\ChowhubProductFeaturePageImage;
use App\Models\ChowhubStore;
use DataTables;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\Chowhub\Product\AddProduct;
use App\Http\Requests\Admin\Chowhub\Product\UpdateProduct;
use Storage;
use Intervention\Image\Facades\Image;

class ChowhubImportController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.chowhub.products.import');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
public function store(AddProduct $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduct $request, $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       
    }

  
}
