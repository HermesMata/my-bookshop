<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.categories.index", [
            "categories" => BookCategory::orderBy('created_at', 'desc')->get(['id', 'name', 'slug'])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategoryRequest $request)
    {
        BookCategory::create($request->validated());
        return to_route("admin.categories.index")->with('success', "La catégorie a bien été ajoutée");
    }

    /**
     * Display the specified resource.
     */
    public function show(BookCategory $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookCategory $category)
    {
        return view("admin.categories.edit", [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, BookCategory $category)
    {
        $category->update($request->validated());
        return to_route('admin.categories.index')->with('success', "La catégorie a bien été modifiée.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookCategory $category)
    {
        $category->delete();
        return back()->with('success', "La catégorie a bien été supprimée.");
    }
}
