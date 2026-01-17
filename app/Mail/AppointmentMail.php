<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use App\Models\Appointment;

class AppointmentMail extends Mailable
{
    public $appointment;

    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    public function build()
    {
        return $this->subject('Your Appointment Confirmation')
                    ->view('emails.appointment_simple');
    }
}
