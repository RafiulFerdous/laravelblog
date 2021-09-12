@extends('layouts.admin_layouts')

@section('title','Post')
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
                        <h6 class="m-0 font-weight-bold text-primary">post Table</h6>
                        <a href="{{route('post.create')}}" class="btn btn-primary">Create post</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Tags</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if ($posts->count())
                                @foreach ($posts as $post)


                                    <tr>
                                        <td><a href="#">{{$post->id}}</a></td>
                                        <td>
                                        <div style="max-width: 70px; max-height: 70px; overflow:hidden">
                                            <img src="{{asset($post->image)}}" class="img-fluid">
                                        </div>
                                        </td>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->category->name}}</td>
                                        <td>
                                            @foreach($post->tags as $tag)
                                                <span class="badge badge-primary">{{$tag->name}}</span>
                                            @endforeach
                                        </td>
                                        <td>{{$post->user_id}}</td>
                                        <td><span class="badge badge-success">Delivered</span></td>
                                        <td><div class="btn-group mb-1">
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Info
                                                </button>
                                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    <a class="dropdown-item" href="{{route('post.edit', [$post->id])}}">Edit</a>

                                                    <a class="dropdown-item" href="#">Delete</a>
                                                    <a class="dropdown-item" href="{{route('post.show', [$post->id])}}">View</a>


                                                </div>
                                            </div>
                                        </td>

                                    <!--<td class="d-flex">
                  <a href=" class="btn btn sm primary mr-1"><i class="fas fa-edit"></i></a>

                </td>
                -->

                                    </tr>
                                @endforeach

                            @else
                                <tr>
                                    <td colspan="6">
                                        <h5 class="text-center">No post found</h5>

                                    </td>
                                </tr>

                            @endif


                            </tbody>
                        </table>
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
