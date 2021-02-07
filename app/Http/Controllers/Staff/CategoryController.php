<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::/*select('id', 'root', 'name','slug')->*/where('root', 0)->get();
        return view('backend.category.manage', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.ss
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('root', 0)->get();
        return view('backend.category.create', compact('categories'));
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
            'root'      =>     'required',
            'name'      =>     'required|min:2|max:50|unique:categories',
            'status'    =>     'required'
        ]);

        try {
            Category::create([
                'root'          => $request->root,
                'name'          => $request->name,
                'slug'          => slugify($request->name),
                'status'        =>  $request->status,
                'created_by'    => Auth::id(),

            ]);

            setMessage('success', 'Yeh! A Category Has Been Successfully Updated');
        } catch (Exception $exception) {
            setMessage('danger', 'Something Wrong');
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
        $cat = Category::find($id);
        $categories = Category::where('root', 0)->get();

        return view('backend.category.edit', compact('cat', 'categories'));
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
        $category = Category::find($id);

        $request->validate([
            'root'      =>     'required',
            'name'      =>     'required|min:2|max:50|unique:categories,id,'.$id,
            'status'    =>     'required'
        ]);



        try {
            $category->root    = $request->root;
            $category->name    = $request->name;
            $category->slug    = slugify($request->name);
            $category->status  = $request->status;
            $category->created_by  = Auth::id();
            $category->update();

            setMessage('success', 'Yeh! A Category Has Been Successfully Updated');
        } catch (Exception $exception) {

            setMessage('danger', 'Something Wrong');
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
        $cat = Category::where('root', $id)->get();

        if (!count($cat)) {
            $category =  Category::find($id);
            $category->delete();
            setMessage('success', 'Yeh! A Category Has Been Successfully Deleted');
        } else {

            setMessage('danger', 'First You Have To Delete Sub-Category');
        }
        return redirect()->back();
    }
}
