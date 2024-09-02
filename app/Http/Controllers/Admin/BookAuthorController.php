<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBookAuthorRequest;
use App\Http\Requests\UpdateBookAuthorRequest;
use App\Models\BookAuthor;
use Illuminate\Http\Request;

class BookAuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.authors.index", [
            "authors" => BookAuthor::paginate(75),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.authors.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBookAuthorRequest $request)
    {
        BookAuthor::create($request->validated());
        return to_route('admin.authors.index')->with('success', "L'auteur a bien été ajouté.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookAuthor $author)
    {
        return view("admin.authors.edit", [
            "author" => $author
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookAuthorRequest $request, BookAuthor $author)
    {
        $author->update($request->validated());
        return to_route("admin.authors.index")->with('success', "L'auteur a bien été supprimé.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookAuthor $author)
    {
        $author->delete();
        return back()->with('success', "L'auteur a bien été supprimé.");
    }
}
