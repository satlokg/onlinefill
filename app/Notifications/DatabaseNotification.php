<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
class DatabaseNotification extends Notification
{
    use Queueable;
    private $subscriptions;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($letter)
    {
       $this->subscriptions=$letter;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
    }

    
    public function toDatabase($notifiable)
    {
        return [
            'letter' => $this->subscriptions,
        ];
    }
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'letter' => $this->subscriptions,
            'count' => $notifiable->unreadNotifications->count()
        ]);
    }
}
