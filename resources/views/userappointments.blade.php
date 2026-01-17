@extends('usermaindesign') <!-- Use the user layout -->

@section('content') <!-- Fill the 'content' section of your layout -->
<div class="container-fluid">

    <h3 style="text-align:center; margin-bottom:20px;">My Appointments</h3>

    <!-- User IC Search Form -->
    <form action="{{ route('userappointments') }}" method="GET" style="display:flex; justify-content:center; gap:10px; margin-bottom:25px;">
        <input type="text" name="ic" value="{{ $ic ?? '' }}" placeholder="Enter your IC number" 
               style="padding:10px 15px; border-radius:25px; border:1px solid #ddd; width:50%;">
        <button type="submit" style="padding:10px 25px; background:#4da3dd; color:white; border-radius:25px; border:none; font-weight:bold;">
            VIEW MY APPOINTMENTS
        </button>
    </form>

    <div class="row justify-content-center">
        <div class="col-12">
            <div style="overflow-x:auto; max-height:600px;">
                <table class="table table-bordered table-striped text-center w-100">
                    <thead class="thead-dark">
                        <tr>
                            <th>Full Name</th>
                            <th>IC Number</th>
                            <th>Specialty Required</th>
                            <th>Booked Appointment Date</th>
                            <th>Assigned Doctor</th>
                            <th>Time Slot</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->full_name }}</td>
                            <td>{{ $appointment->ic }}</td>
                            <td>{{ $appointment->doctor ? $appointment->doctor->specialty : 'Not assigned' }}</td>
                            <td>{{ $appointment->appointment_date }}</td>
                            <td>{{ $appointment->doctor ? $appointment->doctor->doctors_name : 'Not assigned' }}</td>
                            <td>{{ $appointment->time_slot }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">No appointments found for this IC number.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
