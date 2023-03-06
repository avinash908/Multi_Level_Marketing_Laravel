<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactMessageNotification extends Notification
{
    use Queueable;

    protected $notification_data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->notification_data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                    ->subject('Contact Message on '. config('app.name'))
                    ->line($this->notification_data['name'] .' has contacted on '. config('app.name'))
                    ->line('Name: ' . $this->notification_data['name'])
                    ->line('Subject: ' . $this->notification_data['subject'])
                    ->line('Phone: ' . $this->notification_data['phone'])
                    ->line('Message: ' . $this->notification_data['message'])
                    ->action('View Dasboard', url('/home'));
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
            'message'   => ucwords($this->notification_data['name']) .' has contacted message on ' . config('app.name') 
        ];
    }
}
