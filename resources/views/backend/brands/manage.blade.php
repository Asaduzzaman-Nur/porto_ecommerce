@extends('backend.components.layout')

@section('title')
    Manage Brand
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
                    <li class="breadcrumb-item active" aria-current="page">Manage Brand</li>
                </ol>
            </nav>
        </div>
        <div class="ml-auto">
            <div class="btn-group">
                <a href="{{ route('staff.brand.create') }}" class="btn btn-primary m-1"><i
                        class="bx bx-plus-circle mr-1"></i>Add Brand</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            @if (session()->has('message'))
                <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                            aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
            <div class="card-title">
                <h5 class="mb-0">Manage Brand</h5>
            </div>
            <hr />
            <div class="table-responsive">
                <table id="myDataTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>SL NO.</th>
                            <th>Brand Name</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Created By</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                            <tr>
                                <td>{{ $loop->index }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>{{ $brand->slug }}</td>
                                <td>{{ ucfirst($brand->status) }}</td>
                                <td>{{ $brand->user->name }}</td>
                                <td>
                                    <a href="{{ route('staff.brand.edit', $brand->id) }}" ><button class="btn btn-sm btn-danger"><i class="bx bx-edit"></i></button></a>
                                    <button class="btn btn-sm btn-danger" onclick="document.getElementById('delete').submit()"><i class="bx bx-trash-alt"></i></button>

                                    <form id="delete" action="{{ route('staff.brand.destroy', $brand->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Brand Name</th>
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
