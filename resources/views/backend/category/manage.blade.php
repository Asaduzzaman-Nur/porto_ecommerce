@extends('backend.components.layout')

@section('title')
    Manage Categories
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
                    <li class="breadcrumb-item active" aria-current="page">Manage Categories</li>
                </ol>
            </nav>
        </div>
        <div class="ml-auto">
            <div class="btn-group">
                <a href="{{ route('staff.category.create') }}" class="btn btn-primary m-1"><i
                        class="bx bx-plus-circle mr-1"></i>Add Category</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            <x-show-message></x-show-message>
                <div class="card-title">
                    <h5 class="mb-0">Manage Categories</h5>
                </div>
                <hr />
                <div class="table-responsive">
                    <table id="myDataTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>

                                <th>Category Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Created By</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>

                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ ucfirst($category->status) }}</td>
                                    <td>{{ $category->user->name }}</td>
                                    <td>
                                        <a href="{{ route('staff.category.edit', $category->id) }}"><button
                                                class="btn btn-sm btn-danger"><i class="bx bx-edit"></i></button></a>
                                        <button class="btn btn-sm btn-danger"
                                            onclick="document.getElementById('delete').submit()"><i
                                                class="bx bx-trash-alt"></i></button>

                                        <form id="delete" action="{{ route('staff.category.destroy', $category->id) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @if (count($category->sub_category))
                                    @foreach ($category->sub_category as $sub)
                                        <tr>
                                            <td>{{ $category->name }} -> {{ $sub->name }}</td>
                                            <td>{{ $sub->slug }}</td>
                                            <td>{{ ucfirst($sub->status) }}</td>
                                            <td>{{ $sub->user->name }}</td>
                                            <td>
                                                <a href="{{ route('staff.category.edit', $sub->id) }}"><button
                                                        class="btn btn-sm btn-danger"><i
                                                            class="bx bx-edit"></i></button></a>
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="document.getElementById('delete').submit()"><i
                                                        class="bx bx-trash-alt"></i></button>

                                                <form id="delete" action="{{ route('staff.category.destroy', $sub->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>

                                        @if (count($sub->sub_category))
                                            @foreach ($sub->sub_category as $sub1)
                                                <tr>
                                                    <td>{{ $category->name }} -> {{ $sub->name }} -> {{ $sub1->name }}</td>
                                                    <td>{{ $sub1->slug }}</td>
                                                    <td>{{ ucfirst($sub1->status) }}</td>
                                                    <td>{{ $sub1->user->name }}</td>
                                                    <td>
                                                        <a href="{{ route('staff.category.edit', $sub1->id) }}"><button
                                                                class="btn btn-sm btn-danger"><i
                                                                    class="bx bx-edit"></i></button></a>
                                                        <button class="btn btn-sm btn-danger"
                                                            onclick="document.getElementById('delete').submit()"><i
                                                                class="bx bx-trash-alt"></i></button>

                                                        <form id="delete"
                                                            action="{{ route('staff.category.destroy', $sub1->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>

                                            @endforeach
                                        @endif

                                    @endforeach
                                @endif
                            @endforeach

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
