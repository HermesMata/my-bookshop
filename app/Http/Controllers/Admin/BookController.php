<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\BookAuthor;
use App\Models\BookCategory;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.books.index", [
            "books" => Book::with(['author', 'category'])->paginate(50),
        ]);
    }

    /**
     * Show the form for adding a new book.
     */
    public function create()
    {
        return view("admin.books.create", [
            "authors" => BookAuthor::get(['id', 'name'])->pluck('name', 'id'),
            "categories" => BookCategory::get(['id', 'name'])->pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBookRequest $request)
    {
        $data = $request->validated();
        $book = new Book();
        // Ajout du livre
        $book->title = $data['title'];
        $book->slug = $data['slug'];
        $book->summary = $data['summary'];
        $book->poster = is_null($data['poster']) ?: $data['poster']->store("books/posters", "public");
        // Effectuer les relations
        $book->author()->associate($data['author']);
        $book->category()->associate($data['category']);
        $book->publisher()->associate($data['publisher']);
        // Sauvegarder le fichier du livre
        /** @var UploadedFile $file*/
        $file = $data['file'];
        $book->file_path = $file->store("books/files", "public");
        $book->save();
        return to_route('admin.books.index')->with('success', "Le livre a été ajouté avec succès.");
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
        return view("admin.books.edit", [
            "book" => $book,
            "authors" => BookAuthor::get(['id', 'name'])->pluck('name', 'id'),
            "categories" => BookCategory::get(['id', 'name'])->pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $data = $request->validated();
        $book->update($data);
        if (isset($data['category'])) {
            $book->category()->dissociate();
            $book->category()->associate($data['category']);
        }
        return to_route('admin.books.index')->with('success', "Les informations du livre ont bien été mises à jour.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
