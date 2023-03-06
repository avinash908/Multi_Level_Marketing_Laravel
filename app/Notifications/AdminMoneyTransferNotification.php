<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminMoneyTransferNotification extends Notification
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
                    ->subject('Transfer Money Notification on '.config('app.name'))
                    ->line(ucwords($this->notification_data['from_user']) .' has sent Rs:' . $this->notification_data['amount'] . ' to '.$this->notification_data['to_user'])
                    ->action('View Dashboard ', url('/home'));
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
            'message'   => ucwords($this->notification_data['from_user']) .' has sent Rs:' . $this->notification_data['amount'] . ' to '.$this->notification_data['to_user']
        ];
    }
}