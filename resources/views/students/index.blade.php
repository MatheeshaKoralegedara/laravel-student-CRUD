<a href="/students/create">Add Student</a>

@foreach($students as $student)
    <p>{{$student->name}} - {{$student->email}}
    <a href="/students/delete/{{ $student->id }}">Delete</a></p>
@endforeach    


    