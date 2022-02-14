<?php

namespace App\Http\Controllers\Admin\Litterhub;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Litterhub\LitterhubProduct;
use App\Models\Litterhub\LitterhubProductVariation;
use App\Models\Litterhub\LitterhubProductGallery;
use App\Models\Litterhub\LitterHubVariationAttribute;
use App\Models\Litterhub\LitterhubVariationAttributeValue;
use App\Models\Litterhub\Litterhuby;
use App\Models\Litterhub\LitterhubTag;
use App\Models\Litterhub\LitterhubProductTag;
use App\Models\Litterhub\LitterhubBackendTag;
use App\Models\Litterhub\LitterhubProductBackendTag;
use App\Models\Litterhub\LitterhubProductDescriptionImage;
use App\Models\Litterhub\LitterhubProductFeaturePageImage;
use App\Models\Litterhub\LitterhubStore;
use DataTables;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\Litterhub\Product\AddProduct;
use App\Http\Requests\Admin\Litterhub\Product\UpdateProduct;
use Storage;
use Intervention\Image\Facades\Image;

class LitterhubProductController extends Controller
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
            $data = LitterhubProduct::with('store')->get();

            return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('status', function ($row)
                            {
                                if ($row->status == 1)
                                {
                                    $status = '<span class="label text-success d-flex">
                                                    <div class="dot-label bg-success me-1"></div>active
                                                </span>';
                                } else
                                {
                                    $status = '<span class="label text-danger d-flex">
                                                    <div class="dot-label bg-danger me-1"></div> inactive
                                                </span>';
                                }

                                return $status;
                            })
                            ->addColumn('action', function ($row)
                            {
                                $action = '<span class="action-buttons">
                                    <a  href="' . route("litterhub-products.edit", $row) . '" class="btn btn-sm btn-info btn-b"><i class="las la-pen"></i>
                                    </a>

                                    <a href="' . route("litterhub-products.destroy", $row) . '"
                                            class="btn btn-sm btn-danger remove_us"
                                            title="Delete User"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            data-method="DELETE"
                                            data-confirm-title="Please Confirm"
                                            data-confirm-text="Are you sure that you want to delete this Product?"
                                            data-confirm-delete="Yes, delete it!">
                                            <i class="las la-trash"></i>
                                        </a>
                                ';
                                return $action;
                            })
                            ->rawColumns(['action', 'status'])
                            ->make(true)
            ;
        }

        return view('admin.litterhub.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $stores = LitterhubStore::all();
        $attributes = [];
        $variations = [];
        return view('admin.litterhub.products.addEdit', compact( 'stores', 'attributes', 'variations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
public function store(AddProduct $request)
    {
        $inputs = $request->all();
        $tags = explode(",", $inputs['tag']);
        $backendtags = explode(",", $inputs['backend_tag']);
        // ADD PRODUCT TABLE DATA
//         echo"<pre>";
// print_r($inputs);die;

        if (!empty($inputs['productName']))
        {
            $products = new LitterhubProduct();
            $products->productName = $inputs['productName'];
            $products->description = $inputs['description'];
            $products->real_price = $inputs['real_price'];
            $products->sale_price = $inputs['sale_price'];
            $products->sku = $inputs['sku'];
            $products->scented = $inputs['scented'];
            $products->clumping = $inputs['clumping'];
            $products->cat_count = $inputs['cat_count'];
            $products->litter_material = json_encode($inputs['litter_material']);
            // $products->weight = $inputs['weight'];
            if (!empty($inputs['feature_image']))
            {
                $path = Storage::disk('s3')->put('images', $inputs['feature_image']);
                $image_path = Storage::disk('s3')->url($path);
                $products->feature_image = $image_path;
            }
            $products->quantity = $inputs['qty'];
            // $products->category_id = $inputs['category_id'];
            $products->store_id = $inputs['store_id'];
            $products->status = $inputs['status'];
            if (!empty($inputs['variations']))
            {
                $products->type = 'Variation';
            }
            $products->save();
            //add attributes
            //store images in gallery
            if (!empty($inputs['image']))
            {
                foreach ($inputs['image'] as $image)
                {
                    $productImage = new LitterhubProductGallery();
                    $productImage->product_id = $products->id;
                    $productImage->image_path = $image;
                    $productImage->save();
                }
            }
// feature page image
            if (!empty($inputs['feature_page_images']))
            {
                foreach ($inputs['feature_page_images'] as $key => $image)
                {

                    LitterhubProductFeaturePageImage::create([
                        'product_id' => $products->id,
                        'priority' => $key,
                        'image_path' => $image
                    ]);
                }
            }
            //store desp images
            if (!empty($inputs['description_images']))
            {
                foreach ($inputs['description_images'] as $key => $image)
                {


                    LitterhubProductDescriptionImage::create([
                        'image_path' => $image,
                        'product_id' => $products->id,
                        'priority' => $key,
                    ]);
                }
            }
            //tags
            if (!empty($tags))
            {
                foreach ($tags as $vakey => $tagName)
                {

                    $tag = LitterhubTag::updateOrCreate([
                                'name' => $tagName
                                    ], [
                                'name' => $tagName
                    ]);

                    $tagValue = new LitterhubProductTag;
                    $tagValue->tag_id = $tag->id;
                    $tagValue->product_id = $products->id;
                    $tagValue->save();
                }
            }

            if (!empty($backendtags))
            {
                foreach ($backendtags as $vakey => $tagName)
                {

                    $tag = LitterhubBackendTag::updateOrCreate([
                                'name' => $tagName
                                    ], [
                                'name' => $tagName
                    ]);

                    $tagValue = new LitterhubProductBackendTag;
                    $tagValue->tag_id = $tag->id;
                    $tagValue->product_id = $products->id;
                    $tagValue->save();
                }
            }
            if (!empty($inputs['attributes']))
            {

                $attributeCombinations = [];
                $attributesName = [];
                foreach ($inputs['attributes'] as $vakey => $attributeName)
                {

                    $variationAttribute = LitterhubVariationAttribute::updateOrCreate([
                                'name' => $vakey
                                    ], [
                                'name' => $vakey
                    ]);
                    array_push($attributesName, $vakey);

                    /*                     * insert attribute* */
                    if ($variationAttribute->id)
                    {

                        $variationAttrArrs = explode(",", $attributeName);

                        foreach ($variationAttrArrs as $variationAttrArr)
                        {
                            $variationAttributeValue = new LitterhubVariationAttributeValue;
                            $variationAttributeValue->attribute_id = $variationAttribute->id;
                            $variationAttributeValue->product_id = $products->id;
                            $variationAttributeValue->name = $variationAttrArr;
                            $variationAttributeValue->save();
                        }
                    }
                }

                if (!empty($inputs['variations']))
                {
                    foreach ($inputs['variations'] as $variation)
                    {
                        $Imagepath = '';
                        if (!empty($variation['image']))
                        {
                            $filename = $variation['image']->hashname();
                            $image = Image::make($variation['image'])->resize(360, 360);
                            Storage::disk('s3')->put('/images/'.$filename, $image->stream(), 'public');
                            $Imagepath = Storage::disk('s3')->url('images/'.$filename);
                        }

                        $productVariation = new LitterhubProductVariation;
                        $productVariation->product_id = $products->id;

                        $variationAttributeIds = [];
                        foreach ($attributesName as $key => $attribute)
                        {
                            $selectedAttrubutes = LitterhubVariationAttributeValue::select('id', 'attribute_id')->where(['product_id' => $products->id, 'name' => $variation[$attribute]])->first();
                            if ($selectedAttrubutes)
                            {
                                $AttributesArray = [];
                                $AttributesArray['attribute_id'] = $selectedAttrubutes->id;
                                $AttributesArray['attribute_name_id'] = $selectedAttrubutes->attribute_id;
                                array_push($variationAttributeIds, $AttributesArray);
                            }
                        }
                        $productVariation->real_price = $variation['regular_price'];
                        $productVariation->sale_price = $variation['sale_price'];

                        $productVariation->quantity = $variation['qty'];
                        $productVariation->weight = $variation['weight'];
                        $productVariation->variation_attributes_name_id = json_encode($variationAttributeIds);
                        $productVariation->sku = $variation['sku'];

                        $productVariation->image = $Imagepath;
                        $productVariation->save();
                    }
                }
            }
        }

        return back()->with('success', 'Product added successfully!');
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

        $stores = LitterhubStore::all();
        $product = LitterhubProduct::with([ 'store', 'productVariation', 'productFeaturePageImage', 'productGallery', 'variationAttributesValue.variationAttributeName'])->where('id', $id)->first();

        $variations = [];
        foreach ($product->productVariation as $key => $variation)
        {
            $allvariations = json_decode($variation->variation_attributes_name_id);

            $viewData = [];

            foreach ($allvariations as $data)
            {

                $attr_name = LitterhubVariationAttribute::where('id', $data->attribute_name_id)->pluck('name')->first();
                $attrValue = LitterhubVariationAttributeValue::where('id', $data->attribute_id)->pluck('name')->first();
                $viewData[$attr_name] = $attrValue;
            }

            $viewData['Qty'] = array('value' => $variation->quantity, 'name' => 'qty', 'placeholder' => 'Qty', 'type' => 'number', 'customClass' => '');
            $viewData['Weight'] = array('value' => $variation->weight, 'name' => 'weight', 'placeholder' => 'weight', 'type' => 'number', 'customClass' => '');
            $viewData['Regular Price'] = array('value' => $variation->real_price, 'name' => 'regular_price', 'placeholder' => 'Regular Price', 'type' => 'number', 'customClass' => '');
            $viewData['Sale Price'] = array('value' => $variation->sale_price, 'name' => 'sale_price', 'placeholder' => 'Sale Price', 'type' => 'number', 'customClass' => '');
            $viewData['Sku'] = array('value' => $variation->sku, 'name' => 'sku', 'placeholder' => 'Sku', 'type' => 'text', 'customClass' => '');
            $viewData['Image(360px*360px)'] = array('value' => '', 'name' => 'image', 'placeholder' => 'Image', 'type' => 'file', 'dataitem' => $variation->image, 'customClass' => 'dropify');
            $viewData['hidden_id'] = array('value' => $variation->id, 'name' => 'id', 'placeholder' => '', 'type' => 'hidden', 'customClass' => '');

            array_push($variations, $viewData);
        }

        $attributes = [];
        foreach ($product->variationAttributesValue as $data)
        {
            $attributes[$data->variationAttributeName->name][] = $data->name;
        }

        return view('admin.litterhub.products.addEdit', compact('product', 'stores',  'attributes', 'variations'));
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
        $inputs = $request->all();
        if(!isset($inputs['variations'][0]['id'])){
            LitterhubProductVariation::where('product_id', $id)->delete();
        }
        LitterhubVariationAttributeValue::where('product_id', $id)->delete();
        $tags = explode(",", $inputs['tag']);
        $backendtags = explode(",", $inputs['backend_tag']);
        if (!empty($inputs['productName']))
        {
            $products = LitterhubProduct::find($id);
            $products->productName = $inputs['productName'];
            $products->description = $inputs['description'];
            $products->real_price = $inputs['real_price'];
            $products->sale_price = $inputs['sale_price'];
            if (!empty($inputs['feature_image']))
            {
                $path = Storage::disk('s3')->put('images', $inputs['feature_image']);
                $image_path = Storage::disk('s3')->url($path);
                $products->feature_image = $image_path;
            }
            $products->sku = $inputs['sku'];
            $products->scented = $inputs['scented'];
            $products->clumping = $inputs['clumping'];
            $products->cat_count = $inputs['cat_count'];
            $products->litter_material = json_encode($inputs['litter_material']);
            $products->quantity = $inputs['qty'];

            $products->store_id = $inputs['store_id'];
            $products->status = $inputs['status'];
            if (!empty($inputs['variations']))
            {
                $products->type = 'Variation';
            }
            $products->save();

            LitterhubProductFeaturePageImage::where('product_id', $products->id)->delete();
            LitterhubProductDescriptionImage::where('product_id', $products->id)->delete();
            //add attributes
            if (!empty($tags))
            {
                LitterhubProductTag::where('product_id', $id)->delete();
                foreach ($tags as $vakey => $tagName)
                {
                    $tag = LitterhubTag::updateOrCreate([
                                'name' => $tagName
                                    ], [
                                'name' => $tagName
                    ]);
                    $tagValue = new LitterhubProductTag;
                    $tagValue->tag_id = $tag->id;
                    $tagValue->product_id = $products->id;
                    $tagValue->save();
                }
            }
            if (!empty($backendtags))
            {
                LitterhubProductBackendTag::where('product_id', $id)->delete();
                foreach ($backendtags as $vakey => $tagName)
                {

                    $tag = LitterhubBackendTag::updateOrCreate([
                                'name' => $tagName
                                    ], [
                                'name' => $tagName
                    ]);

                    $tagValue = new LitterhubProductBackendTag;
                    $tagValue->tag_id = $tag->id;
                    $tagValue->product_id = $products->id;
                    $tagValue->save();
                }
            }
            if (!empty($inputs['feature_page_images']))
            {
                foreach ($inputs['feature_page_images'] as $key => $image)
                {

                    LitterhubProductFeaturePageImage::create([
                        'product_id' => $products->id,
                        'priority' => $key,
                        'image_path' => $image
                    ]);
                }
            }
            //store images in gallery
            if (!empty($inputs['image']))
            {
                foreach ($inputs['image'] as $image)
                {
                    $productImage = new LitterhubProductGallery();
                    $productImage->product_id = $products->id;
                    $productImage->image_path = $image;
                    $productImage->save();
                }
            }
            //store desp images
            if (!empty($inputs['description_images']))
            {
                foreach ($inputs['description_images'] as $key => $image)
                {


                    LitterhubProductDescriptionImage::create([
                        'image_path' => $image,
                        'product_id' => $products->id,
                        'priority' => $key,
                    ]);
                }
            }
            if (!empty($inputs['attributes']))
            {


                $attributeCombinations = [];
                $attributesName = [];

                foreach ($inputs['attributes'] as $vakey => $attributeName)
                {

                    $variationAttribute = LitterhubVariationAttribute::updateOrCreate([
                                'name' => $vakey
                                    ], [
                                'name' => $vakey
                    ]);
                    array_push($attributesName, $vakey);

                    /*                     * insert attribute* */
                    if ($variationAttribute->id)
                    {

                        $variationAttrArrs = explode(",", $attributeName);

                        foreach ($variationAttrArrs as $variationAttrArr)
                        {
                            $variationAttributeValue = new LitterhubVariationAttributeValue;
                            $variationAttributeValue->attribute_id = $variationAttribute->id;
                            $variationAttributeValue->product_id = $products->id;
                            $variationAttributeValue->name = $variationAttrArr;
                            $variationAttributeValue->save();
                        }
                    }
                }

                if (!empty($inputs['variations']))
                {

                    foreach ($inputs['variations'] as $variation)
                    {
                        $Imagepath = '';

                        if (!empty($variation['id']))
                        {
                            $productVariation = LitterhubProductVariation::find($variation['id']);
                            $productVariation->product_id = $products->id;

                            $variationAttributeIds = [];
                            foreach ($attributesName as $key => $attribute)
                            {
                                $selectedAttrubutes = LitterhubVariationAttributeValue::select('id', 'attribute_id')->where(['product_id' => $products->id, 'name' => $variation[$attribute]])->first();
                                if ($selectedAttrubutes)
                                {
                                    $AttributesArray = [];
                                    $AttributesArray['attribute_id'] = $selectedAttrubutes->id;
                                    $AttributesArray['attribute_name_id'] = $selectedAttrubutes->attribute_id;
                                    array_push($variationAttributeIds, $AttributesArray);
                                }
                            }
                            if (!empty($variation['image']))
                            {
                                $filename = $variation['image']->hashname();
                                $image = Image::make($variation['image'])->resize(360, 360);
                                Storage::disk('s3')->put('/images/'.$filename, $image->stream(), 'public');
                                $Imagepath = Storage::disk('s3')->url('images/'.$filename);
                                $productVariation->image = $Imagepath;
                            }
                            $productVariation->real_price = $variation['regular_price'];
                            $productVariation->sale_price = $variation['sale_price'];

                            $productVariation->quantity = $variation['qty'];
                            $productVariation->weight = $variation['weight'];
                            $productVariation->variation_attributes_name_id = json_encode($variationAttributeIds);
                            $productVariation->sku = $variation['sku'];
                            $productVariation->save();
                        } else
                        {
                            $productVariation = new LitterhubProductVariation;
                            $productVariation->product_id = $products->id;

                            $variationAttributeIds = [];
                            foreach ($attributesName as $key => $attribute)
                            {
                                $selectedAttrubutes = LitterhubVariationAttributeValue::select('id', 'attribute_id')->where(['product_id' => $products->id, 'name' => $variation[$attribute]])->first();
                                if ($selectedAttrubutes)
                                {
                                    $AttributesArray = [];
                                    $AttributesArray['attribute_id'] = $selectedAttrubutes->id;
                                    $AttributesArray['attribute_name_id'] = $selectedAttrubutes->attribute_id;
                                    array_push($variationAttributeIds, $AttributesArray);
                                }
                            }
                            if (!empty($variation['image']))
                            {
                                $path = Storage::disk('s3')->put('images', $variation['image']);
                                $Imagepath = Storage::disk('s3')->url($path);
                                $productVariation->image = $Imagepath;
                            }
                            $productVariation->real_price = $variation['regular_price'];
                            $productVariation->sale_price = $variation['sale_price'];

                            $productVariation->quantity = $variation['qty'];
                            $productVariation->weight = $variation['weight'];
                            $productVariation->variation_attributes_name_id = json_encode($variationAttributeIds);
                            $productVariation->sku = $variation['sku'];
                            $productVariation->save();
                        }
                    }
                }
            }
        }


        return back()->with('success', 'Product Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        LitterhubProductVariation::where('product_id', $id)->delete();
        LitterhubProductGallery::where('product_id', $id)->delete();
        LitterhubVariationAttributeValue::where('product_id', $id)->delete();
        LitterhubProductTag::where('product_id', $id)->delete();
        LitterhubProduct::find($id)->delete();

        LitterhubProductFeaturePageImage::where('product_id', $id)->delete();
        LitterhubProductDescriptionImage::where('product_id', $id)->delete();
        return back()->with('success', 'Product deleted successfully!');
    }

    public function save_photo(Request $request)
    {

        if ($request->file('images'))
        {
            $filename = $request->images->hashname();
            $image = Image::make($request->images)->resize(619, 577);
            Storage::disk('s3')->put('/images/products/'.$filename, $image->stream(), 'public');
            $path = Storage::disk('s3')->url('images/products/'.$filename);
            // $path = Storage::disk('s3')->put('images/products', $request->images);
            // $path = Storage::disk('s3')->url($path);
            $id = substr($path, -8, 1);
            return Response()->json([
                        "success" => true,
                        "image" => $path,
                        "id" => $id
            ]);
        }

        return Response()->json([
                    "success" => false,
                    "image" => ''
        ]);
    }

    public function save_description_photo(Request $request)
    {


        if ($request->file('description_images'))
        {
            $filename = $request->description_images->hashname();
            $image = Image::make($request->description_images)->resize(1238, 652);
            Storage::disk('s3')->put('/images/products/'.$filename, $image->stream(), 'public');
            $path = Storage::disk('s3')->url('images/products/'.$filename);
            $id = substr($path, -8, 1);
            return Response()->json([
                        "success" => true,
                        "image" => $path,
                        "id" => $id
            ]);
        }

        return Response()->json([
                    "success" => false,
                    "image" => ''
        ]);
    }

    public function del_photo(Request $request)
    {

        LitterhubProductGallery::find($request->id)->delete();

        return Response()->json([
                    "success" => 'Deleted Successfully',
        ]);
    }

    public function del_description_photo(Request $request)
    {

        LitterhubProductDescriptionImage::find($request->id)->delete();

        return Response()->json([
                    "success" => 'Deleted Successfully',
        ]);
    }

    public function del_feature_page_photo(Request $request)
    {

        LitterhubProductFeaturePageImage::find($request->id)->delete();

        return Response()->json([
                    "success" => 'Deleted Successfully',
        ]);
    }

}
