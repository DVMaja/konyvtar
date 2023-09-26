@foreach ($books as $book)
<form action="/api/books/{{$book->id}}" method="post">
    {{csrf_field()}}
    {{methode_field('GET')}}
    <div class="form-group">
        <input type="submit" value="{{$book->title}}">
    </div>
</form>
@endforeach