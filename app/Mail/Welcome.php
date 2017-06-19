<?php

namespace App\Mail;

use App\Student;

use Illuminate\ {
    Bus\Queueable,
    Mail\Mailable,
    Queue\SerializesModels
};

class Welcome extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * @var Student
     */
    public $student;

    /**
     * Welcome constructor.
     * @param Student $student
     */
    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.welcome');
    }
}
