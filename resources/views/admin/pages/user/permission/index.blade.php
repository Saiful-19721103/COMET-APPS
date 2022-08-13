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
												<tr>
													<td>1</td>
													<td>Slider</td>
                                                    <td>Slider</td>
                                                    <td>10 min ago</td>
													<td>
                                                        <!-- <a class="btn btn-sm btn-info" href="#"><i class="fa fa-eye"></i></a> -->
                                                        <a class="btn btn-sm btn-warning" href="#"><i class="fa fa-edit"></i></a>
                                                        <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i></a>
                                                    </td>
												</tr>
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
									<form action="#">
										<div class="form-group">
											<label>Name</label>
											<input type="text" class="form-control">
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