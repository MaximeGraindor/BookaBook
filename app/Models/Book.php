<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'ISBN',
        'public_price',
        'student_price',
        'editing_details',
        'cover_path',
        'required',
        'publisher_id',
    ];

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
