<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name("home");


// Espace d'administration
Route::prefix("admin")->group(function () {
    Route::get("/", function () {
        return view("admin.home");
    });
});
