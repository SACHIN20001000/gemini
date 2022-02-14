<?php

namespace App\Http\Controllers\Admin\Solutionhub;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solutionhub\SolutionhubProduct;
use App\Models\Solutionhub\SolutionhubTag;
use App\Models\Solutionhub\SolutionhubProductTag;
use App\Models\Solutionhub\SolutionhubBackendTag;
use App\Models\Solutionhub\SolutionhubProductBackendTag;
use DataTables;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\Solutionhub\Product\AddProduct;
use App\Http\Requests\Admin\Solutionhub\Product\UpdateProduct;
use Storage;
use Intervention\Image\Facades\Image;

class SolutionhubProductController extends Controller
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
            $data = SolutionhubProduct::all();

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
                                    <a  href="' . route("solutionhub-products.edit", $row) . '" class="btn btn-sm btn-info btn-b"><i class="las la-pen"></i>
                                    </a>

                                    <a href="' . route("solutionhub-products.destroy", $row) . '"
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

        return view('admin.solutionhub.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.solutionhub.products.addEdit');
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

        if (!empty($inputs['feature_image']))
        {
            $path = Storage::disk('s3')->put('images', $inputs['feature_image']);
            $image_path = Storage::disk('s3')->url($path);
            $inputs['feature_image'] = $image_path;
        }
        $products=SolutionhubProduct::create($inputs);
        $tags = explode(",", $inputs['tag']);
        $backendtags = explode(",", $inputs['backend_tag']);
        if (!empty($tags))
        {
            foreach ($tags as $vakey => $tagName)
            {

                $tag = SolutionhubTag::updateOrCreate([
                            'name' => $tagName
                                ], [
                            'name' => $tagName
                ]);

                $tagValue = new SolutionhubProductTag;
                $tagValue->tag_id = $tag->id;
                $tagValue->product_id = $products->id;
                $tagValue->save();
            }
        }
        if (!empty($backendtags))
        {
            foreach ($backendtags as $vakey => $tagName)
            {

                $tag = SolutionhubBackendTag::updateOrCreate([
                            'name' => $tagName
                                ], [
                            'name' => $tagName
                ]);

                $tagValue = new SolutionhubProductBackendTag;
                $tagValue->tag_id = $tag->id;
                $tagValue->product_id = $products->id;
                $tagValue->save();
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

        $product = SolutionhubProduct::where('id', $id)->first();
        return view('admin.solutionhub.products.addEdit', compact('product'));
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
        if (!empty($inputs['feature_image']))
        {
            $path = Storage::disk('s3')->put('images', $inputs['feature_image']);
            $image_path = Storage::disk('s3')->url($path);
            $inputs['feature_image'] = $image_path;
        }

      SolutionhubProduct::find($id)->update($inputs);
        $tags = explode(",", $inputs['tag']);
        $backendtags = explode(",", $inputs['backend_tag']);
        if (!empty($tags))
        {
            SolutionhubProductTag::where('product_id', $id)->delete();
            foreach ($tags as $vakey => $tagName)
            {

                $tag = SolutionhubTag::updateOrCreate([
                            'name' => $tagName
                                ], [
                            'name' => $tagName
                ]);

                $tagValue = new SolutionhubProductTag;
                $tagValue->tag_id = $tag->id;
                $tagValue->product_id = $id;
                $tagValue->save();
            }
        }
        if (!empty($backendtags))
        {
            SolutionhubProductBackendTag::where('product_id', $id)->delete();
            foreach ($backendtags as $vakey => $tagName)
            {

                $tag = SolutionhubBackendTag::updateOrCreate([
                            'name' => $tagName
                                ], [
                            'name' => $tagName
                ]);

                $tagValue = new SolutionhubProductBackendTag;
                $tagValue->tag_id = $tag->id;
                $tagValue->product_id = $id;
                $tagValue->save();
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
        SolutionhubProductTag::where('product_id', $id)->delete();
        SolutionhubProductBackendTag::where('product_id', $id)->delete();
        SolutionhubProduct::find($id)->delete();
        return back()->with('success', 'Product deleted successfully!');
    }


}
