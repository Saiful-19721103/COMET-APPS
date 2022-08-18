@extends('admin.layouts.app')

@section('main_section')
<!-- Basic Table -->
<div class="row">

    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Admin User</h4>
            </div>
            <div class="card-body">

                <!--All Permission Message-->
                @include('validate-main')
                <!--All Permission Message-->

                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Photo</th>
                                <th>Created At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($all_admin as $item)
                            @if($item->name !== 'Provider')
                            <tr>
                                <td>{{$loop-> index + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->role_id }}</td>

                                <td>
                                    @if($item->photo == 'avatar.png')
                                    <img style="width:60px; height:60px; object-fit:cover; border-radius:50%;"
                                        src="{{url('storage/admins/avatar.png')}}" alt="">
                                    @endif
                                </td>
                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                <td>
                                    @if($item->status)
                                    <span class="badge badge-success">Active User</span>
                                    <a class="btn btn-sm btn-danger" href="{{ route('permission.edit', $item->id) }}"><i
                                            class="fa fa-times"></i></a>
                                    @else
                                    <span class="badge badge-success">Blocked User</span>
                                    <a class="btn btn-sm btn-success" href="{{ route('permission.edit', $item->id) }}">
                                        <i class="fa fa-checked"></i></a>
                                    @endif
                                <td>
                                    <!-- <a class="btn btn-sm btn-info" href="#"><i class="fa fa-eye"></i></a> -->


                                    <a class="btn btn-sm btn-warning"
                                        href="{{ route('permission.edit', $item->id) }}"><i class="fa fa-edit"></i></a>
                                    <!--<a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i></a>-- 
                                                        Delete button for Resource Controller should be in form tag-->
                                    <form action="{{route('permission.destroy', $item->id)}}"
                                        class="d-inline delete-form" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-danger">No Records Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Basic Table -->

    <!--Create Vertical Form -->
    <div class="col-md-4">

        <!--Form Type Create-->
        @if ($form_type =='create')
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add New User</h4>
            </div>
            <div class="card-body">

                <!--Add New Permission Message-->
                @include('validate')
                <!--Add New Permission Message-->

                <!--Form-->
                <form action="{{route('admin-user.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Cell</label>
                        <input name="cell" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" id="" class="form-control">
                            <option value="">--Select--</option>
                            @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        @endif
        <!--Form Type Create -->

        <!--Form Type Update -->
        @if ($form_type =='edit')
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Edit Permission</h4>
                <a href="{{route('permission.index')}}">Back</a>
            </div>
            <div class="card-body">

                <!--Add New Permission Message-->
                @include('validate')
                <!--Add New Permission Message-->

                <!--Form-->
                <form action="{{route('permission.update', $edit-> id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" type="text" class="form-control">
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        @endif
        <!--Form Type Update -->

    </div>
</div>
<!--Vertical Form -->

@endsection