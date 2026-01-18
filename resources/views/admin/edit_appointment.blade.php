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
      style="max-width:650px; margin:0 auto;">
    @csrf
    @method('PUT')

    <input type="hidden" name="patient_id" value="{{ $patient->id }}">

    <!-- Full Name -->
    <div style="margin-bottom:15px;">
        <label class="text-muted small">Full Name</label>
        <input type="text"
               value="{{ $patient->full_name }}"
               readonly
               style="width:100%; padding:12px; border-radius:12px; border:1px solid #ccc; background:#f5f5f5;">
    </div>

    <!-- IC Number -->
    <div style="margin-bottom:20px;">
        <label class="text-muted small">IC Number</label>
        <input type="text"
               value="{{ $patient->ic }}"
               readonly
               style="width:100%; padding:12px; border-radius:12px; border:1px solid #ccc; background:#f5f5f5;">
    </div>

    <!-- Assigned Doctor -->
    <div style="margin-bottom:15px;">
        <label class="text-muted small">Assigned Doctor</label>
        <select name="doctor_id"
                required
                style="width:100%; padding:12px; border-radius:12px; border:1px solid #ccc;">
            <option disabled>Select Doctor</option>
            @foreach($doctors as $doctor)
                <option value="{{ $doctor->id }}" @selected($patient->doctor_id == $doctor->id)>
                    {{ $doctor->doctors_name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Appointment Date -->
    <div style="margin-bottom:15px;">
        <label class="text-muted small">Appointment Date</label>
        <input type="date"
               name="appointment_date"
               value="{{ $patient->appointment_date }}"
               required
               style="width:100%; padding:12px; border-radius:12px; border:1px solid #ccc;">
    </div>

    <!-- Time Slot -->
    <div style="margin-bottom:25px;">
        <label class="text-muted small">Time Slot</label>
        <select name="time_slot"
                required
                style="width:100%; padding:12px; border-radius:12px; border:1px solid #ccc;">
            @foreach(['9:00 AM - 10:00 AM','10:00 AM - 11:00 AM','11:00 AM - 12:00 PM','2:00 PM - 3:00 PM'] as $slot)
                <option value="{{ $slot }}" @selected($patient->time_slot == $slot)>
                    {{ $slot }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Buttons -->
    <div style="display:flex; justify-content:space-between; align-items:center;">

        <!-- Back -->
        <a href="{{ route('view_appointment') }}"
           style="background:#9e9e9e; color:white; padding:12px 25px;
                  border-radius:12px; text-decoration:none;">
            Back
        </a>

        <!-- Right Buttons -->
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
