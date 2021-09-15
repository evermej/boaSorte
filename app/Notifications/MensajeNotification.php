<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Notifications\Notification;

class MensajeNotification extends Notification
{
    use Queueable;

    
    public function __construct()
    {
        //
    }

    
    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toNexmo($notifiable)
    {
        return (new NexmoMessage)
                    ->content('prabens menino ganhou');
    }

    
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
