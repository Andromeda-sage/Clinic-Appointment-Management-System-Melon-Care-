@extends('admin.maindesign')
<base href="/public">

@section('view_patients')

@if(session('error'))
    <div style="background:#FF4C4C; color:white; padding:10px 15px; margin-bottom:20px; text-align:center; border-radius:12px;">
        {{ session('error') }}
    </div>
@endif

<form id="appointmentForm" action="{{ route('update_appointment', $patient->id) }}" method="POST" style="text-align:center;">
    @csrf
    @method('PUT') <!-- This makes it a PUT request -->

    <input type="hidden" name="patient_id" value="{{ $patient->id }}">

    <!-- Patient Info (read-only) -->
    <input type="text" value="{{ $patient->full_name }}" readonly>
    <input type="text" value="{{ $patient->ic }}" readonly>

    <!-- Doctor Selection -->
    <select name="doctor_id" required>
        <option selected disabled>Select Doctor</option>
        @foreach($doctors as $doctor)
            <option value="{{ $doctor->id }}" @if($patient->doctor_id == $doctor->id) selected @endif>
                {{ $doctor->doctors_name }}
            </option>
        @endforeach
    </select>

    <!-- Appointment Date -->
    <input type="date" name="appointment_date" value="{{ $patient->appointment_date }}" required>

    <!-- Time Slot -->
    <select name="time_slot" required>
        @foreach(['9:00 AM - 10:00 AM','10:00 AM - 11:00 AM','11:00 AM - 12:00 PM','2:00 PM - 3:00 PM'] as $slot)
            <option value="{{ $slot }}" @if($patient->time_slot == $slot) selected @endif>{{ $slot }}</option>
        @endforeach
    </select>

    <button type="submit">Update Appointment</button>
</form>


<!-- Modal for options -->
<div id="confirmModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); justify-content:center; align-items:center;">
    <div style="background:white; padding:30px; border-radius:12px; text-align:center; max-width:400px; box-shadow:0 4px 15px rgba(0,0,0,0.25);">
        <h3 style="margin-bottom:20px;">What would you like to do?</h3>
        <button onclick="submitForm('pdf')" style="margin-bottom:10px; background:#4da3dd; color:white; padding:10px 20px; border:none; border-radius:12px; cursor:pointer; width:100%;">Print PDF</button>
        <button onclick="submitForm('email')" style="margin-bottom:10px; background:#2ecc71; color:white; padding:10px 20px; border:none; border-radius:12px; cursor:pointer; width:100%;">Send Email</button>
        <button onclick="submitForm('none')" style="background:#e74c3c; color:white; padding:10px 20px; border:none; border-radius:12px; cursor:pointer; width:100%;">No Thanks</button>
        <div style="margin-top:10px;">
            <a href="#" onclick="closeModal()" style="color:#555; text-decoration:underline; cursor:pointer;">Cancel</a>
        </div>
    </div>
</div>

<script>
function showConfirmOptions() {
    document.getElementById('confirmModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('confirmModal').style.display = 'none';
}

function submitForm(action) {
    let form = document.getElementById('appointmentForm');

    // remove existing hidden input if any
    let existing = form.querySelector('input[name="post_confirm_action"]');
    if(existing) existing.remove();

    let input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'post_confirm_action';
    input.value = action;
    form.appendChild(input);

    form.submit();
}
</script>

@endsection
