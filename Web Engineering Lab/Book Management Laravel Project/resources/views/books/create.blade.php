@extends('layouts.layout')

@section('content')
    <form method="post" action="{{ route('books.store')}}">
        @csrf
    {{-- create a bootstrap form  containing title,author,isbn,price,availability --}}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Enter Title" value = "{{old('title')}}">
            @error('title')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" name="author" placeholder="Enter Author"value = "{{old('author')}}">
            @error('author')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" class="form-control" name="isbn" placeholder="Enter ISBN"value = "{{old('isbn')}}">
            @error('isbn')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" name="price" placeholder="Enter Price"value = "{{old('price')}}">
            @error('price')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="availability">Availability</label>
            <input type="text" class="form-control" name="availability" placeholder="Enter Availability"value = "{{old('availability')}}">
            @error('availability')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div> 
        <div class = "mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{route('books.index')}}" class="btn btn-danger">Cancel</a>
        </div>
    </form>
 
@endsection