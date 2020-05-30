<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewStatus extends Notification
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
                    ->subject('Status Pesanan berubah')
                    ->greeting('Hello !'.$this->data->costumer->nama)
                    ->line('Terimakasih telah menggunakan Jasa Laundry Kami, ')
                    ->line('Berikut Data Status Pesanan Anda !!')
                    ->line('Kode Transaksi      : '.$this->data->costumer->kode)
                    ->line('Nama                : '.$this->data->costumer->nama)
                    ->line('Nama Paket          : '.$this->data->paket->nama)
                    ->line('Jenis Laundry       : '.$this->data->jlaundry->nama)
                    ->line('Status Paket        : '.$this->data->status_paket->nama)
                    ->line('Status Pesanan      : '.$this->data->status_pesanan->status)
                    ->line('Status Pembayaran   : '.$this->data->status_pembayaran->status)
                    ->line('Berat               : '.$this->data->berat  .'kg')
                    ->line('Grand Total         : Rp. '.$this->data->total)
                    ->line('Tanggal Transaksi   : '.$this->data->costumer->created_at)
                    ->line('Data diperbaharui   : '.$this->data->updated_at)
                    ->line('Mohon tunjukan Data diatas kepada penjaga agar bisa di proses, ')
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
