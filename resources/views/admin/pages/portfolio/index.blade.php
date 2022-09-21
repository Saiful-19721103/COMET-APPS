@extends('admin.layouts.app')

@section('main_section')
    <!-- Basic Table -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">All Portfolios</h4>
                    <a href="{{ route('admin.trash') }}" class="text-danger">Trash Users<i class="fa fa-arrow-right"></i></a>
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
                                    <th>Feature</th>
                                    <th>Category</th>
                                    <th>Client</th>
                                    <th>Date</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($portfolios as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            <img style="width:60px; height:60px; object-fit:cover;"
                                                src="{{ url('storage/sliders/' . $item->photo) }}">
                                        </td>
                                        <td>{{ $item->client }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>{{ $item->created_at->diffForHumans() }}</td>
                                        <td>
                                            @if ($item->status)
                                                <span class="badge badge-success">Published</span>
                                                <a class="text-danger"
                                                    href="{{ route('admin.status.update', $item->id) }}"><i
                                                        class="fa fa-times"></i></a>
                                            @else
                                                <span class="badge badge-danger">Un Published</span>
                                                <a class="text-danger"
                                                    href="{{ route('admin.status.update', $item->id) }}"><i
                                                        class="fa fa-check"></i></a>
                                            @endif
                                        </td>

                                        <td>
                                            <a class="btn btn-sm btn-warning" href="{{ route('slider.edit', $item->id) }}">
                                                <i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.trash.update', $item->id) }}"
                                                Class="btn btn-sm btn-danger">
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
            @if ($form_type == 'create')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Portfolio</h4>
                    </div>
                    <div class="card-body">

                        <!--Add New Permission Message-->
                        @include('validate')
                        <!--Add New Permission Message-->

                        <!--Form-->
                        <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Title</label>
                                <input name="name" value="{{ old('name') }}" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Featured Photo</label>
                                <br>
                                <img style="max-width:100%;" id="slider-photo-preview" src="" alt="">
                                <br>
                                <input style=" display:none;" name="photo" type="file" class="form-control"
                                    id="slider-photo">
                                <label for="slider-photo">
                                    <img style="width:100px; cursor:pointer;"
                                        src="https://icon-library.com/images/image-icon/image-icon-2.jpg"alt="">
                                </label>
                            </div>
                            <hr>

                            <div class="form-group">
                                <label>Gallery Photos</label>
                                <br>
                                <div class="port-gall">

                                </div>

                                <input style="display:none;" name="gallery" multiple type="file" class="form-control"
                                    id="portfolio-gallery">
                                <label for="portfolio-gallery"><img style="width:100px; cursor:pointer;"
                                        src="https://icon-library.com/images/image-icon/image-icon-2.jpg" alt="">
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="">Select Categories</label>
                                <ul class="comet-list">
                                    @foreach ($categories as $catg)
                                        <li>
                                            <label for=""><input name="cat[]" value="{{ $catg->id }}"
                                                    type="checkbox">{{ $catg->name }}</label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="form-group">
                                <label for="">Project Description</label>
                                <textarea name="pdesc" id="portfolio-desc"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Project Steps</label>
                                <!--Accordian Use Start-->
                                <div class="accordion" id="accordionExample">
                                    <div class="card portfolio-step shadow-sm">
                                        <div class="card-header" id="headingOne">
                                            <h6 class="mb-0" style="cursor:pointer" data-toggle="collapse"
                                                data-target="#collapseOne">
                                                Step01
                                            </h6>
                                        </div>

                                        <div id="collapseOne" class="collapse"data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="my-3">
                                                    <label for="">Title</label>
                                                    <input name="title[]" type="text" class="form-control">
                                                </div>
                                                <div class="my-3">
                                                    <label for="">Description</label>
                                                    <textarea name="desc[]" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card portfolio-step shadow-sm">
                                        <div class="card-header" id="headingOne">
                                            <h6 class="mb-0" style="cursor:pointer" data-toggle="collapse"
                                                data-target="#collapseTwo">
                                                Step02
                                            </h6>
                                        </div>

                                        <div id="collapseTwo" class="collapse"data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="my-3">
                                                    <label for="">Title</label>
                                                    <input name="title[]" type="text" class="form-control">
                                                </div>
                                                <div class="my-3">
                                                    <label for="">Description</label>
                                                    <textarea name="desc[]" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card portfolio-step shadow-sm">
                                        <div class="card-header" id="headingOne">
                                            <h6 class="mb-0" style="cursor:pointer" data-toggle="collapse"
                                                data-target="#collapseThree">
                                                Step03
                                            </h6>
                                        </div>

                                        <div id="collapseThree" class="collapse"data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="my-3">
                                                    <label for="">Title</label>
                                                    <input name="title[]" type="text" class="form-control">
                                                </div>
                                                <div class="my-3">
                                                    <label for="">Title</label>
                                                    <textarea name="desc[]" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Accordian Use End-->
                            </div>
                            <div class="form-group">
                                <label>Client Name</label>
                                <input name="client" value="{{ old('client') }}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Project Link</label>
                                <input name="link" value="{{ old('link') }}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Project Types</label>
                                <input name="types" value="{{ old('types') }}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Project Data</label>
                                <input name="date" value="{{ old('date') }}" type="date" class="form-control">
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
