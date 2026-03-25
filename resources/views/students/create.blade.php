<form action="/students/store" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name"><br>
    <input type="email" name="email" placeholder="Email"><br>
    <button type="submit">Save</button>
</form>    