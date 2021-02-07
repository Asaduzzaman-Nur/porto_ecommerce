@extends('backend.components.layout')

@section('title')
    Add New Category
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
                    <li class="breadcrumb-item active" aria-current="page">Add New Category</li>
                </ol>
            </nav>
        </div>
        <div class="ml-auto">
            <div class="btn-group">
                <a href="{{ route('staff.category.index') }}" class="btn btn-primary m-1"><i
                        class="bx bx-plus-circle mr-1"></i>Manage Category</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="row">
        <div class="col-12 col-lg-9 mx-auto">

            @if (session()->has('type') && session()->has('message'))
                <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                            aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            <div class="card radius-15">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="mb-0">Add New Category</h4>
                    </div>
                    <hr />
                    <div class="form-body">
                        <form action="{{ route('staff.category.store') }}" method="post">
                            @csrf
                            <div class="form-group row">

                                <label for="root" class="col-sm-3 col-form-label"> Root Category</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="root" id="root">

                                        <option value="0">--Root--</option>

                                        {!! category_select_data($categories) !!}


                                    </select>
                                    @error('name') <span class="font-italic text-danger"> {{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Category Name</label>
                                <div class="col-sm-9">
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Enter Category Name" value="{{ old('name') }}">
                                    @error('name') <span class="font-italic text-danger"> {{ $message }}</span> @enderror
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
                                    @error('status') <div><span class="font-italic text-danger"> {{ $message }}</span></div>
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


@endsection
