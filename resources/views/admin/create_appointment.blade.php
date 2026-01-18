@extends('admin.maindesign')
<base href="/public">

@section('view_patients')

@if(session('error'))
    <div style="background:#FF4C4C; color:white; padding:10px 15px; margin-bottom:20px; text-align:center; border-radius:12px;">
        {{ session('error') }}
    </div>
@endif

<form id="appointmentForm"
      action="{{ route('update_appointment', $patient->id) }}"
      method="POST"
      style="text-align:center;">
    @csrf
    @method('PUT')

    <!-- FIXED hidden input -->
    <input type="hidden" name="patient_id" value="{{ $patient->id }}">

    <!-- Full Name -->
    <div style="width:80%; margin:auto; margin-bottom:15px; text-align:left;">
        <label class="text-muted small">Full Name</label>
        <input type="text"
               value="{{ $patient->full_name }}"
               readonly
               style="width:100%; padding:12px; border-radius:12px; border:1px solid #ccc; background:#f5f5f5;">
    </div>

    <!-- IC Number -->
    <div style="width:80%; margin:auto; margin-bottom:20px; text-align:left;">
        <label class="text-muted small">IC Number</label>
        <input type="text"
               value="{{ $patient->ic }}"
               readonly
               style="width:100%; padding:12px; border-radius:12px; border:1px solid #ccc; background:#f5f5f5;">
    </div>

    <!-- Assigned Doctor -->
    <div style="width:80%; margin:auto; margin-bottom:15px; text-align:left;">
        <label class="text-muted small">Assigned Doctor</label>
        <select name="doctor_id"
                required
                style="width:100%; padding:12px; border-radius:12px; border:1px solid #ccc;">
            <option disabled>Select Doctor</option>
            @foreach($doctors as $doctor)
                <option value="{{ $doctor->id }}" @if($patient->doctor_id == $doctor->id) selected @endif>
                    {{ $doctor->doctors_name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Appointment Date -->
    <div style="width:80%; margin:auto; margin-bottom:15px; text-align:left;">
        <label class="text-muted small">Appointment Date</label>
        <input type="date"
               name="appointment_date"
               value="{{ $patient->appointment_date }}"
               required
               style="width:100%; padding:12px; border-radius:12px; border:1px solid #ccc;">
    </div>

    <!-- Time Slot -->
    <div style="width:80%; margin:auto; margin-bottom:30px; text-align:left;">
        <label class="text-muted small">Time Slot</label>
        <select name="time_slot"
                required
                style="width:100%; padding:12px; border-radius:12px; border:1px solid #ccc;">
            @foreach(['9:00 AM - 10:00 AM','10:00 AM - 11:00 AM','11:00 AM - 12:00 PM','2:00 PM - 3:00 PM'] as $slot)
                <option value="{{ $slot }}" @if($patient->time_slot == $slot) selected @endif>
                    {{ $slot }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Buttons -->
    <div style="width:80%; margin:auto; display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">

        <!-- Back -->
        <a href="{{ route('view_patients') }}"
           style="background:#9e9e9e; color:white; padding:12px 25px;
                  border-radius:12px; text-decoration:none;">
            Back
        </a>

        <!-- Confirm + Cancel -->
        <div style="display:flex; gap:15px;">
            <button type="submit"
                    style="background:#4da3dd; color:white; padding:12px 25px;
                           border:none; border-radius:12px; cursor:pointer;">
                Confirm
            </button>

            <a href="{{ route('view_patients') }}"
               onclick="return confirm('Discard changes and go back?')"
               style="background:#FF4C4C; color:white; padding:12px 25px;
                      border-radius:12px; text-decoration:none;">
                Cancel
            </a>
        </div>
    </div>
</form>

@endsection
