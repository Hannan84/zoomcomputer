<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderCancelNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $model = '';
    public $pName = '';
    public $price = '';
    public $quantity = '';

    public function __construct($model,$pName,$price,$quantity)
    {
        $this->model = $model;
        $this->pName = $pName;
        $this->price = $price;
        $this->quantity = $quantity;
    }
    public function via($notifiable)
    {
        return ['mail'];
    }
    public function toMail($notifiable)
    {
        $model = $this->model;
        $pName = $this->pName;
        $price = $this->price;
        $quantity = $this->quantity;
        return (new MailMessage)->view('admin.layouts.notification.order_cancel',compact('model','pName','price','quantity'));
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
