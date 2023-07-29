<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;
use App\Models\User;
use App\Models\EmailVerificationRequest;
use App\Http\Controllers\CryptController;

class verifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $id_user;
    public $token;

    /**
     * Create a new message instance.
     */
    public function __construct($id_user)
    {
        $this->id_user = $id_user;
        $this->storeVerificationData();
       
    }

    public function storeVerificationData(){
        $now = Carbon::now();
        $crypt = new CryptController();
        $this->token = $crypt->crypt($now.$this->id_user);
        EmailVerificationRequest::updateOrCreate([
            'id_user' => $this->id_user,
        ],[
            'id_user' => $this->id_user,
            'token' => $this->token,
            'expired' => $now->addDay()
        ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Verify Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.verify-email',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
