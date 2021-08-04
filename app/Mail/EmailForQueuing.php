<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Notifications\Messages\MailMessage;

class EmailForQueuing extends Mailable
{
    use Queueable, SerializesModels;
    private $companyData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($companyData)
    {
        $this->companyData = $companyData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('mail@example.com', 'SimpleCRM')
            ->subject('Test Queued Email')
            ->html((new MailMessage)
                    ->greeting('Hello!')
                    ->line('New company just registered!')
                    ->action('Check it out', url('/admin/company') . '/' . $this->companyData['id'])
                    ->render()
            );
    }
}
