<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use DataTables;
use App\Http\Requests\Admin\Stores\AddStores;
use App\Http\Requests\Admin\Stores\UpdateStores;
use Storage;

class StoreController extends Controller
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
            $data = Store::all();

            return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function ($row)
                            {

                                $action = '<span class="action-buttons">
                                    <a  href="' . route("stores.edit", $row) . '" class="btn btn-sm btn-info btn-b"><i class="las la-pen"></i>
                                    </a>
                                    
                                    <a href="' . route("stores.destroy", $row) . '"
                                            class="btn btn-sm btn-danger remove_us"
                                            title="Delete User"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            data-method="DELETE"
                                            data-confirm-title="Please Confirm"
                                            data-confirm-text="Are you sure that you want to delete this stores?"
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

        return view('admin.stores.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.stores.addEdit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddStores $request)
    {


        $Store = new Store;
        $Store->name = $request->name;
        $Store->save();

        return back()->with('success', 'Store addded successfully!');
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
        $store = Store::find($id);

        $stores = Store::where('id', '!=', $id)->get();
        return view('admin.stores.addEdit', compact('stores', 'store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStores $request, $id)
    {

        $Store = Store::find($id);
        $Store->name = $request->name;
        $Store->save();

        return back()->with('success', 'Store updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Store::find($id)->delete();

        return back()->with('success', 'Store deleted successfully!');
    }

}
