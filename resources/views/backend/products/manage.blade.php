@extends('backend.components.layout')

@section('title')
    Manage Products
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
                    <li class="breadcrumb-item active" aria-current="page">Manage Products</li>
                </ol>
            </nav>
        </div>
        <div class="ml-auto">
            <div class="btn-group">
                <a href="{{ route('staff.product.create') }}" class="btn btn-primary m-1"><i
                        class="bx bx-plus-circle mr-1"></i>Add Product</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            <x-show-message></x-show-message>
                <div class="card-title">
                    <h5 class="mb-0">Manage Products</h5>
                </div>
                <hr />
                <div class="table-responsive">
                    <table id="myDataTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Created By</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Category Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Created By</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
        </div>
    </div>

@endsection
