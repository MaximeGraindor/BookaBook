<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'book_orders')->withPivot('quantity')->withTimestamps();
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'author_books');
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
}
