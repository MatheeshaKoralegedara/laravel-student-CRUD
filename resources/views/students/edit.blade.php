<h2>Edit Student</h2>
<form action="/students/update/{{ $student->id}}" method="POST">
    @csrf
    <input type="text" name="name" value="{{ $student->name}}" placeholder="Name"><br>
    <input type="email" name="email" value="{{ $student->email}}" placeholder="Email"><br>
    <button type="submit">Update</button>
</form>