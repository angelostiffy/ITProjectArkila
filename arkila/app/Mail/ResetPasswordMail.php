<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $userName = $this->user->username;
        // $userEmail = $this->user->email;
        // $userEmail = User::find($this->id);
        return $this->view('emails.index')
                    ->subject('Password Reset')
                    ->with([
                      'token' => $this->token,
                      'email' => $this->email
                    ]);
    }
}
