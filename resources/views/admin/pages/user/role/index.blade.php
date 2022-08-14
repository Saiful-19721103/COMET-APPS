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
					<table class="table mb-0">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Slug</th>
								<th>Permissions</th>
                                <th>created at</th>
                                <th>Action</th>
							</tr>
						</thead>
						<tbody>
                            @forelse ($roles as $per)
							<tr>
								<td>{{$loop-> index + 1 }}</td>
								<td>{{ $per->name }}</td>
                                <td>{{ $per->slug }}</td>
								<!--<td>{{ $per->permissions }}</td>-- Json String-->
								<!--json List define-->
								<td>
									<ul style="list-style:none">
										@forelse(json_decode($per->permissions) as $item)
										<li><i class="fa fa-angle-right" ></i>{{$item}}</li>
										@empty
										<li>No Permission found</li>
										@endforelse
									</ul>
								</td>
                                <td>{{ $per->created_at->diffForHumans() }}</td>
								<td>
                                    <!-- <a class="btn btn-sm btn-info" href="#"><i class="fa fa-eye"></i></a> -->
                                    <a class="btn btn-sm btn-warning" href="{{ route('permission.edit', $per->id) }}"><i class="fa fa-edit"></i></a>
                            		<!--<a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i></a>-- 
                                    Delete button for Resource Controller should be in form tag-->
                                    <form action="{{route('role.destroy', $per->id)}}" class="d-inline" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash" ></i></button>
                                    </form>
                                </td>
							</tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-danger">No Records Found</td>
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
            @if ($form_type == 'create' )
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Add New Roles</h4>
            </div>
			<div class="card-body">

                <!--Add New Permission Message-->
                @include('validate')
                <!--Add New Permission Message-->

                <!--Form-->
				<form action="{{route('role.store')}}" method="POST">
                @csrf
					<div class="form-group">
						<label>Name</label>
						<input name="name" type="text" class="form-control">
					</div>
					<!--Roles Define-->
					<div class="form-group">
						<ul style="list-style:none; margin-left:0px;">
							@forelse($permissions as $item)
							<li>
								<label><input name="permission[]" value="{{$item->name}}" type="checkbox">{{ $item->name }}</label>
							</li>
							@empty
							<li>
								<label>No Records Found</label>
							</li>
							@endforelse
						</ul>
					</div>
					<!--Roles Define-->

					<div class="text-right">
					    <button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
            </div>							
		</div>
        @endif
    
@endsection