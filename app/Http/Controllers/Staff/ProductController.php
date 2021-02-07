<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.products.manage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands     = Brand::select('id', 'name')->get();
        $categories = Category::where('root', 0)->get();
        return view('backend.products.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'      =>  'required',
            'category'      =>  'required',
            'brand'      =>  'required',
            'buying_price'      =>  'required',
            'selling_price'      =>  'required',
            'quantity'      =>  'required',
            'sku_code'      =>  'required',
            'quantity'      =>  'required',
            'status'      =>  'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' =>  $validator->errors()]);
        } else {

            try {

                $thumbnail = $request->file('thumbnail');
                //$thumbnailName=$request->slug.'.'. $thumbnail->getClientOriginalExtension();
                $thumbnailName = date('Ymdhms.') . $thumbnail->getClientOriginalExtension(); //here after Ymdhms. having a dot this dot is for extension like .png /.jpg
                Image::make($thumbnail)->save(public_path('uploads/products/' . $thumbnailName));

                //uploading multiple images
                $images = $request->file('images');

                $i = 0; //using for serial
                $fileName = []; //for uploading multiple images with array
                foreach ($images as $image) {
                    $name = date('Ymdhms') . $i++ . '.' . $image->getClientOriginalExtension();
                    Image::make($image)->save(public_path('uploads/products/' . $name));
                    array_push($fileName, $name);
                }
                Product::create([
                    'name'                  => $request->name,
                    'slug'                  => $request->slug,
                    'category_id'           => $request->category,
                    'brand_id'              => $request->brand,
                    'model'                 => $request->model,
                    'buying_price'          => $request->buying_price,
                    'selling_price'         => $request->selling_price,
                    'special_price'         => $request->special_price,
                    'special_price_from'    => $request->special_price_from,
                    'special_price_to'      => $request->special_price_to,
                    'quantity'              => $request->quantity,
                    'sku_code'              => $request->sku_code,
                    'color'                 => $request->color ? json_encode($request->color) : '[]',
                    'size'                  => $request->size ? json_encode($request->size) : '[]',
                    'thumbnail'             => $thumbnailName,
                    'images'                => json_encode($fileName),
                    'warranty'              => $request->warranty,
                    'warranty_duration'     => $request->warranty_duration,
                    'warranty_condition'    => $request->warranty_condition,
                    'description'           => $request->description,
                    'status'                => $request->status,
                    'created_by'            => auth()->id(),
                ]);
                return response()->json(['success' =>  'Yeh! A Product Has Been Successfully Created.']);
            } catch (Exception $e) {

                return response()->json(['unable' => 'Opss! Unable to create new Product ']);
            }
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
