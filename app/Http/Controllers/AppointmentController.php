<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentMail;

class AppointmentController extends Controller
{
public function edit($id)
{
    $appointment = Appointment::findOrFail($id);
    $doctors = Doctor::all();

    // If your Appointment model has patient info, you can use it.
    // Here, I’ll just pass the appointment as $patient to keep your Blade code working:
    $patient = $appointment;

    return view('admin.edit_appointment', compact('appointment', 'patient', 'doctors'));
}


public function update(Request $request, $id)
{
    $appointment = Appointment::findOrFail($id);

    $request->validate([
        'doctor_id' => 'required|exists:doctors,id',
        'appointment_date' => 'required|date',
        'time_slot' => 'required|string',
    ]);

    // Prevent duplicate appointment
    $exists = Appointment::where('doctor_id', $request->doctor_id)
        ->where('appointment_date', $request->appointment_date)
        ->where('time_slot', $request->time_slot)
        ->where('id', '!=', $id)
        ->first();

    if ($exists) {
        return back()->with('error', 'This doctor already has an appointment at this date & time.');
    }

    $appointment->update([
        'doctor_id' => $request->doctor_id,
        'appointment_date' => $request->appointment_date,
        'time_slot' => $request->time_slot,
        'status' => 'Confirmed',
    ]);

    if (!empty($appointment->email)) {
        Mail::to($appointment->email)->send(new AppointmentMail($appointment));
    }

    return redirect()->route('view_patients')
        ->with('success', 'Appointment updated successfully!');
}



public function destroy($id)
{
    $appointment = Appointment::findOrFail($id);
    $appointment->delete();

    return redirect()->route('view_appointment')->with('doctor_deletemessage', 'Appointment deleted successfully!');
}

    // Show create appointment form for selected patient
    public function create(Request $request)
    {
        // Get patient by appointment id (from query string)
        $patient = Appointment::findOrFail($request->patient_id);

        // Get all doctors for dropdown
        $doctors = Doctor::all();

        return view('appointments.create', compact('patient', 'doctors'));
    }

    // Store new appointment
public function store(Request $request)
{
    // Validate and save the appointment
    $appointment = Appointment::create([
        'patient_id' => $request->patient_id,
        'doctor_id' => $request->doctor_id,
        'appointment_date' => $request->appointment_date,
        'time_slot' => $request->time_slot,
    ]);

    $action = $request->post_confirm_action ?? 'none';
    $patient = $appointment->patient; // assuming relationship exists

    // Generate PDF
    $pdf = Pdf::loadView('appointments.pdf', compact('appointment', 'patient'));

    if ($action === 'pdf') {
        // Trigger PDF download for printing
        return $pdf->download('appointment_'.$appointment->id.'.pdf');
    } elseif ($action === 'email') {
        // Send email to patient with PDF attached
        Mail::to($patient->email)->send(new AppointmentMail($pdf));
        return redirect()->route('view_patients')->with('success', 'Appointment saved and email sent!');
    } else {
        // 'No Thanks' - just save the appointment
        return redirect()->route('view_patients')->with('success', 'Appointment saved successfully!');
    }
}

public function userAppointments(Request $request)
{
    $user = auth()->user();

    if ($user->role === 'admin') {
        return redirect()->route('dashboard'); // redirect admin to admin dashboard
    }

    $ic = $request->input('ic');
    $appointments = [];

    if ($ic) {
        $appointments = Appointment::with('doctor')
            ->where('ic', $ic)
            ->orderBy('appointment_date', 'desc')
            ->get();
    }

    return view('userappointments', compact('appointments', 'ic'));
}


}