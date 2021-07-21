<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function status()
    {
        return $this->belongsToMany(Status::class, 'order_statuses');
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_orders')->withPivot('quantity');
    }
}
