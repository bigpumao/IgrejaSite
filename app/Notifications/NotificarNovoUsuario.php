<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;


class NotificarNovoUsuario extends Notification
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
            ->subject('Seja bem-vindo ao Sistema da ' . config('app.name'))
            ->line( $notifiable->name . ', é com alegria que damos boas vindas ao Sistema de Administração do Site da Igreja de Deus em Luziânia.')
            ->line('Seu usuário para login é  ' . $notifiable->email)
            ->line('Sua senha foi previamente cadastrada por um administrador do sistema. Entre em contato com um administrador para adquirir sua senha.')
            ->line('Caso contrário,')
            ->action('Clique aqui para acessar o sistema', url('/login'))
            ->line('Qualquer dúvida entre em contato com um administrador.')
            ->line('Igreja de Deus no Brasil em Luziânia. Ainda Há Lugar.');
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
