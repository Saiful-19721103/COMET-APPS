@extends('admin.layouts.app')

@section ('main_section')
<!-- Basic Table -->
<div class="row">

	<div class="col-lg-8">
		<div class="card">
				<div class="card-header">
					<h4 class="card-title">All Permissions</h4>
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
                                                    <th>created at</th>
                                                    <th>Action</th>
												</tr>
											</thead>
											<tbody>
                                                @forelse ($all_permission as $per)
												<tr>
													<td>{{$loop-> index + 1 }}</td>
													<td>{{ $per->name }}</td>
                                                    <td>{{ $per->slug }}</td>
                                                    <td>{{ $per->created_at->diffForHumans() }}</td>
													<td>
                                                        <!-- <a class="btn btn-sm btn-info" href="#"><i class="fa fa-eye"></i></a> -->
                                                        <a class="btn btn-sm btn-warning" href="{{ route('permission.edit', $per->id) }}"><i class="fa fa-edit"></i></a>
                                                        <!--<a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i></a>-- 
                                                        Delete button for Resource Controller should be in form tag-->
                                                        <form action="{{route('permission.destroy', $per->id)}}" class="d-inline delete-form" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash" ></i></button>
                                                        </form>
                                                    </td>
												</tr>
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
				<h4 class="card-title">Add New Permission</h4>
            </div>
			<div class="card-body">

                <!--Add New Permission Message-->
                @include('validate')
                <!--Add New Permission Message-->

                <!--Form-->
				<form action="{{route('permission.store')}}" method="POST">
                @csrf
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
    <!--Form Type Create -->

        <!--Form Type Edit for check:
        @if ($form_type =='edit')
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Edit Permission</h4>
            </div>
			<div class="card-body">

                Add New Permission Message
                @include('validate-main')
                Add New Permission Message-->

                <!--Form>
				<form action="{{route('permission.store')}}" method="POST">
                    @csrf
					<div class="form-group">
						<label>Name</label>
						<input name="name" value="{{ $edit->name }}" type="text" class="form-control">
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
		    </div>
		</div>
        @endif
        Form Type Edit -->

        <!--Form Type Update -->
        @if ($form_type =='edit')
		<div class="card">
			<div class="card-header d-flex justify-content-between">
				<h4 class="card-title">Edit Permission</h4>
                <a href="{{route('permission.index')}}" >Back</a>
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