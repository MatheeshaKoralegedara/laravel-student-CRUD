<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <--- for current user

class StudentController extends Controller
{
    public function index(Request $request){
        $search = $request->search;

        $students = Student::when($search, function($query, $search){
            return $query->where('name', 'like', "%$search%")
                         ->orWhere('email', 'like', "%$search%");
        })->paginate(5);

        return view('students.index', compact('students'));
    }

    public function create(){
        return view('students.create');
    }

    public function store(Request $request){
        //Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,'
        ]);

        //Save to database
        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'user_id' => Auth::id() ?? 1 // <-- assign current user or 1 temporarily
        ]);

        return redirect('/students')->with('success', 'Student created successfully!');
    }

    public function delete($id){
        Student::find($id)->delete();
        return back()->with('success', 'Student deleted successfully!');
    }

    public function edit($id){
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,'.$id,
        ]);

        $student = Student::findOrFail($id);
        $student->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect('/students')->with('success', 'Student updated successfully!');
    }
}