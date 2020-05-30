<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewCostumer extends Notification
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
            ->subject('YudaLaundry')
            ->greeting('Hello !'.$this->data->nama)
            ->line('Terimakasih telah menggunakan Jasa Laundry Kami, ')
            ->line('Berikut Data Status Pesanan Anda !!')
            ->line('Kode Pesanan        : '.$this->data->kode)
            ->line('ID Member           : '.$this->data->id_member)
            ->line('Nama                : '.$this->data->nama)
            ->line('Email addres        : '.$this->data->email)
            ->line('No Hp               : '.$this->data->no_hp)
            ->line('Alamat              : '.$this->data->alamat)
            ->line('Tanggal Pesan       : '.$this->data->created_at)
            ->line('Status Paket        : '.$this->data->status_paket)
            ->line('Status Pesanan      : Menunggu Konfirmasi')
            ->line('Status Pembayaran   : Belum Lunas')
            ->line('Pada saat ke toko kami,')
            ->line('di mohon tunjukan Data diatas kepada penjaga agar segera bisa di proses, ')
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
