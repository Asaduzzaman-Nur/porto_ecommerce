@extends('backend.components.layout')

{{-- if section is single line then we can use follwing this--}}
@section('title' ,'Update Brand')


@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
        <div class="breadcrumb-title pr-3">Dashboard</div>
        <div class="pl-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Brand</li>
                </ol>
            </nav>
        </div>
        <div class="ml-auto">
            <div class="btn-group">
                <a href="{{ route('staff.brand.index') }}" class="btn btn-primary m-1"><i
                        class="bx bx-plus-circle mr-1"></i>Manage Brand</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="row">
        <div class="col-12 col-lg-9 mx-auto">

            @if (session()->has('message'))
                <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">{{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                            aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            <div class="card radius-15">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="mb-0">Edit Brand</h4>
                    </div>
                    <hr />
                    <div class="form-body">
                        <form action="{{ route('staff.brand.update',$brand->id) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Brand Name</label>
                                <div class="col-sm-10">
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Enter Brand Name" value="{{ $brand->name}}">
                                    @error('name') <span class="font-italic text-danger"> {{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-2">
                                <label for="b_name" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10 text-center">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="active" name="status" value="active" {{ $brand->status ==='active'? 'checked':''}}
                                            class="custom-control-input" >
                                        <label class="custom-control-label" for="active">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="inactive" name="status" value="inactive" {{ $brand->status ==='inactive'? 'checked':''}}
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
                                    <button type="submit" class="btn btn-primary px-4">Update Brand</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
