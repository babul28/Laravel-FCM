<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Fcm\FcmChannel;
use NotificationChannels\Fcm\FcmMessage;
use NotificationChannels\Fcm\Resources\AndroidConfig;
use NotificationChannels\Fcm\Resources\AndroidFcmOptions;
use NotificationChannels\Fcm\Resources\AndroidNotification;
use NotificationChannels\Fcm\Resources\ApnsConfig;
use NotificationChannels\Fcm\Resources\ApnsFcmOptions;
use NotificationChannels\Fcm\Resources\Notification as ResourcesNotification;

class PostCreatedNotification extends Notification
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
        return [FcmChannel::class];
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

    public function toFcm($notifiable)
    {
        return FcmMessage::create()
            // ->setData([
            //     'transaction_id' => '28',
            //     'click_action' => 'transaction_success_activity',
            //     'title' => 'sukses gan',
            //     'body' => 'body sukses',
            //     'image' => 'https://mangdropship.s3.ap-southeast-1.amazonaws.com/images/banners/4rnpxllL8Iw2Wz1oxYvM8jqV5csK1DR7vhcTN8Pz.png'
            // ]);
            ->setNotification(
                ResourcesNotification::create()
                    ->setTitle('testing')
                    ->setBody('Body testing')
                    ->setImage('https://mangdropship.s3.ap-southeast-1.amazonaws.com/images/banners/4rnpxllL8Iw2Wz1oxYvM8jqV5csK1DR7vhcTN8Pz.png')
            );
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
