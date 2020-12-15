<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class verifyUser extends Mailable
{
    use Queueable, SerializesModels;
    public $id,$token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id,$token)
    {
        $this->id=$id;
        $this->token=$token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('email verification')->view('emails.verifyUser',["id"=>$this->id,"token"=>$this->token]);
    }
}
