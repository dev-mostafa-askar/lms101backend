@extends('layouts.admin-master')
@section('content')
<x-content-header title="List All Posts" />
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif

<section class="content">
    <div class="card">
        <div class="m-3">
            <a href="{{route('admin.create.post')}}" class="btn btn-success">Add new post</a>
        </div>
        

        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
              
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                            aria-describedby="example1_info">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($posts as  $inx => $post)
                                <tr class="odd">
                                    <td>{{$inx+1}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->description}}</td>
                                    <td>
                                        <img style="width: 150px; object-fit: contain" src="{{$post->image}}" alt="post image">
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-info">Edit</a>
                                        <button class="btn btn-danger mx-2">Delete</button>
                                    </td>
                                </tr>
                                @endforeach

                               
                            </tbody>
                           
                        </table>
                    </div>
                </div>
                
            </div>
        </div>

    </div> 
</section>
@endsection