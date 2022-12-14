@extends('admin.layouts.app')

@section('main_section')
    <!-- Basic Table -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Roles</h4>
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
                                    <th>Permissions</th>
                                    <th>Created at</th>
                                    <th>Users</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($roles as $per)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $per->name }}</td>
                                        <td>{{ $per->slug }}</td>
                                        <td>
                                            <ul style="list-style: none; padding:0px;">
                                                @forelse(json_decode($per->permissions) as $item)
                                                    <li> <i class="fa fa-check"></i> {{ $item }}</li>
                                                @empty
                                                @endforelse
                                                {{-- @forelse (json_decode($per->permissions) as $item)
                                                    <li> <i class="fa fa-angle-right"></i> {{ $item }}</li>
                                                @empty
                                                    <li> No permission found </li>
                                                @endforelse --}}
                                            </ul>
                                        </td>
                                        <td>{{ $per->created_at->diffForHumans() }}</td>
                                        <td>
                                            <ul>
                                                @forelse(json_decode($per->users) as $role_user)
                                                    <li> <i class="fa fa-check"></i> {{ $role_user->name }}</li>
                                                @empty
                                                @endforelse
                                            </ul>
                                        </td>
                                        <td>
                                            {{-- <a class="btn btn-sm btn-info" href="#"><i class="fa fa-eye"></i></a> --}}
                                            <a class="btn btn-sm btn-warning" href="{{ route('role.edit', $per->id) }}"><i
                                                    class="fa fa-edit"></i></a>
                                            <form action="{{ route('role.destroy', $per->id) }}"
                                                class="d-inline delete-form" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" type="submit"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-danger">No records found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic Table -->
        <div class="col-md-4">

            @if ($form_type == 'create')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add new Role</h4>
                    </div>
                    <div class="card-body">
                        @include('validate')
                        <form action="{{ route('role.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input name="name" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <ul style="list-style:none; padding-left:0px;">
                                    @forelse($permissions as $item)
                                        <li>
                                            <label><input name="permission[]" value="{{ $item->name }}" type="checkbox">
                                                {{ $item->name }}</label>
                                        </li>
                                    @empty
                                        <li>
                                            <label>No records found</label>
                                        </li>
                                    @endforelse
                                </ul>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif

            @if ($form_type == 'edit')
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Edit Role Data</h4>
                        <a href="{{ route('role.index') }}">back</a>
                    </div>
                    <div class="card-body">
                        @include('validate')
                        <form action="{{ route('role.update', $edit->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Name</label>
                                <input name="name" value="{{ $edit->name }}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <ul>
                                    @forelse (json_decode($permissions) as $item)
                                        <li>
                                            <label><input @if (in_array($item->name, json_decode($edit->permissions))) checked @endif
                                                    name="permission[]" value="{{ $item->name }}" type="checkbox">
                                                {{ $item->name }}</label>
                                        </li>
                                    @empty
                                        <li>No record found</li>
                                    @endforelse
                                </ul>
                            </div>
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
