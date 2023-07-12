@extends('layouts.layout')

@section('content')
    <form method="post" action="{{ route('books.update',$book->id)}}">
        @csrf
        @method('PATCH')
    {{-- create a bootstrap form  containing title,author,isbn,price,availability --}}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Enter Title" value = "{{ $book->title }}">
            @error('title')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" name="author" placeholder="Enter Author"value = "{{$book->author}}">
            @error('author')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" class="form-control" name="isbn" placeholder="Enter ISBN"value = "{{$book->isbn}}">
            @error('isbn')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" name="price" placeholder="Enter Price"value = "{{$book->price}}">
            @error('price')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="availability">Availability</label>
            <input type="text" class="form-control" name="availability" placeholder="Enter Availability"value = "{{$book->availability}}">
            @error('availability')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div> 
        <div class = "mt-3">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{route('books.index')}}" class="btn btn-danger">Cancel</a>
        </div>
    </form>
 
@endsection