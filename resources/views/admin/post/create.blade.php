@extends('layouts.admin_layouts')

@section('title','Create post')
@section('admin_content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Post</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active" aria-current="page">Simple Tables</li>
      </ol>
    </div>

    <div class="row">
      <div class="col-lg-12 mb-4">
        <!-- Simple Tables -->
        <div class="card">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Create Post </h6>
            <a href="/post" class="btn btn-primary">Post List</a>
          </div>
          <div class="card mb-4">
           <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Form Basic</h6>
            </div>
            -->
            <div class="card-body">



              <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  @include('includes.errors')
                  <label for="exampleInputEmail1">Post Title</label>
                  <input type="text" name="title"class="form-control"  placeholder="Enter title">
                  <!--<small id="emailHelp" class="form-text text-muted">We'll never share your
                    email with anyone else.</small>
                    -->
                </div>



                  <div class="form-group">

                      <label for="exampleInputEmail1">Select Category</label>
                      <select name="category" id="category" class="form-control">
                          @foreach($categories as $category)
                              <option value="" style="display: none" selected>Select Category</option>
                              <option value="{{$category->id}}">
                                  {{$category->name}}
                              </option>
                          @endforeach

                      </select>

                  </div>

                  <div class="form-group">
                      <label for="exampleInputEmail1">Image</label>
                      <div class="custom-file">
                          <input type="file" name="image" class="custom-file-input" id="image">
                          <label class="custom-file-label" for="customFile">Choose image</label>
                      </div>
                  </div>


                  <div class="form-group">
                      <label>Select Tags</label>

                      <div class="d-flex flex" >
                      @foreach($tags as $tag)


                      <div class="custom-control custom-checkbox" style="margin-right: 20px">
                          <input type="checkbox" name="tags[]" type="checkbox" class="custom-control-input" id="tag{{$tag->id}}" value="{{$tag->id}}">
                          <label for="tag{{$tag->id}}" class="custom-control-label" >{{$tag->name}}</label>
                      </div>
                      @endforeach
                      </div>

                  </div>



                  <div class="form-group">
                      <label for="exampleInputEmail1">Post description</label>
                      <textarea name="description" id="description" rows="4" class="form-control" placeholder="Enter description here"></textarea>

                  </div>

               <!-- <div class="form-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                </div>
                -->
                <!--<div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                    <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                  </div>
                </div>
                -->

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>



            </div>
          </div>
          <div class="card-footer"></div>
        </div>
      </div>
    </div>
    <!--Row-->

    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">??</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to logout?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
            <a href="login.html" class="btn btn-primary">Logout</a>
          </div>
        </div>
      </div>
    </div>

  </div>


@endsection

@section('style')
    <link href="{{asset('backend/css/summernote-bs4.css')}}" rel="stylesheet">
@endsection

@section('script')
    <script src="{{asset('backend/js/summernote-bs4.js')}}"></script>

    <script>
        $('#description').summernote({
            placeholder: 'Hello Bootstrap 4',
            tabsize: 2,
            height: 100
        });
    </script>

@endsection
