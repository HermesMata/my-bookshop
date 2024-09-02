<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "slug",
        "poster",
        "summary",
        "book_author_id",
        "book_category_id",
        "user_id"
    ];

    public function author()
    {
        return $this->belongsTo(BookAuthor::class, "book_author_id");
    }

    public function category()
    {
        return $this->belongsTo(BookCategory::class, "book_category_id");
    }

    public function publisher()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function author_id()
    {
        return $this->book_author_id;
    }

    public function category_id()
    {
        return $this->book_category_id;
    }
}
