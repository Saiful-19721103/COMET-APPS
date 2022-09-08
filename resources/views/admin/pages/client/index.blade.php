@extends('admin.layouts.app')

@section('main_section')
<!-- Basic Table -->
<div class="row">
 <div class="col-lg-8">
  <div class="card">
   <div class="card-header d-flex justify-content-between">
    <h4 class="card-title">All Clients</h4>
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
        <th>name</th>
        <th>logo</th>
        <th>Created At</th>
        <th>Status</th>
        <th>Action</th>
       </tr>
      </thead>
      <tbody>
       @forelse($clients as $item )
       <tr>
        <td>{{ $loop->index+1 }}</td>
        <td>{{ $item->name }}</td>
        <!-- <td>{{ $item->logo }}</td> -->
        <td>
         <img style="width:60px; height:60px; object-fit:cover" src="{{ url ('storage/clients/' . $item->logo )}}"
          alt="">
        </td>
        <td>{{ $item->created_at->diffForHumans() }}</td>
        <!--statu Badge-->
        <td>
         @if($item->status)
         <span class="badge badge-success">Published</span>
         <a class="text-danger" href="{{ route('admin.status.update', $item->id) }}"><i class="fa fa-times"></i></a>
         @else
         <span class="badge badge-danger">Un Published</span>
         <a class="text-danger" href="{{ route('admin.status.update', $item->id) }}"><i class="fa fa-check"></i></a>
         @endif
        </td>
        <!--Action Button-->
        <td>
         <a class="btn btn-sm btn-warning" href="{{ route('slider.edit', $item->id)}}">
          <i class="fa fa-edit"></i></a>
         <a href="{{ route('admin.trash.update', $item->id)}}" Class="btn btn-sm btn-danger">
          <i class="fa fa-trash"></i></a>
        </td>
       </tr>
       @empty
       @endforelse
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
  @if ($form_type =='create')
  <div class="card">
   <div class="card-header">
    <h4 class="card-title">Add New Client</h4>
   </div>
   <div class="card-body">

    <!--Add New Permission Message-->
    @include('validate')
    <!--Add New Permission Message-->

    <!--Form-->
    <form action="{{route('client.store')}}" method="POST" enctype="multipart/form-data">
     @csrf
     <div class=" form-group">
      <label>Client Name</label>
      <input name="name" value="{{old('name')}}" type="text" class=" form-control">
     </div>

     <div class="form-group">
      <label>Logo</label>
      <br>
      <br>
      <img style="max-width:100%;" id="slider-photo-preview" src="" alt="">
      <br>
      <br>
      <input style=" display:none;" name="logo" type="file" class="form-control" id="slider-photo">
      <label for="slider-photo">
       <img style="width:100px; cursor:pointer;"
        src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-image-512.png" alt="">
      </label>
     </div>

     <div class="text-right">
      <button type="submit" class="btn btn-primary">Submit</button>
     </div>
    </form>

   </div>
  </div>
  @endif

  <!--Form Type edit-->


 </div>
</div>
@endsection