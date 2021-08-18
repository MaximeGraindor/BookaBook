<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
    ];

    public function status()
    {
        return $this->belongsToMany(Status::class, 'order_statuses')->withTimestamps();
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_orders')->withPivot('quantity')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // ATTRIBUTES
    /**
     * Get the last statut of the order.
     *
     * @return string
     */
    public function getLastStatusAttribute()
    {
        return $this->status()->orderBy('order_statuses.created_at', 'desc')->first()->name;
    }

    /**
     * check if status order is paid
     *
     * @return string
     */
    public function getisOrderedAttribute()
    {
        return array_values(($this->status->filter(function($q){
            return $q->name === 'Commandé';
        }))->toArray());
    }

    /**
     * check if status order is paid
     *
     * @return string
     */
    public function getisPaidAttribute()
    {
        return array_values(($this->status->filter(function($q){
            return $q->name === 'Payé';
        }))->toArray());
    }

    /**
     * check if status order is available
     *
     * @return string
     */
    public function getisAvailableAttribute()
    {
        return array_values(($this->status->filter(function($q){
            return $q->name === 'Disponible';
        }))->toArray());
    }


    /**
     * check if status order is delivered
     *
     * @return string
     */
    public function getisDeliveredAttribute()
    {
        return array_values(($this->status->filter(function($q){
            return $q->name === 'Livré';
        }))->toArray());
    }
}
