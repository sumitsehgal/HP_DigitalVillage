<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserRegistration extends Mailable
{
    use Queueable, SerializesModels;

    protected $student, $center,  $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($student, $center, $password)
    {
        $this->student = $student;
        $this->center = $center;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->center->email)->subject('Registration')->view('email.registration')->with([
            'user' => $this->student,
            'center' => $this->center,
            'password' => $this->password
        ]);
    }
}
