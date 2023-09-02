<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactFormNotification extends Notification
{
    use Queueable;

    public $contactDetails;

    public function __construct($contactDetails)
    {
        $this->contactDetails = $contactDetails;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->from($this->contactDetails['email'], $this->contactDetails['name'])
                    ->subject('Contact Form Submission from ' . $this->contactDetails['name'])
                    ->replyTo($this->contactDetails['email'], $this->contactDetails['name'])
                    ->line('You have received a new contact form submission.')
                    ->line('Name: ' . $this->contactDetails['name'])
                    ->line('Email: ' . $this->contactDetails['email'])
                    ->line('Message: ')
                    ->line($this->contactDetails['message'])
                    // ->action('Notification Action', url('/'))
                    ->line('Thank you for using contacting us! We will be getting back to you soon.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
