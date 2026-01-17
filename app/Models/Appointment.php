<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
    'full_name',
    'email_address',
    'submission_date',
    'specialty',
    'ic',
    'number',
    'message',
    'status',
    'doctor_id',
    'appointment_date',
    'time_slot',
];

// App/Models/Appointment.php

public function doctor()
{
    return $this->belongsTo(Doctor::class, 'doctor_id'); // doctor_id is the foreign key in appointments table
}


}
