<?php

namespace App\Http\Controllers\Staff;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::with('user')->select('id', 'name', 'slug', 'status', 'created_by')->get();

        return view('backend.brands.manage', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      =>     'required|min:2|max:10|unique:brands',
            'status'    =>     'required'
        ]);

        try {
            Brand::create([
                'name'          => $request->name,
                'slug'          => slugify($request->name),
                'status'        =>  $request->status,
                'created_by'    => Auth::id(),

            ]);
            session()->flash('type', 'success');
            session()->flash('message', 'Yeh! A Brand Has Been Successfully Created.');
        } catch (Exception $exception) {
            session()->flash('type', 'danger');
            session()->flash('message', 'Something Wrong');
        }


        //session()->flash('success', 'Yeh! A Brand Has Been Successfully Created.');

        return redirect()->back();
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


        $brand = Brand::find($id);
        return view('backend.brands.edit', compact('brand') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $brand = Brand::find($id);

        $request->validate([
            'name'      =>     'required|min:2|max:10|unique:brands,id,'.$id,
            'status'    =>     'required'
        ]);



        try {
            $brand->name    = $request->name;
            $brand->slug    = slugify($request->name);
            $brand->status  = $request->status;
            $brand->created_by  = Auth::id();
            $brand->update();

            setMessage('success','Yeh! A Brand Has Been Successfully Updated');


        } catch (Exception $exception) {

            setMessage('danger','Something Wrong');

        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            $brand = Brand::find($id);
            $brand->delete();

            session()->flash('type', 'success');
            session()->flash('message', 'Yeh! A Brand Has Been Successfully Deletted.');

        } catch (Exception $exception) {
            session()->flash('type', 'danger');
            session()->flash('message', 'Something Wrong');
        }


        return redirect()->back();
    }
}
