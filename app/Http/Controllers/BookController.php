<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Image;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('pages.book.index-book', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = New Book();
        $authors = Author::all();
        $publishers = Publisher::all();
        return view('pages.book.createOrUpdate-book', compact('book', 'authors', 'publishers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cover' => 'required',
            'title' => 'required|string',
            'isbn' => 'required|unique:books|string|min:10',
            'required' => 'required',
            'publicPrice' => ['required','regex:/^(?:[1-9]\d+|\d)(?:\.\d\d)?$/'],
            'studentPrice' => ['required', 'regex:/^(?:[1-9]\d+|\d)(?:\.\d\d)?$/'],
            'publisher' => 'required',
            'authors' => 'required|array|min:1',
            'authors.*' => 'numeric',
            'publishingDetails' => ''
        ]);

        $img = $request->file('cover');
        $nameImg = $img->hashName();

        $img = Image::make($img)->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save('storage/books'. '\\' . $nameImg);

        $book = Book::create([
            'cover_path' => $nameImg,
            'name' => $request->title,
            'slug' => Str::slug($request->title),
            'ISBN' => $request->isbn,
            'public_price' => floatval($request->publicPrice),
            'student_price' => floatval($request->studentPrice),
            'editings_details' => $request->publishingDetails,
            'required' => $request->required === 'oui' ? 1 : 0,
            'publisher_id' => $request->publisher,
        ]);

        foreach ($request->authors as $author) {
            $authorId = (Author::where('name', $author)->first())->id;
            $book->authors()->attach($authorId);
        }

        return redirect('books');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $book->load('authors', 'publisher');
        $randomBooks = Book::all()->shuffle()->take(rand(5, 5));
        return view('pages.book.show-book', compact('book', 'randomBooks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        $publishers = Publisher::all();

        return view('pages.book.createOrUpdate-book', compact('book', 'authors', 'publishers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //return $request;

        if($request->title){
            $book->update([
                'name' => $request->title,
            ]);
            $book->update([
                'slug' => Str::slug($request->title),
            ]);
        }
        if($request->isbn){
            $book->update([
                'isbn' => $request->isbn
            ]);
        }
        if($request->required){
            $book->update([
                'required' => $request->required === 'oui' ? 1 : 0
            ]);
        }
        if($request->publicPrice){
            $book->update([
                'public_price' => $request->publicPrice,
            ]);
        }
        if($request->studentPrice){
            $book->update([
                'student_price' => $request->studentPrice
            ]);
        }
        if($request->publisher){
            $book->update([
                'publisher_id' => $request->publisher
            ]);
        }
        if($request->authors){
            foreach ($request->authors as $author) {
                $book->authors()->sync((Author::where('name', $author)->first()->id));
            }
        }
        if($request->publishingDetails){
            $book->update([
                'editing_details' => $request->publishingDetails
            ]);
        }

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
