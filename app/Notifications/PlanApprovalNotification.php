<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PlanApprovalNotification extends Notification
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
                    ->subject('Purchase Plan Request Approved')
                    ->line('Hello '. $notifiable->name)
                    ->line('Congratulation! '.$this->notification_data['plan_title']. ' is activated now')
                    ->action('View Account', url('/my-account'))
                    ->line('Thank you for using our application!');

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
            'message'   => 'Congratulation! '.$this->notification_data['plan_title']. ' is activated now'
        ];
    }
}
