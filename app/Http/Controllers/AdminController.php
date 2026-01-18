<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;

class AdminController extends Controller
{
    public function addDoctors(){
        return view('admin.add_doctors');
    }

    public function postAddDoctors(Request $request){
        $doctor = new Doctor();
        $doctor->doctors_name = $request->doctors_name;
        $doctor->doctors_phone = $request->doctors_phone;
        $doctor->specialty = $request->specialty;
        $doctor->room_number = $request->room_number;
        $image=$request->doctor_image;
        // Handle file upload
        if($image){
            $image_name=time().'.'.$image->getClientOriginalExtension();
            $doctor->doctor_image=$image_name;
        }
        $doctor->save();
        if($image && $doctor->save()){
            $request->doctor_image->move('project_img',$image_name);
        }

        return redirect()->back()->with('doctor_addmessage', 'Doctor added successfully!');
    }

public function viewDoctors(Request $request)
{
    $search = $request->search ?? '';

    $query = Doctor::query();

    if (!empty($search)) {
        $query->where(function ($q) use ($search) {
            $q->where('doctors_name', 'LIKE', "%$search%")
              ->orWhere('specialty', 'LIKE', "%$search%")
              ->orWhere('doctors_phone', 'LIKE', "%$search%")
              ->orWhere('room_number', 'LIKE', "%$search%");
        });
    }

    $doctors = $query->get();

    return view('admin.view_doctors', compact('doctors', 'search'));
}


    public function deleteDoctor($id){
        $doctors=Doctor::findOrFail($id);

        $doctors->delete();
        return redirect()->back()->with('doctor_deletemessage', 'Doctor deleted successfully!');
    }

    public function updateDoctor($id){
        $doctor=Doctor::findOrFail($id);
        return view('admin.update_doctors',compact('doctor'));
    }   

    public function postUpdateDoctor(Request $request,$id){
        $doctor=Doctor::findOrFail($id);
        $doctor->doctors_name=request()->doctors_name;
        $doctor->doctors_phone=request()->doctors_phone;
        $doctor->specialty=request()->specialty;
        $doctor->room_number=request()->room_number;
        $image=request()->doctor_image;
        // Handle file upload
        if($image){
            $image_name=time().'.'.$image->getClientOriginalExtension();
            $doctor->doctor_image=$image_name;
        }
        $doctor->save();
        if($image && $doctor->save()){
            request()->doctor_image->move('project_img',$image_name);
        }

        return redirect()->back()->with('doctor_updatemessage', 'Doctor updated successfully!');
    }

    public function addPatient()
{
    $doctors = Doctor::all();
    return view('admin.add_patient', compact('doctors'));
}

public function storePatientAppointment(Request $request)
{
    $request->validate([
        'full_name' => 'required|string|max:255',
        'ic' => 'required|string|max:20',
        'number' => 'required|string|max:20',
        'doctor_id' => 'required|exists:doctors,id',
        'appointment_date' => 'required|date|after_or_equal:today',
        'time_slot' => 'required|string',
        'message' => 'nullable|string|max:1000',
    ]);

    // Prevent double booking for the same doctor/date/time
    $exists = Appointment::where('doctor_id', $request->doctor_id)
        ->where('appointment_date', $request->appointment_date)
        ->where('time_slot', $request->time_slot)
        ->first();

    if ($exists) {
        return redirect()->back()->with('error', 'This doctor already has an appointment at this date & time.');
    }

    Appointment::create([
        'full_name' => $request->full_name,
        'ic' => $request->ic,
        'phone_number' => $request->number,
        'doctor_id' => $request->doctor_id,
        'appointment_date' => $request->appointment_date,
        'time_slot' => $request->time_slot,
        'message' => $request->message,
        'status' => 'Confirmed',
    ]);

    return redirect()->back()->with('success', 'Patient appointment added successfully!');
}

public function viewPatients(Request $request)
{
    // Get search query from input
    $search = $request->input('search');

    // Query appointments (patients)
    $patients = Appointment::query();

    if ($search) {
        $patients->where('full_name', 'LIKE', "%{$search}%")
                 ->orWhere('ic', 'LIKE', "%{$search}%");
    }

    $patients = $patients->get();

    return view('admin.view_patients', compact('patients', 'search'));
}


public function request(Request $request)
{
    $search = $request->input('search');

    $appointments = Appointment::when($search, function ($query, $search) {
        $query->where('full_name', 'LIKE', "%{$search}%")
              ->orWhere('ic', 'LIKE', "%{$search}%")
              ->orWhere('specialty', 'LIKE', "%{$search}%")
              ->orWhere('status', 'LIKE', "%{$search}%");
    })->orderBy('submission_date', 'desc')->get();

    return view('admin.request', compact('appointments', 'search'));
}

public function viewAppointment(Request $request)
{
    $search = $request->search ?? ''; // always define $search

    $query = Appointment::with('doctor')
                ->where('status', 'confirmed'); // only confirmed appointments

    if (!empty($search)) {
        $query->where(function($q) use ($search) {
            $q->where('full_name', 'LIKE', "%$search%")
              ->orWhere('ic', 'LIKE', "%$search%")
              ->orWhereHas('doctor', function($q2) use ($search) {
                  $q2->where('doctors_name', 'LIKE', "%$search%");
              });
        });
    }

    $appointments = $query->get();

    return view('admin.view_appointments', compact('appointments', 'search'));
}


    public function updateAppointment(Request $request,$id){
        $appointment=Appointment::findOrFail($id);
        $appointment->status=request()->status;
        $appointment->save();

        return redirect()->back()->with('status_updatemessage', 'Appointment status updated successfully!');
    }

    public function changeStatus(Request $request,$id){
        $appointment=Appointment::findOrFail($id);
        $appointment->status=request()->status;
        $appointment->save();

        return redirect()->back()->with('status_changemessage', 'Appointment confirmed successfully!');
    }

    public function view_patients(Request $request)
{
    $query = Appointment::query();

    if ($request->has('search')) {
        $query->where('full_name', 'LIKE', '%'.$request->search.'%');
    }

    $patients = $query->get();

    return view('admin.view_patients', compact('patients'));
}

    // Show the create appointment page for selected patient
    public function createAppointment($id)
    {
        $patient = Appointment::findOrFail($id); // get selected row
        $doctors = Doctor::all(); // get all doctors
        return view('admin.create_appointment', compact('patient', 'doctors'));
    }

    // Store/update appointment
public function storeAppointment(Request $request)
{
    // Step 1: Validate input
    $request->validate([
        'full_name' => 'required|string|max:255',
        'email_address' => 'required|email',
        'submission_date' => 'required|date',
        'specialty' => 'required|string',
        'ic' => 'required|string|max:20',
        'number' => 'required|string|max:20',
        'message' => 'nullable|string',
    ]);

    // Step 2: Convert specialty → doctor_id
    $doctor = Doctor::where('specialty', $request->specialty)->first();

    if (!$doctor) {
        return back()
            ->withErrors(['specialty' => 'Selected specialty not available'])
            ->withInput();
    }

    // Step 3: Create appointment
    Appointment::create([
        'full_name' => $request->full_name,
        'email_address' => $request->email_address,
        'appointment_date' => $request->submission_date,
        'doctor_id' => $doctor->id,
        'ic' => $request->ic,
        'number' => $request->number,
        'message' => $request->message,
        'status' => 'Pending',
    ]);

    return redirect()->back()->with('success', 'Patient added successfully!');
}

public function deletePatient($id)
{
    $appointment = Appointment::find($id);

    if (!$appointment) {
        return redirect()->back()->with('error', 'Patient not found.');
    }

    $appointment->delete();
    return redirect()->back()->with('success', 'Patient deleted successfully.');
}


}
