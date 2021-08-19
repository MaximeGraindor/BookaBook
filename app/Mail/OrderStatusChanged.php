<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\Status;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderStatusChanged extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $status;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, Status $status)
    {
        $this->order = $order;
        $this->status = $status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('bookabook@gmail.com')->view('emails.orderStatusChanged');
    }
}
