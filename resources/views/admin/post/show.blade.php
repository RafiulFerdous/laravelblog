@extends('layouts.admin_layouts')

@section('title','View post')
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
                        <h6 class="m-0 font-weight-bold text-primary">View Post </h6>
                        <a href="/post" class="btn btn-primary">Post List</a>
                    </div>
                    <div class="card mb-4">
                        <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                           <h6 class="m-0 font-weight-bold text-primary">Form Basic</h6>
                         </div>
                         -->
                        <div class="card-body">

                            <table class="table table-bordered table-pimary">


                                <tbody>

                                <tr>
                                    <th style="width: 200px" >Image</th>
                                    <td>
                                        <div style="max-width: 300px; max-height: 300px; overflow:hidden">
                                            <img src="{{asset($post->image)}}" class="img-fluid">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <th style="width: 200px" >Title</th>
                                    <td>{{$post->title}}</td>
                                </tr>

                                <tr>
                                    <th style="width: 200px" >Category</th>
                                    <td>{{$post->category->name}}</td>
                                </tr>

                                <tr>
                                    <th style="width: 200px" >Tags</th>
                                    <td>
                                        @foreach($post->tags as $tag)
                                            <span class="badge badge-primary">{{$tag->name}}</span>
                                        @endforeach
                                    </td>
                                </tr>

                                <tr>
                                    <th style="width: 200px" >Post Description</th>
                                    <td>{!! $post->description!!}</td>
                                </tr>





                                </tbody>
                            </table>






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
