@extends('layouts.admin_layouts')

@section('title','Category')
@section('admin_content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Categories</h1>
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
            <h6 class="m-0 font-weight-bold text-primary">Create Category </h6>
            <a href="category" class="btn btn-primary">Category List</a>
          </div>
          <div class="card mb-4">
           <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Form Basic</h6>
            </div>
            -->
            <div class="card-body">



              <form action="category.store" method="POST">
                @csrf
                <div class="form-group">
                  @include('includes.errors')
                  <label for="exampleInputEmail1">Category Name</label>
                  <input type="text" name="name"class="form-control" id="name"  placeholder="Enter category name">
                  <!--<small id="emailHelp" class="form-text text-muted">We'll never share your
                    email with anyone else.</small>
                    -->
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Category description</label>
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
              <span aria-hidden="true">×</span>
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
