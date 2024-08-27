<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name("home");

// Authentification
Route::name("auth.")->group(function () {
    Route::get('/login', [AuthController::class, "login"])->middleware(["guest"])->name("login");
    Route::post('/login', [AuthController::class, "doLogin"])->middleware(["guest"]);
    Route::delete('/logout', [AuthController::class, "logout"])->middleware(["auth"])->name("logout");
});

// Pour l'utilisateur
Route::name("user.")->group(function () {
    Route::get("/register", [UserController::class, 'register'])->middleware(["guest"])->name("register");
    Route::post("/register", [UserController::class, 'doRegister'])->middleware(["guest"]);
    // Gestion du compte
    Route::prefix("manage")->name("manage.")->group(function () {
        Route::get('/', [UserController::class, "manage"])->name("index");
    });
});


// Espace d'administration
Route::prefix("admin")->name("admin.")->group(function () {
    Route::get("/", function () {
        return view("admin.home");
    })->name('home');
    // Les catégories des livres
    Route::resource("categories", CategoriesController::class);
});
