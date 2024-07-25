<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendEmailAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $admin;
    public $details;
    public $subject;
    public $viewName;

    /**
     * Create a new message instance.
     *
     * @param mixed $admin
     * @param array $details
     * @param string $subject
     * @param string $viewName
     * @return void
     */
    public function __construct($admin, $details, $subject, $viewName)
    {
        $this->admin = $admin;
        $this->details = $details;
        $this->subject = $subject;
        $this->viewName = $viewName;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view($this->viewName)
                    ->subject($this->subject)
                    ->with($this->details);
    }

    /**
     * Get the attachments for the message.
     * 
     *
     * @return array
     * 
     * 
     */
    public function attachments()
    {
        return [];
    }




}