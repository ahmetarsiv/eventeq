<?php

namespace App\Notifications;

use App\Models\EventApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EventApplicationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        private readonly int    $applicationId,
        private readonly int    $eventId,
        private readonly string $name,
        private readonly string $eventName,
    )
    {
        //
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
            ->subject('Etkinlikte Görüşmek Üzere ' . $this->eventName)
            ->greeting('Merhaba ' . $this->name . '!')
            ->line('Harika haber, ' . $this->name . ' ' . $this->eventName . ' etkinliğine gidiyorsunuz.')
            ->line('Etkinlikten bir hafta önce size bir check-in maili göndereceğiz. Check-in yapmayı unutmayınız!')
            ->action('Başvuru Detayları', route('application.success', $this->applicationId));
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
