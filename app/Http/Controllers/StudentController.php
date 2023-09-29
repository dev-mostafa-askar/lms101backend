<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreStudentRequest;
use App\Http\Requests\Student\UpdateStudentRequest;
use App\Models\User;
use App\Repositories\ElqountBaseRepository;


class StudentController extends Controller
{

    public function index(){
        $students = User::all();
        return view('student.list-students',[
            'students' => $students
        ]);
    }

    public function create(){
        return view('student.create-student');
    }

    public function store(StoreStudentRequest $request){
        $data = $request->validated();
        $user =  User::create($data);

        if($user){
           return redirect(route('admin.index.students'))->with('success' , 'Created Successfully');
        }
        return redirect(route('admin.index.students'))->with('error','Created Not Successfully');
    }

    public function edit($id){
        $student = User::find($id);
        return view('student.edit-student',[
            'student' => $student
        ]);
    }

    public function update(UpdateStudentRequest $request){
        $data = $request->validated();
        $user = User::find($request->id);
        $user->update($user,$data);
        return redirect(route('admin.index.students'))->with('success',"Updated Successfully");
    }
}
