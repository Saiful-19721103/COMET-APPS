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
    <h4 class="card-title">Add New Slider</h4>
   </div>
   <div class="card-body">

    <!--Add New Permission Message-->
    @include('validate')
    <!--Add New Permission Message-->

    <!--Form-->
    <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
     @csrf
     <div class="form-group">
      <label>Title</label>
      <input name="title" type="text" class="form-control">
     </div>

     <div class="form-group">
      <label>Sub Title</label>
      <input name="subtitle" type="text" class="form-control">
     </div>

     <div class="form-group">
      <label>Photo</label>
      <br>
      <br>
      <img style="max-width:100%;" id="slider-photo-preview" src="" alt="">
      <br>
      <br>
      <input style="display:none" ; name="photo" type="file" class="form-control" id="slider-photo">
      <label for="slider-photo">
       <img style="width:100px; cursor:pointer;"
        src=" https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-image-512.png" alt="">
      </label>
     </div>
     <hr>
     <div class="form-group slider-btn-opt">

      <!-- <div class="btn-opt-area">
       <span>Button #1</span>
       <input type="text" class="form-control" placeholder="Button Title">
       <input type="text" class="form-control" placeholder="Button Link">
      </div>

      <div class="btn-opt-area">
       <span>Button #2</span>
       <input type="text" class="form-control" placeholder="Button Title">
       <input type="text" class="form-control" placeholder="Button Link">
      </div> -->

      <!--Button Design by JS-->
      <a id="add-new-slider-button" class="btn btn-sm btn-info" href="">Add Slider Button</a>
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