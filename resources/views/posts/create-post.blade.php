@extends('layouts.admin-master')
@section('content')
<x-content-header title="Create new Post"/>
<section class="content">
    <div class="card card-primary">
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('admin.store.post')}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="title">Post title</label>
              <input type="text" class="form-control" id="title" placeholder="Post title" name="title">
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" name="description" id=""></textarea>
            </div>
            <div class="form-group">
              <input type="file" name="image">
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
</section>
@endsection