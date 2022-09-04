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
        <th>Title</th>
        <th>Photo</th>
        <th>Created At</th>
        <th>Status</th>
        <th>Action</th>
       </tr>
      </thead>
      <tbody>
       @forelse($sliders as $item)
       <tr>
        <td>{{ $loop->index + 1 }}</td>
        <td>{{ $item->title }}</td>
        <td>
         <img style="width:60px; height:60px; object-fit:cover;" src="{{url('storage/sliders/' . $item->photo) }}">
        </td>
        <td>{{$item->created_at->diffForHumans()}}</td>
        <td>
         @if($item->status)
         <span class="badge badge-success">Published</span>
         <a class="text-danger" href="{{ route('admin.status.update', $item->id) }}"><i class="fa fa-times"></i></a>
         @else
         <span class="badge badge-danger">Un Published</span>
         <a class="text-danger" href="{{ route('admin.status.update', $item->id) }}"><i class="fa fa-check"></i></a>
         @endif
        </td>

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
      <input name="title" value="{{old('title')}}" type="text" class=" form-control">
     </div>

     <div class="form-group">
      <label>Sub Title</label>
      <input name="subtitle" value="{{old('subtitle')}}" type="text" class="form-control">
     </div>

     <div class="form-group">
      <label>Photo</label>
      <br>
      <br>
      <img style="max-width:100%;" id="slider-photo-preview" src="" alt="">
      <br>
      <br>
      <input style=" display:none;" name="photo" type="file" class="form-control" id="slider-photo">
      <label for="slider-photo">
       <img style="width:100px; cursor:pointer;"
        src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-image-512.png" alt="">
      </label>
     </div>
     <hr>
     <div class="form-group slider-btn-opt">

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

  <!--Form Type edit-->
  @if ($form_type =='edit')
  <div class="card">
   <div class="card-header">
    <h4 class="card-title">Edit Slide</h4>
   </div>
   <div class="card-body">

    <!--Add New Permission Message-->
    @include('validate')
    <!--Add New Permission Message-->

    <!--Form-->
    <form action="{{route('slider.update', $slider->id)}}" method="POST" enctype="multipart/form-data">
     @csrf
     @method('PUT')
     <div class="form-group">
      <label>Title</label>
      <input name="title" type="text" value="{{$slider->title}}" class=" form-control">
     </div>

     <div class="form-group">
      <label>Sub Title</label>
      <input name="subtitle" type="text" value="{{$slider->subtitle}}" class="form-control">
     </div>

     <div class="form-group">
      <label>Photo</label>
      <br>
      <br>
      <img style="max-width:100%;" id="slider-photo-preview" src="{{ url ('storage/sliders/' . $slider->photo) }}"
       alt="">
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

      <!--Button Show for Edit-->
      @foreach(json_decode($slider->btns) as $btn)
      <div class="btn-opt-area">
       <span>Button #</span>
       <span class="badge badge-danger remove-btn" style="margin-left:235px; cursor:pointer;">Remove</span>
       <input type="text" class="form-control" name="btn_title[]" value="{{$btn-> btn_title}}"
        placeholder="Button Title">
       <input type="text" class="form-control" name="btn_link[]" value="{{$btn-> btn_link}}" placeholder="Button Link">

       <select class="form-control" name="btn_type[]">
        <option @if($btn->btn_type==='btn-light-out') selected @endif value="btn-light-out"> Default </option>
        <option @if($btn->btn_type==='btn-color btn-full') selected @endif value="btn-color btn-full"> Red
        </option>
       </select>

       <hr />
      </div>

      @endforeach
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

 </div>
</div>
@endsection