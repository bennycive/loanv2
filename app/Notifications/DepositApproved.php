<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
 

class DepositApproved extends Notification implements ShouldQueue
{
    use Queueable;

    protected $depositData;

    public function __construct($depositData)
    {
        $this->depositData = $depositData;
    }

    public function via($notifiable)
    {
        return ['mail']; // Use email channel for now (you can add others here)
    }

    public function toMail($notifiable)
    {
        $depositAmount = $this->depositData['amount']; // Replace with actual property name

        return (new MailMessage)
            ->subject('Your Deposit Request Has Been Approved!')
            ->greeting('Hi ' . $notifiable->name . ',')
            ->line('We are pleased to inform you that your deposit request of ' . $depositAmount . ' has been approved.')
            ->line('The funds should be reflected in your account shortly.')
            ->line('Thank you for using our platform!')
            ->line('Sincerely,')
            ->line(config('app.name'));
    }

    public function toArray($notifiable)
    {
        return [
            // Add relevant data for other notification channels (SMS, push, etc.)
        ];
    }
}
