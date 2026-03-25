<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();
        return view('students.index', compact('students')); 
    }

    public function create(){
        return view('students.create');
    }

    public function store(Request $request){
        //Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email'
        ]);

        //Save to database
        Student::create([
    'name' => $request->name,
    'email' => $request->email
]);
        return redirect('/students')->with('success', 'Student created successfully!');
    }

    public function delete($id){
        Student::find($id)->delete();
        return back();
    }

    public function edit($id){
        $student=Student::findOrFail($id);
        return view('students.edit',compact('student'));

    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,'.$id,
        ]);

        $student=Student::findOrFail($id);
        $student->update([
            'name' => $request->name,
            'email' => $request->email

        ]);

        return redirect('/students')->with('success', 'Student Updated successfully!');
    }
}
