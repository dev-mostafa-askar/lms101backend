@extends('layouts.admin-master')
@section('content')
<!-- Main content -->
<x-content-header title="List Students" />
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif

@if(session()->has('error'))
<div class="alert alert-danger">
    {{ session()->get('error') }}
</div>
@endif

<section class="content">
    <div class="card">
        <div class="m-3">
            <a href="{{route('admin.create.student')}}" class="btn btn-success">Add new studen</a>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($students as  $inx => $student)
                                <tr class="odd">
                                    <td>{{$inx+1}}</td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->email}}</td>
                                    <td>
                                        <a href="{{route('admin.edit.student',$student->id)}}" class="btn btn-info">Edit</a>
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