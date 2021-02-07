@extends('backend.components.layout')

@section('title')
    Add New Product
@endsection

@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
        <div class="breadcrumb-title pr-3">Dashboard</div>
        <div class="pl-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
                </ol>
            </nav>
        </div>
        <div class="ml-auto">
            <div class="btn-group">
                <a href="{{ route('staff.product.index') }}" class="btn btn-primary m-1"><i
                        class="bx bx-plus-circle mr-1"></i>Manage Products</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card border-lg-top-primary">
                <div class="card-body p-3">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user mr-1 font-24 text-primary"></i>
                        </div>
                        <h4 class="mb-0 text-primary">Add New Product</h4>
                    </div>
                    <hr>
                    <div class="form-body">
                        <form class="create-product" action="{{ route('staff.product.store') }}" method="post"
                            enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Product Name</label>
                                    <div class="input-group">
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Please Enter Product Name">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="slug">Product Slug</label>
                                    <div class="input-group">
                                        <input type="text" name="slug" id="slug" class="form-control"
                                            placeholder="Please Enter Product Slug">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="category">Category</label>
                                    <div class="input-group">
                                        <select class="form-control" name="category" id="category">
                                            <option value="">Select Category</option>
                                            {!! category_select_data($categories, 3) !!}
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="brand">Brand</label>
                                    <div class="input-group">
                                        <select class="form-control" name="brand" id="brand">
                                            <option value="">Select Brand</option>
                                            <option value="0">No Brand</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="model">Model</label>
                                    <div class="input-group">
                                        <input type="text" name="model" id="model" class="form-control"
                                            placeholder="Please Enter Product model">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="buying_price">Buying Price</label>
                                    <div class="input-group">
                                        <input type="text" name="buying_price" id="buying_price" class="form-control"
                                            placeholder="Please Enter Buying Price">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="selling_price">Selling Price</label>
                                    <div class="input-group">
                                        <input type="text" name="selling_price" id="selling_price" class="form-control"
                                            placeholder="Please Enter Selling Price">
                                    </div>
                                </div>
                                <div class="form-group col-md-4 pl-5">
                                    <label for="special_price">Special Price</label>
                                    <div class="input-group mt-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="specialPrice"
                                                id="specialPrice">
                                            <label class="custom-control-label" for="specialPrice">Yes</label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-row" id="specialPriceBox" style="display: none">
                                <div class="form-group col-md-4">
                                    <label for="special_price">Special Price</label>
                                    <div class="input-group">
                                        <input type="text" name="special_price" id="special_price" class="form-control"
                                            placeholder="Please Enter Special Price">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="special_rice_from">Special Price From</label>
                                    <div class="input-group">
                                        <input type="date" name="special_rice_from" id="special_rice_from"
                                            class="form-control datePicker" placeholder="Special Price From">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="special_rice_to">Special Price To</label>
                                    <div class="input-group">
                                        <input type="date" name="special_rice_from" id="special_rice_from"
                                            class="form-control datePicker" placeholder="Special Price From">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="quantity">Quantity</label>
                                    <div class="input-group">
                                        <input type="text" name="quantity" id="quantity" class="form-control"
                                            placeholder="Please Enter Product Quantity">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="sku_code">SKU Code</label>
                                    <div class="input-group">
                                        <input type="text" name="sku_code" id="sku_code" class="form-control"
                                            placeholder="Please Enter SKU Code">
                                    </div>
                                </div>

                                <div class="form-group col-md-4 pl-5">
                                    <label for="special_price">Warranty</label>
                                    <div class="input-group mt-2">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="warranty" id="wYes"
                                                value="1">
                                            <label class="custom-control-label" for="wYes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio ml-3">
                                            <input type="radio" class="custom-control-input" name="warranty" id="wNo"
                                                value="0">
                                            <label class="custom-control-label" for="wNo">No</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-row" id="warrantyBox" style="display: none">
                                <div class="form-group col-md-12">
                                    <label>Warranty Duration</label>
                                    <div class="input-group ">
                                        <input type="text" class="form-control " placeholder="">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="warranty_condition">Warranty Conditions</label>
                                    <div class="input-group">
                                        <textarea name="warranty_condition" id="warranty_condition"
                                            class="editor"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Color</label>
                                    <div class="input-group">
                                        @foreach (color() as $key => $value)
                                            <div class="custom-control custom-checkbox pr-3">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="color{{ $value }}" name="color[]"
                                                    value="{{ $key }}">
                                                <label class="custom-control-label"
                                                    for="color{{ $value }}">{{ $value }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="size">Size</label>
                                    <div class="input-group">
                                        @foreach (size() as $key => $value)
                                            <div class="custom-control custom-checkbox pr-3">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="size{{ $value }}" name="size[]"
                                                    value="{{ $key }}">
                                                <label class="custom-control-label"
                                                    for="size{{ $value }}">{{ $value }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="thumbnail">Thumbnail</label>
                                    <div class="input-group ">
                                        <input type="file" name="thumbnail" id="thumbnail" >
                                        <div class="thumbnail ml-2"></div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="images">Product Gallery</label>
                                    <div class="input-group ">
                                        <input type="file" name="images[]" id="images"  multiple>
                                        <div class="product_gallery ml-2"></div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group ">
                                    <label for="description">Description</label>
                                    <div class="input-group ">
                                        <textarea name="description" id="description" class="editor"></textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row mt-2">
                                <label for="b_name" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10 text-center">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="active" name="status" value="active"
                                            class="custom-control-input">
                                        <label class="custom-control-label" for="active">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="inactive" name="status" value="inactive"
                                            class="custom-control-input">
                                        <label class="custom-control-label" for="inactive">Inactive</label>
                                    </div>
                                    @error('status') <div><span class="font-italic text-danger"> {{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary px-5">Add Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<style>
    #thumbnail, #images{
        cursor: pointer;
        width: 130px;
        height: 35px;
        overflow: hidden;
        outline: none;
    }
    #thumbnail:before, #images:before{
        width: 130px;
        height: 35px;
        font-size: 16px;
        line-height: 32px;
        content: 'Select Your File';
        display: inline-block;
        background: #dcdfe0;
        text-align: center;
        padding: 0 10px;
        color: #5a7684;
        border: 1px solid #bdc3c5;
        border-radius: 5px;
    }
    #thumbnail::-webkit-file-upload-button, #images::-webkit-file-upload-button{
        visibility: hidden;
    }
</style>
    <!--
                                                                        <div class="row">
                                                                            <div class="col-12 col-lg-12 mx-auto">



                                                                                <div class="card radius-15">
                                                                                    <div class="card-body">
                                                                                        <div class="card-title">
                                                                                            <h4 class="mb-0">Add New Product</h4>
                                                                                        </div>
                                                                                        <hr />

                                                                                        <div class="alert alert-danger show-error-msg" style="display: none">
                                                                                            <ul></ul>
                                                                                        </div>
                                                                                        <div class="alert alert-success show-success-msg" style="display: none"> </div>

                                                                                        <div class="form-body">
                                                                                            <form class="create-product" action="{{ route('staff.product.store') }}" method="post">

                                                                                                <div class="form-group row">
                                                                                                    <label for="name" class="col-sm-3 col-form-label">Product Name</label>
                                                                                                    <div class="col-sm-9">
                                                                                                        <input type="text" id="name" name="name" class="form-control"
                                                                                                            placeholder="Enter Product Name" value="{{ old('name') }}">
                                                                                                        @error('name') <span class="font-italic text-danger"> {{ $message }}</span>
                                                                                                        @enderror
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="form-group row">
                                                                                                    <label for="root" class="col-sm-3 col-form-label">Category</label>
                                                                                                    <div class="col-sm-9">
                                                                                                        <select class="form-control" name="category" id="category">
                                                                                                            <option value="">Select Category</option>
                                                                                                            {!!  category_select_data($categories, 3) !!}
                                                                                                        </select>

                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="form-group row">
                                                                                                    <label for="root" class="col-sm-3 col-form-label">Brand</label>
                                                                                                    <div class="col-sm-9">
                                                                                                        <select class="form-control" name="brand" id="brand">
                                                                                                            <option value="">Select Brand</option>
                                                                                                            <option value="0">No Brand</option>
                                                                                                            @foreach ($brands as $brand)
                                                                                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                                                                            @endforeach
                                                                                                        </select>

                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="form-group row">
                                                                                                    <label for="name" class="col-sm-3 col-form-label">Model</label>
                                                                                                    <div class="col-sm-9">
                                                                                                        <input type="text" id="model" name="model" class="form-control"
                                                                                                            placeholder="Enter Model Name" value="">
                                                                                                    </div>
                                                                                                </div>



                                                                                                <div class="form-group row mt-2">
                                                                                                    <label for="b_name" class="col-sm-2 col-form-label"></label>
                                                                                                    <div class="col-sm-10 text-center">
                                                                                                        <div class="custom-control custom-radio custom-control-inline">
                                                                                                            <input type="radio" id="active" name="status" value="active"
                                                                                                                class="custom-control-input">
                                                                                                            <label class="custom-control-label" for="active">Active</label>
                                                                                                        </div>
                                                                                                        <div class="custom-control custom-radio custom-control-inline">
                                                                                                            <input type="radio" id="inactive" name="status" value="inactive"
                                                                                                                class="custom-control-input">
                                                                                                            <label class="custom-control-label" for="inactive">Inactive</label>
                                                                                                        </div>
                                                                                                        @error('status') <div><span class="font-italic text-danger"> {{ $message }}</span>
                                                                                                                                                                                </div>
                                                                                                        @enderror

                                                                                                    </div>

                                                                                                </div>



                                                                                                <div class="form-group row">
                                                                                                    <label class="col-sm-2 col-form-label"></label>
                                                                                                    <div class="col-sm-10 text-right">
                                                                                                        <button type="submit" class="btn btn-primary px-4">Add Category</button>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </form>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    -->

@endsection
