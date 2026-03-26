@extends('layouts.app')

@section('content')
<h2 class="mb-4">Student List</h2>

<a href="/students/create" class="btn btn-primary mb-3">Add Student</a>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>
                <a href="/students/edit/{{ $student->id }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="/students/delete/{{ $student->id}}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this student?');">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $students->links('pagination::bootstrap-5')}}
@endsection


    