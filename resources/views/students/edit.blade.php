@extends('layouts.app')

@section('content')

<h2 class="mb-4">Edit Student</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/students/update/{{ $student->id }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $student->name }}">
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $student->email }}">
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="/students" class="btn btn-secondary">Back</a>
</form>
@endsection

