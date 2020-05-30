<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class GantiStatus extends Notification
{
    use Queueable;

    public $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->subject('Yuda Laundry-Status Pesanan')
        ->greeting('Hello !'.$this->data->costumer->nama)
        ->line('Status Pesanan anda saat ini !')
        ->line('Status Pesanan      : '.$this->data->status_pesanan->status)
        ->line('Status Pembayaran   : '.$this->data->status_pembayaran->status)
        ->line('Data diperbaharui   : '.$this->data->updated_at)
        ->line('Harap sabar menunggu untuk notifikasi status berikutnya')
        ->line('Atas perhatianya, Saya Ucapkan terimakasih');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
