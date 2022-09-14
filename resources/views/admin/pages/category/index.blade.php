@extends('admin.layouts.app')

@section('main_section')
    <!-- Basic Table -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">All Portfolio Categories</h4>
                    <a href="{{ route('admin.trash') }}" class="text-danger">Trash Categories<i
                            class="fa fa-arrow-right"></i></a>
                </div>
                <div class="card-body">

                    <!--All Permission Message-->
                    @include('validate-main')
                    <!--All Permission Message-->

                    <div class="table-responsive">
                        <table class="table mb-0 data-table-haq">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->slug }}</td>
                                        <td><i class="{{ $item->icon }}"></i></td>
                                        <td>{{ $item->created_at->diffforhumans() }}</td>
                                        <td>
                                            @if ($item->status)
                                                <span class="badge badge-success">Published</span>
                                                <a class="text-danger"
                                                    href="{{ route('admin.status.update', $item->id) }}"><i
                                                        class="fa fa-times"></i></a>
                                            @else
                                                <span class="badge badge-danger">UnPublished</span>
                                                <a class="text-danger"
                                                    href="{{ route('admin.status.update', $item->id) }}"><i
                                                        class="fa fa-check"></i></a>
                                            @endif
                                        </td>

                                        <td>
                                            <a class="btn btn-sm btn-warning" href="{{ route('slider.edit', $item->id) }}">
                                                <i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.trash.update', $item->id) }}"
                                                Class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic Table -->

        <!--Create Vertical Form -->
        <div class=" col-md-4">

            <!--Form Type Create-->
            @if ($form_type == 'create')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Category</h4>
                    </div>
                    <div class="card-body">

                        <!--Add New Permission Message-->
                        @include('validate')
                        <!--Add New Permission Message-->

                        <!--Form-->
                        <form action="{{ route('counter.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Title</label>
                                <input name="title" value="{{ old('title') }}" type="text" class=" form-control">
                            </div>

                            <div class="form-group">
                                <label>Count Value</label>
                                <input name="count" value="{{ old('count') }}" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Count Value</label> </br>
                                <button class="btn btn-sm btn-info show-icon">Select a icon</button>
                                <hr>
                                <input name="icon" value="{{ old('count-icon') }}" type="text" class="form-control">
                            </div>

                            <hr>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
