<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCandidate extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($id_vacancy, $name_vacancy, $user_id)
    {
        $this->id_vacancy = $id_vacancy;
        $this->name_vacancy = $name_vacancy;
        $this->user_id = $user_id;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('/notifications');
        return (new MailMessage)
            ->line('You have received a new candidate for your vacancy.')
            ->line('The vacancy is: ' . $this->name_vacancy)
            ->action('View Notifications', $url)
            ->line('Thank you for using DevJobs!');
    }

//stores the notifications in the database
    public function toDatabase($notifiable)
    {
        return [
            'id_vacancy' => $this->id_vacancy,
            'name_vacancy' => $this->name_vacancy,
            'user_id' => $this->user_id

        ];

    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
