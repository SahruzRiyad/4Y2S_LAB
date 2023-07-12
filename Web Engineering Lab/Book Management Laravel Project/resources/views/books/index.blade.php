@extends('layouts.layout')

@section('content')
    {{-- create button named add book using bootstrap5 --}}
    <a href="{{ route('books.create') }}" class="btn btn-primary">Add Book</a>
    <a href="{{ route('books.pdf') }}" class="btn btn-secondary">Download PDF</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">author</th>
                <th scope="col">isbn</th>
                <th scope="col">price</th>
                <th scope="col">Availability</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>{{ $book->price }}</td>
                    <td>{{ $book->availability }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <div class = "d-flex justify-content-center">
        {{ $books->links() }}
    </div>
@endsection