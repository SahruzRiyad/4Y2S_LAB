<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use PDF;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('updated_at','desc')->paginate(15);
        // dd($books);
        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' =>'required',
            'author' =>'required',
            'isbn' =>'required',
            'price' =>['required','numeric'],
            'availability' =>['required','numeric'],
        ]);
        
        $book = Book::create(
            [
                'title' => $request->input('title'),
                'author' => $request->input('author'),
                'isbn' => $request->input('isbn'),
                'price' => $request->input('price'),
                'availability' => $request->input('availability')
                ]
            );
            return redirect()->route('books.index')->with('success','Successfully Added');     
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' =>'required',
            'author' =>'required',
            'isbn' =>'required',
            'price' =>['required','numeric'],
            'availability' =>['required','numeric'],
        ]);
        
        $book->update(
            [
                'title' => $request->input('title'),
                'author' => $request->input('author'),
                'isbn' => $request->input('isbn'),
                'price' => $request->input('price'),
                'availability' => $request->input('availability')
                ]
            );
            return redirect()->route('books.index')->with('success','Successfully Updated');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success','Successfully Deleted');
    }

    /**
     * Download the specified resource
     */
    public function download(){
        $books = Book::all();
        $pdf = PDF::loadView('books.download', compact('books'));
        return $pdf->download('Books.pdf');
    }
     
}
