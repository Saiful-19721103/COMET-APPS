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
                                                    <td>{{ $per->created_at }}</td>
													<td>
                                                        <!-- <a class="btn btn-sm btn-info" href="#"><i class="fa fa-eye"></i></a> -->
                                                        <a class="btn btn-sm btn-warning" href="#"><i class="fa fa-edit"></i></a>
                                                        <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i></a>
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
					
	<!-- Vertical Form -->
						<div class="col-md-4">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Add New Permission</h4>
								</div>
								<div class="card-body">
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
						</div>
                    </div>
	<!-- Vertical Form -->
@endsection