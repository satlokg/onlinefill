<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class ItemNotification extends Notification
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
        return ['mail','database','broadcast'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
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
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
