@extends('admin.layouts.app')

@section('main_section')
<!-- Basic Table -->
<div class="row">
 <div class="col-lg-8">
  <div class="card">
   <div class="card-header d-flex justify-content-between">
    <h4 class="card-title">All Sliders</h4>
    <a href="{{route('admin.trash')}}" class="text-danger">Trash Users<i class="fa fa-arrow-right"></i></a>
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
        <th>Title</th>
        <th>Photo</th>
        <th>Created At</th>
        <th>Status</th>
        <th>Action</th>
       </tr>
      </thead>
      <tbody>

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
 <!--  @if ($form_type =='edit')
 <div class="card">
  <div class="card-header d-flex justify-content-between">
   <h4 class="card-title">Edit Permission</h4>
   <a href="{{route('permission.index')}}">Back</a>
  </div>
  <div class="card-body">

   Add New Permission Me
    @include('validate')
Add New Permission Message
 Form
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
@endif -->
 <!--Form Type Update -->

</div>
</div>
<!--Vertical Form -->

@endsection