<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPassword extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        ->subject('Solicitud de reestablecimiento de contraseña') //agregamos el asunto
        ->greeting('Hola ' . $notifiable->name)// titulo del mensaje
        ->line('Recibes este email porque se solicito el reestablecimiento de contraseña para tu cuenta')
        // Action : Texto del botón , url(app.url) la tomará desde el .env  , la ruta reset con el token respectivo
        ->action('Cambiar contraseña', url(config('app.url').route('password.reset', $this->token, false)))
        ->line('Si no realizaste esta petición puede ignorar este correo')
        ->salutation('Saludos');
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
